<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use App\Models\Employee;
use App\Models\Schedule;
use App\Models\Shift;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AbsenceImport;
use App\Exports\AbsenceTemplateExport;

class AbsenceController extends Controller
{
    public function index()
    {
        $absences = Absence::with(['schedule.employee', 'schedule.shift'])->get();
        return view('pages.absence.index', compact('absences'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        try {
            Excel::import(new AbsenceImport, $request->file('file'));
            return redirect()->back()->with('success', 'Data absensi berhasil diimport');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        return Excel::download(new AbsenceTemplateExport, 'template_absensi.xlsx');
    }

    public function edit($id)
    {
        $absence = Absence::with(['schedule.employee', 'schedule.shift'])->findOrFail($id);
        return view('pages.absence.edit', compact('absence'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'clock_in' => 'required',
            'clock_out' => 'required',
            'status' => 'required'
        ]);

        $absence = Absence::findOrFail($id);
        $absence->update([
            'clock_in' => Carbon::parse($request->clock_in)->format('Y-m-d H:i:s'),
            'clock_out' => Carbon::parse($request->clock_out)->format('Y-m-d H:i:s'),
            'status' => $request->status
        ]);

        return redirect()->route('absence.index')->with('success', 'Data absensi berhasil diperbarui');
    }

    public function delete($id)
    {
        $absence = Absence::findOrFail($id);
        $absence->delete();
        return redirect()->back()->with('success', 'Data absensi berhasil dihapus');
    }

    public function template()
    {
        return Excel::download(new AbsenceTemplateExport, 'template_absensi.xlsx');
    }
}