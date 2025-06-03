<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\SalarySlip;
use App\Models\SalarySlipComponent;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PayrollSeeder extends Seeder
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

        // Ambil semua karyawan tanpa filter status
        $employees = Employee::all();
        $now = Carbon::now();

        foreach ($employees as $employee) {
            // Generate payroll untuk 3 bulan terakhir
            for ($i = 0; $i < 3; $i++) {
                $date = $now->copy()->subMonths($i)->startOfMonth();
                
                // Buat slip gaji
                $salarySlip = SalarySlip::create([
                    'employee_id' => $employee->id,
                    'date' => $date,
                    'amount' => 0,
                    'status' => $i === 0 ? 'unpaid' : 'paid',
                ]);

                // Komponen gaji tetap
                $components = [
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

                // Buat komponen gaji
                foreach ($components as $component) {
                    SalarySlipComponent::create([
                        'payroll_id' => $salarySlip->id,
                        'title' => $component['title'],
                        'amount' => $component['amount'],
                        'description' => $component['description']
                    ]);
                }

                // Hitung total
                $salarySlip->calculateTotal();
            }
        }
    }
}
