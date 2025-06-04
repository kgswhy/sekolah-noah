<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Shift;
use App\Models\Schedule;
use App\Models\Absence;
use Carbon\Carbon;

class AbsenceSeeder extends Seeder
{
    public function run(): void
    {
        // Get all employees
        $employees = Employee::all();
        
        // Get all shifts
        $shifts = Shift::all();
        
        if ($shifts->isEmpty()) {
            // Create default shifts if none exist
            $shifts = collect([
                Shift::create([
                    'title' => 'Shift Pagi',
                    'start_time' => '08:00:00',
                    'end_time' => '17:00:00',
                ]),
                Shift::create([
                    'title' => 'Shift Siang',
                    'start_time' => '12:00:00',
                    'end_time' => '19:30:00',
                ]),
            ]);
        }

        // Generate absence data for the last 30 days
        for ($i = 0; $i < 30; $i++) {
            $date = Carbon::now()->subDays($i);
            
            foreach ($employees as $employee) {
                // Randomly select a shift
                $shift = $shifts->random();
                
                // Create schedule
                $schedule = Schedule::firstOrCreate(
                    [
                        'employee_id' => $employee->id,
                        'date' => $date->format('Y-m-d'),
                    ],
                    [
                        'shift_id' => $shift->id,
                    ]
                );

                // Determine if employee is absent
                $isAbsent = rand(0, 10) > 9;
                
                if ($isAbsent) {
                    // For absent employees, use default times
                    $clockIn = '00:00:00';
                    $clockOut = '00:00:00';
                    $status = 'absent';
                    $isLate = false;
                } else {
                    // Generate random clock in/out times for present employees
                    $clockIn = Carbon::parse($shift->start_time);
                    $clockOut = Carbon::parse($shift->end_time);
                    
                    // Randomly make some employees late
                    $isLate = false;
                    if (rand(0, 10) > 8) {
                        $clockIn->addMinutes(rand(1, 30));
                        $isLate = true;
                    }
                    
                    // Randomly make some employees leave early
                    if (rand(0, 10) > 8) {
                        $clockOut->subMinutes(rand(1, 30));
                    }

                    // Determine status
                    $status = $isLate ? 'late' : 'present';
                }

                // Create absence record
                Absence::updateOrCreate(
                    [
                        'schedule_id' => $schedule->id,
                    ],
                    [
                        'clock_in' => $clockIn instanceof Carbon ? $clockIn->format('H:i:s') : $clockIn,
                        'clock_out' => $clockOut instanceof Carbon ? $clockOut->format('H:i:s') : $clockOut,
                        'status' => $status,
                        'late' => $isLate,
                    ]
                );
            }
        }
    }
} 