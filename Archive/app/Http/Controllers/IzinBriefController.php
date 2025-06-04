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

        // Handle file upload for dokumen
        if ($request->hasFile('dokumen')) {
            $dokumenPath = $request->file('dokumen')->store('private/dokumen_brief');
        } else {
            $dokumenPath = null;
        }

        // Store the brief leave request data in the database
        IzinBrief::create([
            'employee_id' => $request->employee_id,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'keperluan' => $request->keperluan,
            'dokumen' => $dokumenPath,
            'status' => 'pending',
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
        // Check if current user is an approver for brief-absen
        if (!Auth::user()->isApproverFor('brief-absen')) {
            return redirect()->route('brief.index')
                ->with('error', 'Anda tidak memiliki hak untuk menyetujui pengajuan izin brief.');
        }
        
        $brief = IzinBrief::findOrFail($id);
        $brief->status = 'approved';
        $brief->save();

        return redirect('/brief-absen')->with('success', 'Pengajuan izin brief disetujui.');
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
        // Check if current user is an approver for brief-absen
        if (!Auth::user()->isApproverFor('brief-absen')) {
            return redirect('/brief-absen')
                ->with('error', 'Anda tidak memiliki hak untuk menolak pengajuan izin brief.');
        }
        
        $request->validate([
            'rejected_message' => 'required|string|max:1000',
        ]);

        $brief = IzinBrief::findOrFail($id);
        $brief->status = 'rejected';
        $brief->rejected_message = $request->rejected_message;
        $brief->save();

        return redirect('/brief-absen')->with('success', 'Pengajuan izin brief telah ditolak dengan pesan.');
    }
}
