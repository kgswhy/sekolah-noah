<?php

namespace App\Exports;

use App\Models\Employee;
use App\Models\Shift;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AbsenceTemplateExport implements FromArray, WithHeadings, WithStyles, ShouldAutoSize
{
    public function array(): array
    {
        // Get first employee and shift for example
        $employee = Employee::first();
        $shift = Shift::first();
        $today = Carbon::now()->format('Y-m-d');

        return [
            // Example 1: Present (on time)
            [
                'nik' => $employee ? $employee->employee_number : 'EMP-0001',
                'tanggal_yyyy_mm_dd' => $today,
                'shift' => $shift ? $shift->title : 'Pagi',
                'jam_masuk' => '08:00:00',
                'jam_keluar' => '17:00:00',
                'status' => 'present'
            ],
            // Example 2: Late
            [
                'nik' => $employee ? $employee->employee_number : 'EMP-0001',
                'tanggal_yyyy_mm_dd' => $today,
                'shift' => $shift ? $shift->title : 'Pagi',
                'jam_masuk' => '08:30:00',
                'jam_keluar' => '17:30:00',
                'status' => 'late'
            ],
            // Example 3: Absent
            [
                'nik' => $employee ? $employee->employee_number : 'EMP-0001',
                'tanggal_yyyy_mm_dd' => $today,
                'shift' => $shift ? $shift->title : 'Pagi',
                'jam_masuk' => '',
                'jam_keluar' => '',
                'status' => 'absent'
            ]
        ];
    }

    public function headings(): array
    {
        return [
            'nik',
            'tanggal_yyyy_mm_dd',
            'shift',
            'jam_masuk',
            'jam_keluar',
            'status'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Add data validation for status column
        $statusValidation = $sheet->getCell('F2')->getDataValidation();
        $statusValidation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST);
        $statusValidation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
        $statusValidation->setAllowBlank(false);
        $statusValidation->setShowInputMessage(true);
        $statusValidation->setShowErrorMessage(true);
        $statusValidation->setShowDropDown(true);
        $statusValidation->setFormula1('"present,late,absent"');
        
        // Apply validation to all rows
        $sheet->setDataValidation('F2:F1000', $statusValidation);

        // Add data validation for time format
        $timeValidation = $sheet->getCell('D2')->getDataValidation();
        $timeValidation->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_CUSTOM);
        $timeValidation->setErrorStyle(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::STYLE_INFORMATION);
        $timeValidation->setAllowBlank(true);
        $timeValidation->setShowInputMessage(true);
        $timeValidation->setShowErrorMessage(true);
        $timeValidation->setFormula1('=AND(ISNUMBER(D2),D2>=0,D2<1)');
        
        // Apply time validation to clock in/out columns
        $sheet->setDataValidation('D2:E1000', $timeValidation);

        return [
            1 => ['font' => ['bold' => true]], // Header row
            'A1:F1' => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'rgb' => 'E2EFDA',
                    ],
                ],
            ],
            'A2:F4' => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }
} 