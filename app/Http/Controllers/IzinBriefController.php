<?php

namespace App\Http\Controllers;

use App\Models\IzinBrief;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class IzinBriefController extends Controller
{
    /**
     * Display a listing of brief leave requests
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $briefs = IzinBrief::with('employee')->get();
        return view('pages.izin-brief.index', compact('briefs'));
    }
    
    /**
     * Show the form for creating a new brief leave request
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retrieve the logged-in user's employee data
        $employee = Auth::user()->employee;  // Assuming User model has a relationship with Employee

        return view('pages.izin-brief.create', compact('employee'));
    }

    /**
     * Store a newly created brief leave request in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu' => 'required|string',
            'keperluan' => 'required|string',
            'dokumen' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $employee = Auth::user()->employee;

        // Handle file upload for dokumen
        if ($request->hasFile('dokumen')) {
            $dokumenPath = $request->file('dokumen')->store('private/dokumen_brief');
        } else {
            $dokumenPath = null;
        }

        // Determine department type based on employee division
        $departmentType = strtolower($employee->division) === 'akademik' ? 'akademik' : 'non-akademik';

        // Store the brief leave request data in the database
        IzinBrief::create([
            'employee_id' => $request->employee_id,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'keperluan' => $request->keperluan,
            'dokumen' => $dokumenPath,
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => $departmentType
        ]);

        return redirect('/brief-absen')->with('success', 'Izin brief berhasil diajukan!');
    }
    
    /**
     * Display the specified brief leave request
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $brief = IzinBrief::with('employee')->findOrFail($id);
        return view('pages.izin-brief.detail', compact('brief'));
    }
    
    /**
     * Show the form for editing the specified brief leave request
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $brief = IzinBrief::findOrFail($id);
        $employee = $brief->employee;
        
        return view('pages.izin-brief.edit', compact('brief', 'employee'));
    }
    
    /**
     * Update the specified brief leave request in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'tanggal' => 'required|date',
            'waktu' => 'required|string',
            'keperluan' => 'required|string',
            'dokumen' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);
        
        $brief = IzinBrief::findOrFail($id);
        
        // Handle file upload for dokumen
        if ($request->hasFile('dokumen')) {
            // Delete old file if exists
            if ($brief->dokumen) {
                Storage::delete($brief->dokumen);
            }
            $dokumenPath = $request->file('dokumen')->store('private/dokumen_brief');
        } else {
            $dokumenPath = $brief->dokumen;
        }
        
        // Update the brief leave request
        $brief->update([
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'keperluan' => $request->keperluan,
            'dokumen' => $dokumenPath,
            'status' => 'pending', // Reset to pending after update
        ]);
        
        return redirect('/brief-absen')->with('success', 'Izin brief berhasil diperbarui!');
    }
    
    /**
     * Remove the specified brief leave request from storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $brief = IzinBrief::findOrFail($id);
        
        // Delete associated file if exists
        if ($brief->dokumen) {
            Storage::delete($brief->dokumen);
        }
        
        $brief->delete();
        
        return redirect('/brief-absen')->with('success', 'Izin brief berhasil dihapus!');
    }
    
    /**
     * Download the document associated with the brief leave request
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|\Illuminate\Http\Response
     */
    public function downloadDocument($id)
    {
        $brief = IzinBrief::findOrFail($id);
        
        if (!$brief->dokumen) {
            abort(404, 'Dokumen tidak ditemukan');
        }
        
        if (Storage::exists($brief->dokumen)) {
            return Storage::download($brief->dokumen);
        }
        
        abort(404, 'Dokumen tidak ditemukan');
    }
    
    /**
     * Preview the document in the browser
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function previewDocument($id)
    {
        $brief = IzinBrief::findOrFail($id);
        
        if (!$brief->dokumen) {
            abort(404, 'Dokumen tidak ditemukan');
        }
        
        if (!Storage::exists($brief->dokumen)) {
            abort(404, 'Dokumen tidak ditemukan');
        }
        
        $file = Storage::get($brief->dokumen);
        $type = Storage::mimeType($brief->dokumen);
        $fileName = basename($brief->dokumen);
        
        // Stream the file for preview in browser
        $response = response($file, 200)->header('Content-Type', $type);
        
        // For files that should be displayed in browser (PDF, images)
        if (in_array($type, ['application/pdf', 'image/jpeg', 'image/png', 'image/gif'])) {
            $response->header('Content-Disposition', 'inline; filename="' . $fileName . '"');
        } else {
            // For other file types, use attachment (download)
            $response->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
        }
        
        return $response;
    }

    /**
     * Approve the specified brief leave request
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        $user = Auth::user();
        $brief = IzinBrief::findOrFail($id);
        $currentLevel = $brief->current_approval_level;

        // Check if current user is approver at current level
        $isApprover = \App\Models\Approver::where('module', 'brief-absen')
            ->where('department_type', $brief->department_type)
            ->where('active', true)
            ->where('user_id', $user->id)
            ->where('approval_level', $currentLevel)
            ->exists();

        if (!$isApprover) {
            return redirect('/brief-absen')
                ->with('error', 'Anda tidak memiliki hak untuk menyetujui pengajuan ini di level saat ini.');
        }

        // Check if this is the final approval level
        $maxLevel = \App\Models\Approver::where('module', 'brief-absen')
            ->where('department_type', $brief->department_type)
            ->where('active', true)
            ->max('approval_level');

        // Add to approval history
        $history = $brief->approval_history ?? [];
        $history[] = [
            'level' => $currentLevel,
            'status' => 'approved',
            'approver_name' => $user->name,
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'notes' => null
        ];

        if ($currentLevel >= $maxLevel) {
            // Final approval
            $brief->update([
                'status' => 'approved',
                'final_status' => 'approved',
                'approved_by' => $user->id,
                'approved_at' => now(),
                'approval_history' => $history
            ]);
        } else {
            // Move to next level
            $brief->update([
                'current_approval_level' => $currentLevel + 1,
                'approval_history' => $history
            ]);
        }

        return redirect('/brief-absen')->with('success', 'Pengajuan izin brief berhasil disetujui.');
    }

    /**
     * Reject the specified brief leave request with a reason
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, $id)
    {
        $user = Auth::user();
        $brief = IzinBrief::findOrFail($id);
        $currentLevel = $brief->current_approval_level;

        // Check if user is authorized to reject at current level
        $isApprover = \App\Models\Approver::where('module', 'brief-absen')
            ->where('department_type', $brief->department_type)
            ->where('active', true)
            ->where('user_id', $user->id)
            ->where('approval_level', $currentLevel)
            ->exists();

        if (!$isApprover) {
            return redirect('/brief-absen')
                ->with('error', 'Anda tidak memiliki akses untuk menolak pengajuan ini di level saat ini.');
        }

        if ($brief->status !== 'pending') {
            return redirect('/brief-absen')
                ->with('error', 'Pengajuan sudah diproses sebelumnya.');
        }

        $request->validate([
            'rejected_message' => 'required|string|max:1000',
        ]);

        // Add to approval history
        $history = $brief->approval_history ?? [];
        $history[] = [
            'level' => $currentLevel,
            'status' => 'rejected',
            'approver_name' => $user->name,
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'notes' => $request->rejected_message
        ];

        $brief->update([
            'status' => 'rejected',
            'final_status' => 'rejected',
            'rejected_by' => $user->id,
            'rejected_message' => $request->rejected_message,
            'rejected_at' => now(),
            'approval_history' => $history
        ]);

        return redirect('/brief-absen')->with('success', 'Pengajuan izin brief telah ditolak dengan pesan.');
    }
}
