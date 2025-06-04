<?php

namespace App\Http\Controllers;

use App\Models\SlipGajiSKK;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SlipGajiSKKController extends Controller
{
    /**
     * Display a listing of the salary slip / work certificate requests.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $requests = SlipGajiSKK::with('employee')->get();
        return view('pages.slip-gaji-skk.index', compact('requests'));
    }
    
    /**
     * Show the form for creating a new request.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retrieve the logged-in user's employee data
        $employee = Auth::user()->employee;  // Assuming User model has a relationship with Employee

        return view('pages.slip-gaji-skk.create', compact('employee'));
    }

    /**
     * Store a newly created request in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'jenis_permintaan' => 'required|in:Slip Gaji,Surat Keterangan Kerja',
            'keterangan' => 'required|string',
            'bulan_tahun' => 'required|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload for dokumen_pendukung
        if ($request->hasFile('dokumen_pendukung')) {
            $dokumenPath = $request->file('dokumen_pendukung')->store('private/slip_gaji_skk');
        } else {
            $dokumenPath = null;
        }

        // Store the request data in the database
        SlipGajiSKK::create([
            'employee_id' => $request->employee_id,
            'jenis_permintaan' => $request->jenis_permintaan,
            'keterangan' => $request->keterangan,
            'bulan_tahun' => $request->bulan_tahun,
            'dokumen_pendukung' => $dokumenPath,
            'status' => 'pending',
        ]);

        return redirect()->route('slip-gaji-skk.index')->with('success', 'Permintaan berhasil diajukan!');
    }
    
    /**
     * Display the specified request.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $request = SlipGajiSKK::with('employee')->findOrFail($id);
        return view('pages.slip-gaji-skk.detail', compact('request'));
    }
    
    /**
     * Show the form for editing the specified request.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $request = SlipGajiSKK::findOrFail($id);
        $employee = $request->employee;
        
        return view('pages.slip-gaji-skk.edit', compact('request', 'employee'));
    }
    
    /**
     * Update the specified request in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'jenis_permintaan' => 'required|in:Slip Gaji,Surat Keterangan Kerja',
            'keterangan' => 'required|string',
            'bulan_tahun' => 'required|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        
        $slipRequest = SlipGajiSKK::findOrFail($id);
        
        // Handle file upload for dokumen_pendukung
        if ($request->hasFile('dokumen_pendukung')) {
            // Delete old file if exists
            if ($slipRequest->dokumen_pendukung) {
                Storage::delete($slipRequest->dokumen_pendukung);
            }
            $dokumenPath = $request->file('dokumen_pendukung')->store('private/slip_gaji_skk');
        } else {
            $dokumenPath = $slipRequest->dokumen_pendukung;
        }
        
        // Update the request
        $slipRequest->update([
            'jenis_permintaan' => $request->jenis_permintaan,
            'keterangan' => $request->keterangan,
            'bulan_tahun' => $request->bulan_tahun,
            'dokumen_pendukung' => $dokumenPath,
            'status' => 'pending', // Reset to pending after update
        ]);
        
        return redirect()->route('slip-gaji-skk.index')->with('success', 'Permintaan berhasil diperbarui!');
    }
    
    /**
     * Remove the specified request from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $request = SlipGajiSKK::findOrFail($id);
        
        // Delete associated file if exists
        if ($request->dokumen_pendukung) {
            Storage::delete($request->dokumen_pendukung);
        }
        
        $request->delete();
        
        return redirect()->route('slip-gaji-skk.index')->with('success', 'Permintaan berhasil dihapus!');
    }
    
    /**
     * Download the supporting document
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|\Illuminate\Http\Response
     */
    public function downloadDocument($id)
    {
        $request = SlipGajiSKK::findOrFail($id);
        
        if (!$request->dokumen_pendukung) {
            abort(404, 'Dokumen tidak ditemukan');
        }
        
        if (Storage::exists($request->dokumen_pendukung)) {
            return Storage::download($request->dokumen_pendukung);
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
        $request = SlipGajiSKK::findOrFail($id);
        
        if (!$request->dokumen_pendukung) {
            abort(404, 'Dokumen tidak ditemukan');
        }
        
        if (!Storage::exists($request->dokumen_pendukung)) {
            abort(404, 'Dokumen tidak ditemukan');
        }
        
        $file = Storage::get($request->dokumen_pendukung);
        $type = Storage::mimeType($request->dokumen_pendukung);
        $fileName = basename($request->dokumen_pendukung);
        
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
     * Approve the specified request
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        // Check if current user is an approver for slip-gaji
        if (!Auth::user()->isApproverFor('slip-gaji')) {
            return redirect()->route('slip-gaji-skk.index')
                ->with('error', 'Anda tidak memiliki hak untuk menyetujui permintaan ini.');
        }
        
        $request = SlipGajiSKK::findOrFail($id);
        $request->status = 'approved';
        $request->save();

        return redirect()->route('slip-gaji-skk.index')->with('success', 'Permintaan disetujui.');
    }

    /**
     * Reject the specified request with a reason
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, $id)
    {
        // Check if current user is an approver for slip-gaji
        if (!Auth::user()->isApproverFor('slip-gaji')) {
            return redirect()->route('slip-gaji-skk.index')
                ->with('error', 'Anda tidak memiliki hak untuk menolak permintaan ini.');
        }
        
        $request->validate([
            'rejected_message' => 'required|string|max:1000',
        ]);

        $slipRequest = SlipGajiSKK::findOrFail($id);
        $slipRequest->status = 'rejected';
        $slipRequest->rejected_message = $request->rejected_message;
        $slipRequest->save();

        return redirect()->route('slip-gaji-skk.index')->with('success', 'Permintaan telah ditolak dengan pesan.');
    }
} 