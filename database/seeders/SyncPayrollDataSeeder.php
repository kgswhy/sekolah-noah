<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\SalarySlip;
use App\Models\SalarySlipComponent;
use App\Models\SalaryComponent;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SyncPayrollDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data payroll yang ada
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        SalarySlipComponent::truncate();
        SalarySlip::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Ambil semua karyawan aktif
        $employees = Employee::where('employee_status', 'aktif')->get();
        $now = Carbon::now();

        foreach ($employees as $employee) {
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
}
