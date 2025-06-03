<?php

namespace App\Http\Controllers;

use App\Models\KlaimBerobat;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KlaimBerobatController extends Controller
{
    /**
     * Display a listing of medical claims
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $klaims = KlaimBerobat::with('employee')->get();
        return view('pages.klaim-berobat.index', compact('klaims'));
    }
    
    /**
     * Show the form for creating a new medical claim
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retrieve the logged-in user's employee data
        $employee = Auth::user()->employee;  // Assuming User model has a relationship with Employee

        return view('pages.klaim-berobat.create', compact('employee'));
    }

    /**
     * Store a newly created medical claim in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'tanggal_berobat' => 'required|date',
            'nama_pasien' => 'required|string|max:255',
            'hubungan' => 'required|string|max:255',
            'diagnosa' => 'required|string',
            'nama_dokter' => 'required|string|max:255',
            'nama_rs' => 'required|string|max:255',
            'biaya' => 'required|numeric|min:1',
            'bukti_pembayaran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $employee = Auth::user()->employee;

        // Handle file upload for bukti_pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            $buktiPath = $request->file('bukti_pembayaran')->store('private/klaim_berobat');
        } else {
            $buktiPath = null;
        }

        // Determine department type based on employee division
        $departmentType = strtolower($employee->division) === 'akademik' ? 'akademik' : 'non-akademik';

        // Store the medical claim data in the database
        KlaimBerobat::create([
            'employee_id' => $request->employee_id,
            'tanggal_berobat' => $request->tanggal_berobat,
            'nama_pasien' => $request->nama_pasien,
            'hubungan' => $request->hubungan,
            'diagnosa' => $request->diagnosa,
            'nama_dokter' => $request->nama_dokter,
            'nama_rs' => $request->nama_rs,
            'biaya' => $request->biaya,
            'bukti_pembayaran' => $buktiPath,
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => $departmentType
        ]);

        return redirect()->route('klaim.index')->with('success', 'Klaim berobat berhasil diajukan!');
    }
    
    /**
     * Display the specified medical claim
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $klaim = KlaimBerobat::with('employee')->findOrFail($id);
        return view('pages.klaim-berobat.detail', compact('klaim'));
    }
    
    /**
     * Show the form for editing the specified medical claim
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $klaim = KlaimBerobat::findOrFail($id);
        $employee = $klaim->employee;
        
        return view('pages.klaim-berobat.edit', compact('klaim', 'employee'));
    }
    
    /**
     * Update the specified medical claim in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'tanggal_berobat' => 'required|date',
            'nama_pasien' => 'required|string|max:255',
            'hubungan' => 'required|string|max:255',
            'diagnosa' => 'required|string',
            'nama_dokter' => 'required|string|max:255',
            'nama_rs' => 'required|string|max:255',
            'biaya' => 'required|numeric|min:1',
            'bukti_pembayaran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        
        $klaim = KlaimBerobat::findOrFail($id);
        
        // Handle file upload for bukti_pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            // Delete old file if exists
            if ($klaim->bukti_pembayaran) {
                Storage::delete($klaim->bukti_pembayaran);
            }
            $buktiPath = $request->file('bukti_pembayaran')->store('private/klaim_berobat');
        } else {
            $buktiPath = $klaim->bukti_pembayaran;
        }
        
        // Update the medical claim
        $klaim->update([
            'tanggal_berobat' => $request->tanggal_berobat,
            'nama_pasien' => $request->nama_pasien,
            'hubungan' => $request->hubungan,
            'diagnosa' => $request->diagnosa,
            'nama_dokter' => $request->nama_dokter,
            'nama_rs' => $request->nama_rs,
            'biaya' => $request->biaya,
            'bukti_pembayaran' => $buktiPath,
            'status' => 'pending', // Reset to pending after update
        ]);
        
        return redirect()->route('klaim.index')->with('success', 'Klaim berobat berhasil diperbarui!');
    }
    
    /**
     * Remove the specified medical claim from storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $klaim = KlaimBerobat::findOrFail($id);
        
        // Delete associated file if exists
        if ($klaim->bukti_pembayaran) {
            Storage::delete($klaim->bukti_pembayaran);
        }
        
        $klaim->delete();
        
        return redirect()->route('klaim.index')->with('success', 'Klaim berobat berhasil dihapus!');
    }
    
    /**
     * Download the proof of payment document
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|\Illuminate\Http\Response
     */
    public function downloadDocument($id)
    {
        $klaim = KlaimBerobat::findOrFail($id);
        
        if (!$klaim->bukti_pembayaran) {
            abort(404, 'Dokumen tidak ditemukan');
        }
        
        if (Storage::exists($klaim->bukti_pembayaran)) {
            return Storage::download($klaim->bukti_pembayaran);
        }
        
        abort(404, 'Dokumen tidak ditemukan');
    }
    
    /**
     * Preview the proof of payment in the browser
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function previewDocument($id)
    {
        $klaim = KlaimBerobat::findOrFail($id);
        
        if (!$klaim->bukti_pembayaran) {
            abort(404, 'Dokumen tidak ditemukan');
        }
        
        if (!Storage::exists($klaim->bukti_pembayaran)) {
            abort(404, 'Dokumen tidak ditemukan');
        }
        
        $file = Storage::get($klaim->bukti_pembayaran);
        $type = Storage::mimeType($klaim->bukti_pembayaran);
        $fileName = basename($klaim->bukti_pembayaran);
        
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
     * Approve the specified medical claim
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        $user = Auth::user();
        $klaim = KlaimBerobat::findOrFail($id);
        $currentLevel = $klaim->current_approval_level;

        // Check if current user is approver at current level
        $isApprover = \App\Models\Approver::where('module', 'klaim-berobat')
            ->where('department_type', $klaim->department_type)
            ->where('active', true)
            ->where('user_id', $user->id)
            ->where('approval_level', $currentLevel)
            ->exists();

        if (!$isApprover) {
            return redirect()->route('klaim.index')
                ->with('error', 'Anda tidak memiliki hak untuk menyetujui pengajuan ini di level saat ini.');
        }

        // Check if this is the final approval level
        $maxLevel = \App\Models\Approver::where('module', 'klaim-berobat')
            ->where('department_type', $klaim->department_type)
            ->where('active', true)
            ->max('approval_level');

        // Add to approval history
        $history = $klaim->approval_history ?? [];
        $history[] = [
            'level' => $currentLevel,
            'status' => 'approved',
            'approver_name' => $user->name,
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'notes' => null
        ];

        if ($currentLevel >= $maxLevel) {
            // Final approval
            $klaim->update([
                'status' => 'approved',
                'final_status' => 'approved',
                'approved_by' => $user->id,
                'approved_at' => now(),
                'approval_history' => $history
            ]);
        } else {
            // Move to next level
            $klaim->update([
                'current_approval_level' => $currentLevel + 1,
                'approval_history' => $history
            ]);
        }

        return redirect()->route('klaim.index')->with('success', 'Pengajuan klaim berobat berhasil disetujui.');
    }

    /**
     * Reject the specified medical claim with a reason
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, $id)
    {
        $user = Auth::user();
        $klaim = KlaimBerobat::findOrFail($id);
        $currentLevel = $klaim->current_approval_level;

        // Check if user is authorized to reject at current level
        $isApprover = \App\Models\Approver::where('module', 'klaim-berobat')
            ->where('department_type', $klaim->department_type)
            ->where('active', true)
            ->where('user_id', $user->id)
            ->where('approval_level', $currentLevel)
            ->exists();

        if (!$isApprover) {
            return redirect()->route('klaim.index')
                ->with('error', 'Anda tidak memiliki akses untuk menolak pengajuan ini di level saat ini.');
        }

        if ($klaim->status !== 'pending') {
            return redirect()->route('klaim.index')
                ->with('error', 'Pengajuan sudah diproses sebelumnya.');
        }

        $request->validate([
            'rejected_message' => 'required|string|max:1000',
        ]);

        // Add to approval history
        $history = $klaim->approval_history ?? [];
        $history[] = [
            'level' => $currentLevel,
            'status' => 'rejected',
            'approver_name' => $user->name,
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'notes' => $request->rejected_message
        ];

        $klaim->update([
            'status' => 'rejected',
            'final_status' => 'rejected',
            'rejected_by' => $user->id,
            'rejected_message' => $request->rejected_message,
            'rejected_at' => now(),
            'approval_history' => $history
        ]);

        return redirect()->route('klaim.index')->with('success', 'Pengajuan klaim berobat telah ditolak dengan pesan.');
    }
} 