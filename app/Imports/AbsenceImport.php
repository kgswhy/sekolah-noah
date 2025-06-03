<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Shift;
use App\Models\Schedule;
use App\Models\Absence;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Exception;

class AbsenceImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        try {
            DB::beginTransaction();

            // Convert employee number to string if it's numeric
            $employeeNumber = (string) $row['nik'];

            // Find employee by employee number
            $employee = Employee::where('employee_number', $employeeNumber)->first();
            if (!$employee) {
                throw new Exception("Karyawan dengan nomor induk {$employeeNumber} tidak ditemukan");
            }

            // Find shift
            $shift = Shift::where('title', $row['shift'])->first();
            if (!$shift) {
                throw new Exception("Shift {$row['shift']} tidak ditemukan");
            }

            // Parse date
            $date = Carbon::parse($row['tanggal_yyyy_mm_dd'])->format('Y-m-d');

            // Find or create schedule
            $schedule = Schedule::firstOrCreate(
                [
                    'employee_id' => $employee->id,
                    'date' => $date,
                ],
                [
                    'shift_id' => $shift->id,
                ]
            );

            // Get status from input
            $status = strtolower($row['status'] ?? '');
            if (!in_array($status, ['present', 'late', 'absent'])) {
                throw new Exception("Status tidak valid. Harus berupa 'present', 'late', atau 'absent'");
            }

            // Set clock in/out times based on status
            if ($status === 'absent') {
                $clockIn = '00:00:00';
                $clockOut = '00:00:00';
            } else {
                // For present/late status, clock in/out times are required
                if (empty($row['jam_masuk']) || empty($row['jam_keluar'])) {
                    throw new Exception("Jam masuk dan jam keluar harus diisi untuk status {$status}");
                }
                $clockIn = Carbon::parse($row['jam_masuk'])->format('H:i:s');
                $clockOut = Carbon::parse($row['jam_keluar'])->format('H:i:s');
            }

            // Create or update absence record
            $absence = Absence::updateOrCreate(
                [
                    'schedule_id' => $schedule->id,
                ],
                [
                    'clock_in' => $clockIn,
                    'clock_out' => $clockOut,
                    'status' => $status,
                    'late' => $status === 'late',
                ]
            );

            DB::commit();
            return $absence;

        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception("Error pada baris dengan nomor induk {$row['nik']}: " . $e->getMessage());
        }
    }

    public function rules(): array
    {
        return [
            'nik' => 'required',
            'tanggal_yyyy_mm_dd' => 'required|date_format:Y-m-d',
            'shift' => 'required',
            'status' => 'required|in:present,late,absent',
            'jam_masuk' => 'required_if:status,present,late|nullable|date_format:H:i:s',
            'jam_keluar' => 'required_if:status,present,late|nullable|date_format:H:i:s',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nik.required' => 'Nomor induk karyawan harus diisi',
            'tanggal_yyyy_mm_dd.required' => 'Tanggal harus diisi',
            'tanggal_yyyy_mm_dd.date_format' => 'Format tanggal harus YYYY-MM-DD',
            'shift.required' => 'Shift harus diisi',
            'status.required' => 'Status harus diisi',
            'status.in' => 'Status harus berupa present, late, atau absent',
            'jam_masuk.required_if' => 'Jam masuk harus diisi untuk status present/late',
            'jam_masuk.date_format' => 'Format jam masuk harus HH:mm:ss',
            'jam_keluar.required_if' => 'Jam keluar harus diisi untuk status present/late',
            'jam_keluar.date_format' => 'Format jam keluar harus HH:mm:ss',
        ];
    }
} 