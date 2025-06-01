<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $units = ['PGTK', 'SD', 'SMP'];
        $divisions = ['Akademik', 'Non-Akademik'];
        $employment_statuses = ['Pegawai Tetap', 'Pegawai Kontrak', 'Pegawai Harian'];
        $positions = [
            'Vice Director', 'Principal', 'Vice principal', 'Coordinator', 'TIC', 'Homeroom',
            'Teacher Assistant', 'Special Subject Teacher', 'Supervisor', 'Staff Finance',
            'Staff Admin', 'Staff Admission', 'Staff Operasional', 'Staff IT', 'Staff Project',
            'Staff HR', 'Staff Kesekretariatan', 'Security', 'Driver', 'Kurir', 'Office Boy',
            'Office Girl', 'Gardener'
        ];

        for ($i = 1; $i <= 10; $i++) {
            Employee::create([
                'full_name'                => $faker->name,
                'employee_number'          => 'EMP-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'unit'                     => $faker->randomElement($units),
                'division'                 => $faker->randomElement($divisions),
                'employment_status'        => $faker->randomElement(['Pegawai Tetap', 'Pegawai Kontrak', 'Pegawai Harian']),
                'position'                 => $faker->randomElement($positions),
                'gender'                   => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'blood_type'               => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'birth_place'              => $faker->city,
                'birth_date'               => $faker->date('Y-m-d', '-20 years'),
                'bpjs_ketenagakerjaan_number' => $faker->numerify('627############'),
                'bpjs_kesehatan_number'    => $faker->numerify('637############'),
                'nik'                      => $faker->nik,
                'kk_number'                => $faker->numerify('3#################'),
                'religion'                 => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'last_education'           => $faker->randomElement(['SMA', 'D3', 'S1', 'S2']),
                'ktp_address'              => $faker->address,
                'domicile_address'         => $faker->address,
                'phone_number'             => $faker->phoneNumber,
                'npwp_number'              => $faker->numerify('##.###.###.#-###.###'),
                'school_email'             => $faker->unique()->safeEmail,
                'other_email'              => $faker->unique()->safeEmail,
                'marital_status'           => $faker->randomElement(['Belum Menikah', 'Menikah', 'Cerai']),
                'employee_status'          => $faker->randomElement(['aktif', 'tidak aktif']),
                'entry_date'               => $faker->date('Y-m-d'),
                'exit_date'                => null,
            ]);
        }
    }
}
