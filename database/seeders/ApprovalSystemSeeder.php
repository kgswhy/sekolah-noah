<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Approver;
use App\Models\ApprovalSetting;
use App\Models\User;

class ApprovalSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        Approver::truncate();
        ApprovalSetting::truncate();

        // Create approval settings for each module
        $approvalSettings = [
            [
                'module' => 'cuti',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
            [
                'module' => 'request-atk',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
            [
                'module' => 'fotocopy',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
            [
                'module' => 'izin-brief',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
            [
                'module' => 'klaim-berobat',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
            [
                'module' => 'slip-gaji-skk',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
            [
                'module' => 'equipment-loan',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
            [
                'module' => 'fixing-request',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
            [
                'module' => 'lembur-honor',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
            [
                'module' => 'peminjaman-ruangan',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
            [
                'module' => 'permintaan-design',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
            [
                'module' => 'surat-tugas',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
            [
                'module' => 'operational-request',
                'max_approval_levels' => 3,
                'required_approval_percentage' => 100.0,
                'active' => true,
            ],
        ];

        foreach ($approvalSettings as $setting) {
            ApprovalSetting::create($setting);
        }

        // Create approvers configuration
        $approvers = [
            // CUTI Approvers
            ['user_id' => 2, 'module' => 'cuti', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 3, 'module' => 'cuti', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 4, 'module' => 'cuti', 'approval_level' => 3, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 5, 'module' => 'cuti', 'approval_level' => 1, 'department_type' => 'akademik', 'active' => true],
            ['user_id' => 6, 'module' => 'cuti', 'approval_level' => 2, 'department_type' => 'akademik', 'active' => true],
            ['user_id' => 7, 'module' => 'cuti', 'approval_level' => 3, 'department_type' => 'akademik', 'active' => true],

            // REQUEST ATK Approvers
            ['user_id' => 2, 'module' => 'request-atk', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 3, 'module' => 'request-atk', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 8, 'module' => 'request-atk', 'approval_level' => 1, 'department_type' => 'akademik', 'active' => true],
            ['user_id' => 9, 'module' => 'request-atk', 'approval_level' => 2, 'department_type' => 'akademik', 'active' => true],

            // FOTOCOPY Approvers
            ['user_id' => 2, 'module' => 'fotocopy', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 3, 'module' => 'fotocopy', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 8, 'module' => 'fotocopy', 'approval_level' => 1, 'department_type' => 'akademik', 'active' => true],

            // IZIN BRIEF Approvers
            ['user_id' => 2, 'module' => 'izin-brief', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 3, 'module' => 'izin-brief', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 4, 'module' => 'izin-brief', 'approval_level' => 3, 'department_type' => 'non-akademik', 'active' => true],

            // KLAIM BEROBAT Approvers
            ['user_id' => 2, 'module' => 'klaim-berobat', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 3, 'module' => 'klaim-berobat', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 4, 'module' => 'klaim-berobat', 'approval_level' => 3, 'department_type' => 'non-akademik', 'active' => true],

            // SLIP GAJI SKK Approvers
            ['user_id' => 2, 'module' => 'slip-gaji-skk', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 3, 'module' => 'slip-gaji-skk', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 4, 'module' => 'slip-gaji-skk', 'approval_level' => 3, 'department_type' => 'non-akademik', 'active' => true],

            // EQUIPMENT LOAN Approvers
            ['user_id' => 2, 'module' => 'equipment-loan', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 3, 'module' => 'equipment-loan', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],

            // FIXING REQUEST Approvers
            ['user_id' => 2, 'module' => 'fixing-request', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 3, 'module' => 'fixing-request', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],

            // LEMBUR HONOR Approvers
            ['user_id' => 2, 'module' => 'lembur-honor', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 3, 'module' => 'lembur-honor', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 4, 'module' => 'lembur-honor', 'approval_level' => 3, 'department_type' => 'non-akademik', 'active' => true],

            // PEMINJAMAN RUANGAN Approvers
            ['user_id' => 2, 'module' => 'peminjaman-ruangan', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 3, 'module' => 'peminjaman-ruangan', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 8, 'module' => 'peminjaman-ruangan', 'approval_level' => 1, 'department_type' => 'akademik', 'active' => true],

            // PERMINTAAN DESIGN Approvers
            ['user_id' => 4, 'module' => 'permintaan-design', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 5, 'module' => 'permintaan-design', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 6, 'module' => 'permintaan-design', 'approval_level' => 3, 'department_type' => 'non-akademik', 'active' => true],

            // SURAT TUGAS Approvers
            ['user_id' => 2, 'module' => 'surat-tugas', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 3, 'module' => 'surat-tugas', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 4, 'module' => 'surat-tugas', 'approval_level' => 3, 'department_type' => 'non-akademik', 'active' => true],

            // OPERATIONAL REQUEST Approvers
            ['user_id' => 2, 'module' => 'operational-request', 'approval_level' => 1, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 3, 'module' => 'operational-request', 'approval_level' => 2, 'department_type' => 'non-akademik', 'active' => true],
            ['user_id' => 8, 'module' => 'operational-request', 'approval_level' => 1, 'department_type' => 'akademik', 'active' => true],
        ];

        foreach ($approvers as $approver) {
            // Check if user exists before creating approver
            if (User::find($approver['user_id'])) {
                Approver::create($approver);
            }
        }

        $this->command->info('Approval system seeded successfully!');
        $this->command->info('Created ' . count($approvalSettings) . ' approval settings');
        $this->command->info('Created ' . count($approvers) . ' approver configurations');
    }
}
