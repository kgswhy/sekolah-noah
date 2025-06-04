<?php

namespace App\Http\Controllers;

use App\Models\SalarySlip;
use App\Models\SalarySlipComponent;
use App\Models\SalaryComponent;
use Illuminate\Http\Request;
use PDF;
use App\Models\Employee;
use Carbon\Carbon;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salarySlips = SalarySlip::with([
            'employee' => function ($query) {
                $query->select('id', 'employee_number', 'full_name', 'position', 'division')
                    ->where('employee_status', 'aktif');
            },
            'components'
        ])
            ->whereHas('employee', function ($query) {
                $query->where('employee_status', 'aktif');
            })
            ->latest()
            ->get();

        return view('pages.payroll.index', compact('salarySlips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalarySlip $salarySlip)
    {
        // Cek apakah karyawan masih aktif
        if ($salarySlip->employee->employee_status !== 'aktif') {
            return redirect()->route('payroll.index')
                ->with('error', 'Tidak dapat mengedit slip gaji karyawan yang tidak aktif');
        }

        $salarySlip->load([
            'employee' => function ($query) {
                $query->select('id', 'employee_number', 'full_name', 'position', 'division');
            },
            'components' => function ($query) {
                $query->orderBy('title');
            }
        ]);

        return view('pages.payroll.edit', compact('salarySlip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalarySlip $salarySlip)
    {
        $request->validate([
            'components' => 'required|array',
            'components.*.amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        $totalAmount = 0;

        foreach ($request->components as $id => $data) {
            $slipComponent = SalarySlipComponent::find($id);
            if ($slipComponent && $slipComponent->payroll_id === $salarySlip->id) {
                // Update komponen di payroll
                $slipComponent->update([
                    'amount' => $data['amount']
                ]);

                // Update komponen gaji di data karyawan
                $employeeComponent = SalaryComponent::where('employee_id', $salarySlip->employee_id)
                    ->where('title', $slipComponent->title)
                    ->first();

                if ($employeeComponent) {
                    $employeeComponent->update([
                        'amount' => $data['amount']
                    ]);
                } else {
                    // Jika komponen belum ada di data karyawan, buat baru
                    SalaryComponent::create([
                        'employee_id' => $salarySlip->employee_id,
                        'title' => $slipComponent->title,
                        'amount' => $data['amount'],
                        'description' => $slipComponent->description
                    ]);
                }

                $totalAmount += $data['amount'];
            }
        }

        // Update total gaji di slip gaji
        $salarySlip->update([
            'amount' => $totalAmount
        ]);

        return redirect()->route('payroll.index')
            ->with('success', 'Slip gaji berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function download(SalarySlip $salarySlip)
    {
        $salarySlip->load(['employee', 'components']);

        $pdf = PDF::loadView('pages.payroll.slip', compact('salarySlip'));

        return $pdf->download('slip-gaji-' . $salarySlip->employee->full_name . '.pdf');
    }

    public function generate()
    {
        $now = Carbon::now();
        $employees = Employee::where('employee_status', 'aktif')->get();

        foreach ($employees as $employee) {
            // Cek apakah sudah ada payroll untuk bulan ini
            $existingPayroll = SalarySlip::where('employee_id', $employee->id)
                ->whereYear('date', $now->year)
                ->whereMonth('date', $now->month)
                ->first();

            if (!$existingPayroll) {
                // Ambil komponen gaji dari data karyawan
                $employeeComponents = SalaryComponent::where('employee_id', $employee->id)->get();

                if ($employeeComponents->isEmpty()) {
                    // Jika belum ada komponen gaji, buat default dan simpan ke data karyawan
                    $defaultComponents = [
                        [
                            'title' => 'Gaji Pokok',
                            'amount' => 5000000,
                            'description' => 'Gaji pokok bulanan'
                        ],
                        [
                            'title' => 'Tunjangan Makan',
                            'amount' => 1000000,
                            'description' => 'Tunjangan makan bulanan'
                        ],
                        [
                            'title' => 'Tunjangan Transport',
                            'amount' => 500000,
                            'description' => 'Tunjangan transport bulanan'
                        ],
                        [
                            'title' => 'BPJS Kesehatan',
                            'amount' => 200000,
                            'description' => 'Potongan BPJS Kesehatan'
                        ],
                        [
                            'title' => 'BPJS Ketenagakerjaan',
                            'amount' => 100000,
                            'description' => 'Potongan BPJS Ketenagakerjaan'
                        ]
                    ];

                    // Simpan komponen default ke data karyawan
                    foreach ($defaultComponents as $component) {
                        SalaryComponent::create([
                            'employee_id' => $employee->id,
                            'title' => $component['title'],
                            'amount' => $component['amount'],
                            'description' => $component['description']
                        ]);
                    }

                    $components = $defaultComponents;
                } else {
                    // Gunakan komponen gaji dari data karyawan
                    $components = $employeeComponents->map(function ($component) {
                        return [
                            'title' => $component->title,
                            'amount' => $component->amount,
                            'description' => $component->description
                        ];
                    })->toArray();
                }

                // Hitung total gaji
                $totalAmount = collect($components)->sum('amount');

                // Buat slip gaji baru
                $salarySlip = SalarySlip::create([
                    'employee_id' => $employee->id,
                    'date' => $now->startOfMonth(),
                    'amount' => $totalAmount,
                    'status' => 'unpaid'
                ]);

                // Buat komponen gaji di payroll
                foreach ($components as $component) {
                    SalarySlipComponent::create([
                        'payroll_id' => $salarySlip->id,
                        'title' => $component['title'],
                        'amount' => $component['amount'],
                        'description' => $component['description']
                    ]);
                }
            }
        }

        return redirect()->route('payroll.index')
            ->with('success', "Generate Payroll Berhasil");
    }

    public function updateStatus(SalarySlip $salarySlip, Request $request)
    {
        $request->validate([
            'status' => 'required|in:paid,unpaid'
        ]);

        // Cek apakah karyawan masih aktif
        if ($salarySlip->employee->employee_status !== 'aktif') {
            return redirect()->route('payroll.index')
                ->with('error', 'Tidak dapat mengubah status slip gaji karyawan yang tidak aktif');
        }

        // Update status
        $salarySlip->update([
            'status' => $request->status
        ]);

        $statusText = $request->status === 'paid' ? 'Dibayar' : 'Belum Dibayar';
        return redirect()->route('payroll.index')
            ->with('success', "Status slip gaji berhasil diubah menjadi {$statusText}");
    }
}
