<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LemburHonor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LemburHonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        
        // Check if the user is an admin or approver
        if ($user->isAdmin() || $user->isApproverFor('lembur')) {
            $lemburHonors = LemburHonor::with('employee')->latest()->get();
        } else {
            // Regular employee can only see their own requests
            $lemburHonors = LemburHonor::where('employee_id', $employee->id)->latest()->get();
        }
        
        return view('pages.lembur-honor.index', compact('lemburHonors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::where('user_id', Auth::id())->first();
        return view('pages.lembur-honor.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|in:lembur,honor',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'waktu_mulai' => 'nullable|date_format:H:i',
            'waktu_selesai' => 'nullable|date_format:H:i',
            'durasi' => 'required|integer|min:1',
            'kegiatan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $employee = Employee::where('user_id', Auth::id())->first();
        
        $lemburHonor = new LemburHonor();
        $lemburHonor->employee_id = $employee->id;
        $lemburHonor->jenis = $request->jenis;
        $lemburHonor->tanggal_mulai = $request->tanggal_mulai;
        $lemburHonor->tanggal_selesai = $request->tanggal_selesai;
        $lemburHonor->waktu_mulai = $request->waktu_mulai;
        $lemburHonor->waktu_selesai = $request->waktu_selesai;
        $lemburHonor->durasi = $request->durasi;
        $lemburHonor->kegiatan = $request->kegiatan;
        $lemburHonor->lokasi = $request->lokasi;
        $lemburHonor->keterangan = $request->keterangan;
        $lemburHonor->status = 'pending';
        
        if ($request->hasFile('dokumen_pendukung')) {
            $file = $request->file('dokumen_pendukung');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/dokumen/lembur-honor', $fileName);
            $lemburHonor->dokumen_pendukung = $fileName;
        }
        
        $lemburHonor->save();
        
        return redirect()->route('lembur-honor.index')->with('success', 'Pengajuan lembur/honor berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lemburHonor = LemburHonor::with(['employee', 'approver'])->findOrFail($id);
        
        // Authorization check
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        
        if (!$user->isAdmin() && !$user->isApproverFor('lembur') && $employee->id != $lemburHonor->employee_id) {
            return redirect()->route('lembur-honor.index')->with('error', 'Anda tidak memiliki akses untuk melihat data ini.');
        }
        
        return view('pages.lembur-honor.detail', compact('lemburHonor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lemburHonor = LemburHonor::findOrFail($id);
        
        // Authorization check
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        
        if ($employee->id != $lemburHonor->employee_id) {
            return redirect()->route('lembur-honor.index')->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }
        
        if ($lemburHonor->status != 'pending') {
            return redirect()->route('lembur-honor.index')->with('error', 'Anda hanya dapat mengedit pengajuan yang masih dalam status menunggu.');
        }
        
        return view('pages.lembur-honor.edit', compact('lemburHonor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|in:lembur,honor',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'waktu_mulai' => 'nullable|date_format:H:i',
            'waktu_selesai' => 'nullable|date_format:H:i',
            'durasi' => 'required|integer|min:1',
            'kegiatan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        
        $lemburHonor = LemburHonor::findOrFail($id);
        
        // Authorization check
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        
        if ($employee->id != $lemburHonor->employee_id) {
            return redirect()->route('lembur-honor.index')->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }
        
        if ($lemburHonor->status != 'pending') {
            return redirect()->route('lembur-honor.index')->with('error', 'Anda hanya dapat mengedit pengajuan yang masih dalam status menunggu.');
        }
        
        $lemburHonor->jenis = $request->jenis;
        $lemburHonor->tanggal_mulai = $request->tanggal_mulai;
        $lemburHonor->tanggal_selesai = $request->tanggal_selesai;
        $lemburHonor->waktu_mulai = $request->waktu_mulai;
        $lemburHonor->waktu_selesai = $request->waktu_selesai;
        $lemburHonor->durasi = $request->durasi;
        $lemburHonor->kegiatan = $request->kegiatan;
        $lemburHonor->lokasi = $request->lokasi;
        $lemburHonor->keterangan = $request->keterangan;
        
        if ($request->hasFile('dokumen_pendukung')) {
            // Delete old file
            if ($lemburHonor->dokumen_pendukung) {
                Storage::delete('public/dokumen/lembur-honor/' . $lemburHonor->dokumen_pendukung);
            }
            
            $file = $request->file('dokumen_pendukung');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/dokumen/lembur-honor', $fileName);
            $lemburHonor->dokumen_pendukung = $fileName;
        }
        
        $lemburHonor->save();
        
        return redirect()->route('lembur-honor.index')->with('success', 'Pengajuan lembur/honor berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lemburHonor = LemburHonor::findOrFail($id);
        
        // Authorization check
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        
        if ($employee->id != $lemburHonor->employee_id) {
            return redirect()->route('lembur-honor.index')->with('error', 'Anda tidak memiliki akses untuk menghapus data ini.');
        }
        
        if ($lemburHonor->status != 'pending') {
            return redirect()->route('lembur-honor.index')->with('error', 'Anda hanya dapat menghapus pengajuan yang masih dalam status menunggu.');
        }
        
        // Delete file if exists
        if ($lemburHonor->dokumen_pendukung) {
            Storage::delete('public/dokumen/lembur-honor/' . $lemburHonor->dokumen_pendukung);
        }
        
        $lemburHonor->delete();
        
        return redirect()->route('lembur-honor.index')->with('success', 'Pengajuan lembur/honor berhasil dihapus.');
    }

    /**
     * Approve a request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $lemburHonor = LemburHonor::findOrFail($id);
        
        // Check if user has permission to approve
        if (!Auth::user()->isApproverFor('lembur')) {
            return redirect()->route('lembur-honor.index')->with('error', 'Anda tidak memiliki hak untuk menyetujui pengajuan ini.');
        }
        
        $lemburHonor->status = 'approved';
        $lemburHonor->approved_by = Auth::id();
        $lemburHonor->save();
        
        return redirect()->route('lembur-honor.index')->with('success', 'Pengajuan lembur/honor berhasil disetujui.');
    }
    
    /**
     * Reject a request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejected_message' => 'required|string'
        ]);
        
        $lemburHonor = LemburHonor::findOrFail($id);
        
        // Check if user has permission to reject
        if (!Auth::user()->isApproverFor('lembur')) {
            return redirect()->route('lembur-honor.index')->with('error', 'Anda tidak memiliki hak untuk menolak pengajuan ini.');
        }
        
        $lemburHonor->status = 'rejected';
        $lemburHonor->rejected_message = $request->rejected_message;
        $lemburHonor->rejected_at = now();
        $lemburHonor->save();
        
        return redirect()->route('lembur-honor.index')->with('success', 'Pengajuan lembur/honor telah ditolak.');
    }
    
    /**
     * Preview the document in the browser
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function preview($id)
    {
        $lemburHonor = LemburHonor::findOrFail($id);
        
        if (!$lemburHonor->dokumen_pendukung) {
            abort(404, 'Dokumen tidak ditemukan');
        }
        
        $path = 'public/dokumen/lembur-honor/' . $lemburHonor->dokumen_pendukung;
        
        if (!Storage::exists($path)) {
            abort(404, 'Dokumen tidak ditemukan');
        }
        
        $file = Storage::get($path);
        $type = Storage::mimeType($path);
        $fileName = basename($lemburHonor->dokumen_pendukung);
        
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
     * Download the document associated with the lembur/honor request
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|\Illuminate\Http\Response
     */
    public function downloadDocument($id)
    {
        $lemburHonor = LemburHonor::findOrFail($id);
        
        if (!$lemburHonor->dokumen_pendukung) {
            abort(404, 'Dokumen tidak ditemukan');
        }
        
        $path = 'public/dokumen/lembur-honor/' . $lemburHonor->dokumen_pendukung;
        
        if (Storage::exists($path)) {
            return Storage::download($path);
        }
        
        abort(404, 'Dokumen tidak ditemukan');
    }
} 