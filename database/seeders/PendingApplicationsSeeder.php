<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuti;
use App\Models\RequestAtk;
use App\Models\PengajuanFotocopy;
use App\Models\IzinBrief;
use App\Models\KlaimBerobat;
use App\Models\LemburHonor;
use App\Models\SuratTugas;
use App\Models\FixingRequest;
use App\Models\EquipmentLoan;
use App\Models\PermintaanDesign;
use App\Models\OperationalRequest;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PendingApplicationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some users and employees for testing
        $users = User::whereHas('employee')->take(5)->get();
        $employees = Employee::whereHas('user')->take(5)->get();

        if ($users->isEmpty() || $employees->isEmpty()) {
            $this->command->warn('No users with employees found. Please ensure users and employees exist.');
            return;
        }

        $this->command->info('Creating 10 pending applications for testing...');

        // 1. Cuti Application
        Cuti::create([
            'employee_id' => $employees->random()->id,
            'tanggal_mulai' => Carbon::now()->addDays(5),
            'tanggal_selesai' => Carbon::now()->addDays(7),
            'alasan' => 'Sakit',
            'keterangan' => 'Test pending cuti application for approval system',
            'telepon' => '08123456789',
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => 'non-akademik',
        ]);

        // 2. Request ATK Application
        $randomEmployee = $employees->random();
        RequestAtk::create([
            'employee_id' => $randomEmployee->id,
            'nama_lengkap' => $randomEmployee->full_name,
            'nomor_induk_karyawan' => $randomEmployee->employee_number,
            'unit' => $randomEmployee->unit ?? 'IT',
            'divisi' => $randomEmployee->division ?? 'Non-Akademik',
            'status_karyawan' => $randomEmployee->employment_status ?? 'Tetap',
            'jabatan' => $randomEmployee->position ?? 'Staff',
            'nama_barang' => 'Pulpen, Kertas A4, Spidol',
            'jumlah' => '10 pcs, 1 rim, 5 pcs',
            'satuan' => 'pcs, rim, pcs',
            'keterangan' => 'Untuk keperluan administrasi harian',
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => 'non-akademik',
        ]);

        // 3. Pengajuan Fotocopy
        PengajuanFotocopy::create([
            'employee_id' => $employees->random()->id,
            'nama' => 'Test User Fotocopy',
            'unit' => 'IT',
            'divisi' => 'Non-Akademik',
            'nama_dokumen' => 'Dokumen administrasi',
            'jumlah_halaman' => 25,
            'jumlah_rangkap' => 3,
            'kegunaan' => 'Distribusi dokumen ke seluruh unit',
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => 'non-akademik',
        ]);

        // 4. Izin Brief Application
        IzinBrief::create([
            'employee_id' => $employees->random()->id,
            'tanggal_izin' => Carbon::now()->addDays(2),
            'waktu_mulai' => '09:00',
            'waktu_selesai' => '11:00',
            'alasan_izin' => 'Keperluan keluarga mendesak',
            'keterangan' => 'Test izin brief untuk testing approval system',
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => 'non-akademik',
        ]);

        // 5. Klaim Berobat Application
        KlaimBerobat::create([
            'employee_id' => $employees->random()->id,
            'tanggal_berobat' => Carbon::now()->subDays(3),
            'tempat_berobat' => 'RS. Test Hospital',
            'jenis_berobat' => 'Rawat Jalan',
            'diagnosa' => 'Demam dan flu',
            'biaya_obat' => 150000,
            'biaya_dokter' => 200000,
            'biaya_lainnya' => 50000,
            'total_biaya' => 400000,
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => 'non-akademik',
        ]);

        // 6. Lembur Honor Application
        LemburHonor::create([
            'employee_id' => $employees->random()->id,
            'tanggal' => Carbon::now()->subDays(1),
            'jam_mulai' => '17:00',
            'jam_selesai' => '20:00',
            'total_jam' => 3,
            'kegiatan' => 'Menyelesaikan laporan bulanan',
            'keterangan' => 'Test lembur honor application for approval system',
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => 'non-akademik',
        ]);

        // 7. Surat Tugas Application
        SuratTugas::create([
            'employee_id' => $employees->random()->id,
            'tujuan_perjalanan' => 'Jakarta',
            'maksud_perjalanan' => 'Menghadiri workshop teknologi',
            'tanggal_mulai' => Carbon::now()->addDays(10),
            'tanggal_selesai' => Carbon::now()->addDays(12),
            'transportasi' => 'Kereta Api',
            'akomodasi' => 'Hotel',
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => 'non-akademik',
        ]);

        // 8. Fixing Request Application
        FixingRequest::create([
            'user_id' => $users->random()->id,
            'device_category' => 'Computer',
            'unit' => 'IT',
            'division' => 'Non-Akademik',
            'damage_details' => 'Komputer tidak bisa menyala, mungkin power supply rusak',
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => 'non-akademik',
        ]);

        // 9. Permintaan Design Application
        PermintaanDesign::create([
            'user_id' => $users->random()->id,
            'nama' => $users->random()->name,
            'email' => $users->random()->email,
            'unit' => 'Marketing',
            'divisi' => 'Non-Akademik',
            'kategori' => 'Banner',
            'kegiatan' => 'Promosi event sekolah',
            'deskripsi' => 'Banner untuk event open house sekolah bulan depan',
            'tanggal_deadline' => Carbon::now()->addDays(14),
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => 'non-akademik',
        ]);

        // 10. Operational Request (Kurir/Mobil) Application
        OperationalRequest::create([
            'unit' => 'Administrasi',
            'divisi' => 'Non-Akademik',
            'request_by' => $users->random()->name,
            'jenis' => 'Kurir',
            'tanggal' => Carbon::now()->addDays(3),
            'dari_jam' => '08:00',
            'sampai_jam' => '10:00',
            'tujuan' => 'Bank BCA Cabang Pusat',
            'keperluan' => 'Mengambil rekening koran bulanan',
            'keterangan' => 'Test operational request for approval system',
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => 'non-akademik',
        ]);

        $this->command->info('✅ Successfully created 10 pending applications across different modules!');
        $this->command->info('Applications created:');
        $this->command->info('- 1 Cuti (Leave Request)');
        $this->command->info('- 1 Request ATK (Office Supplies)');
        $this->command->info('- 1 Pengajuan Fotocopy');
        $this->command->info('- 1 Izin Brief (Brief Permission)');
        $this->command->info('- 1 Klaim Berobat (Medical Claim)');
        $this->command->info('- 1 Lembur Honor (Overtime)');
        $this->command->info('- 1 Surat Tugas (Assignment Letter)');
        $this->command->info('- 1 Fixing Request (Repair Request)');
        $this->command->info('- 1 Permintaan Design (Design Request)');
        $this->command->info('- 1 Operational Request (Courier/Vehicle)');
        $this->command->info('');
        $this->command->info('All applications are set to:');
        $this->command->info('- Status: pending');
        $this->command->info('- Current Approval Level: 1');
        $this->command->info('- Department Type: non-akademik');
    }
} 