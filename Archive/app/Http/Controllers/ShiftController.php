<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    // Display all shifts
    public function index()
    {
        $shifts = Shift::all();
        return view('pages.shifts.index', compact('shifts'));
    }

    // Show the form to create a new shift
    public function create()
    {
        return view('pages.shifts.create');
    }

    // Store a newly created shift
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        Shift::create($request->all());

        return redirect()->route('shifts.index')->with('success', 'Shift created successfully!');
    }

    // Show the form to edit an existing shift
    public function edit(Shift $shift)
    {
        return view('pages.shifts.edit', compact('shift'));
    }

    // Update the specified shift
    public function update(Request $request, Shift $shift)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        $shift->update($request->all());

        return redirect()->route('shifts.index')->with('success', 'Shift updated successfully!');
    }

    // Delete the specified shift
    public function destroy(Shift $shift)
    {
        $shift->delete();

        return redirect()->route('shifts.index')->with('success', 'Shift deleted successfully!');
    }
}

