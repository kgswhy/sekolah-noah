<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Shift;
use App\Models\Employee;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // Display all schedules
    public function index()
    {
        $schedules = Schedule::with(['shift', 'employee'])->get();
        return view('pages.schedules.index', compact('schedules'));
    }

    // Show the form to create a new schedule
    public function create()
    {
        $shifts = Shift::all();
        $employees = Employee::all();
        return view('pages.schedules.create', compact('shifts', 'employees'));
    }

    // Store a newly created schedule
    public function store(Request $request)
    {
        $request->validate([
            'shift_id' => 'required|exists:shifts,id',
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully!');
    }

    // Show the form to edit an existing schedule
    public function edit(Schedule $schedule)
    {
        $shifts = Shift::all();
        $employees = Employee::all();
        return view('pages.schedules.edit', compact('schedule', 'shifts', 'employees'));
    }

    // Update the specified schedule
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'shift_id' => 'required|exists:shifts,id',
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully!');
    }

    // Delete the specified schedule
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully!');
    }
}
