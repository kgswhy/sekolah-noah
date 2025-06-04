<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratTugasController extends Controller
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
        if ($user->isAdmin() || $user->isApproverFor('surat-tugas')) {
            $suratTugas = SuratTugas::with('employee')->latest()->get();
        } else {
            // Regular employee can only see their own requests
            $suratTugas = SuratTugas::where('employee_id', $employee->id)->latest()->get();
        }

        return view('pages.surat-tugas.index', compact('suratTugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = Employee::where('user_id', Auth::id())->first();
        return view('pages.surat-tugas.create', compact('employee'));
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
            'judul_tugas' => 'required|string|max:255',
            'deskripsi_tugas' => 'required|string',
            'tujuan_tugas' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi_tugas' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $employee = Employee::where('user_id', Auth::id())->first();

        $suratTugas = new SuratTugas();
        $suratTugas->employee_id = $employee->id;
        $suratTugas->judul_tugas = $request->judul_tugas;
        $suratTugas->deskripsi_tugas = $request->deskripsi_tugas;
        $suratTugas->tujuan_tugas = $request->tujuan_tugas;
        $suratTugas->tanggal_mulai = $request->tanggal_mulai;
        $suratTugas->tanggal_selesai = $request->tanggal_selesai;
        $suratTugas->lokasi_tugas = $request->lokasi_tugas;
        $suratTugas->keterangan = $request->keterangan;
        $suratTugas->status = 'pending';

        if ($request->hasFile('dokumen_pendukung')) {
            $file = $request->file('dokumen_pendukung');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/dokumen/surat-tugas', $fileName);
            $suratTugas->dokumen_pendukung = $fileName;
        }

        $suratTugas->save();

        return redirect()->route('surat-tugas.index')->with('success', 'Surat tugas berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suratTugas = SuratTugas::with(['employee', 'approver'])->findOrFail($id);

        // Authorization check
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();

        if (!$user->isAdmin() && !$user->isApproverFor('surat-tugas') && $employee->id != $suratTugas->employee_id) {
            return redirect()->route('surat-tugas.index')->with('error', 'Anda tidak memiliki akses untuk melihat data ini.');
        }

        return view('pages.surat-tugas.detail', compact('suratTugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suratTugas = SuratTugas::findOrFail($id);

        // Authorization check
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();

        if ($employee->id != $suratTugas->employee_id) {
            return redirect()->route('surat-tugas.index')->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }

        if ($suratTugas->status != 'pending') {
            return redirect()->route('surat-tugas.index')->with('error', 'Anda hanya dapat mengedit pengajuan yang masih dalam status menunggu.');
        }

        return view('pages.surat-tugas.edit', compact('suratTugas'));
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
            'judul_tugas' => 'required|string|max:255',
            'deskripsi_tugas' => 'required|string',
            'tujuan_tugas' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'lokasi_tugas' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $suratTugas = SuratTugas::findOrFail($id);

        // Authorization check
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();

        if ($employee->id != $suratTugas->employee_id) {
            return redirect()->route('surat-tugas.index')->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }

        if ($suratTugas->status != 'pending') {
            return redirect()->route('surat-tugas.index')->with('error', 'Anda hanya dapat mengedit pengajuan yang masih dalam status menunggu.');
        }

        $suratTugas->judul_tugas = $request->judul_tugas;
        $suratTugas->deskripsi_tugas = $request->deskripsi_tugas;
        $suratTugas->tujuan_tugas = $request->tujuan_tugas;
        $suratTugas->tanggal_mulai = $request->tanggal_mulai;
        $suratTugas->tanggal_selesai = $request->tanggal_selesai;
        $suratTugas->lokasi_tugas = $request->lokasi_tugas;
        $suratTugas->keterangan = $request->keterangan;

        if ($request->hasFile('dokumen_pendukung')) {
            // Delete old file
            if ($suratTugas->dokumen_pendukung) {
                Storage::delete('public/dokumen/surat-tugas/' . $suratTugas->dokumen_pendukung);
            }

            $file = $request->file('dokumen_pendukung');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/dokumen/surat-tugas', $fileName);
            $suratTugas->dokumen_pendukung = $fileName;
        }

        $suratTugas->save();

        return redirect()->route('surat-tugas.index')->with('success', 'Surat tugas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suratTugas = SuratTugas::findOrFail($id);

        // Authorization check
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();

        if ($employee->id != $suratTugas->employee_id) {
            return redirect()->route('surat-tugas.index')->with('error', 'Anda tidak memiliki akses untuk menghapus data ini.');
        }

        if ($suratTugas->status != 'pending') {
            return redirect()->route('surat-tugas.index')->with('error', 'Anda hanya dapat menghapus pengajuan yang masih dalam status menunggu.');
        }

        // Delete file if exists
        if ($suratTugas->dokumen_pendukung) {
            Storage::delete('public/dokumen/surat-tugas/' . $suratTugas->dokumen_pendukung);
        }

        $suratTugas->delete();

        return redirect()->route('surat-tugas.index')->with('success', 'Surat tugas berhasil dihapus.');
    }

    /**
     * Approve a request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $suratTugas = SuratTugas::findOrFail($id);
        
        // Check if user has permission to approve
        if (!Auth::user()->isApproverFor('surat-tugas')) {
            return redirect()->route('surat-tugas.index')->with('error', 'Anda tidak memiliki hak untuk menyetujui pengajuan ini.');
        }
        
        $suratTugas->status = 'approved';
        $suratTugas->approved_by = Auth::id();
        $suratTugas->save();
        
        // Generate nomor surat if not already set
        if (!$suratTugas->nomor_surat) {
            $count = SuratTugas::where('status', 'approved')->count();
            $suratTugas->nomor_surat = 'ST/' . date('Y') . '/' . str_pad($count, 3, '0', STR_PAD_LEFT);
            $suratTugas->save();
        }
        
        return redirect()->route('surat-tugas.index')->with('success', 'Pengajuan surat tugas berhasil disetujui.');
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
        
        $suratTugas = SuratTugas::findOrFail($id);
        
        // Check if user has permission to reject
        if (!Auth::user()->isApproverFor('surat-tugas')) {
            return redirect()->route('surat-tugas.index')->with('error', 'Anda tidak memiliki hak untuk menolak pengajuan ini.');
        }
        
        $suratTugas->status = 'rejected';
        $suratTugas->rejected_message = $request->rejected_message;
        $suratTugas->rejected_at = now();
        $suratTugas->save();
        
        return redirect()->route('surat-tugas.index')->with('success', 'Pengajuan surat tugas telah ditolak.');
    }

    /**
     * Preview the document in the browser
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function preview($id)
    {
        $suratTugas = SuratTugas::findOrFail($id);

        if (!$suratTugas->dokumen_pendukung) {
            abort(404, 'Dokumen tidak ditemukan');
        }

        $path = 'public/dokumen/surat-tugas/' . $suratTugas->dokumen_pendukung;

        if (!Storage::exists($path)) {
            abort(404, 'Dokumen tidak ditemukan');
        }

        $file = Storage::get($path);
        $type = Storage::mimeType($path);
        $fileName = basename($suratTugas->dokumen_pendukung);

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
     * Download the document associated with the surat tugas
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|\Illuminate\Http\Response
     */
    public function downloadDocument($id)
    {
        $suratTugas = SuratTugas::findOrFail($id);

        if (!$suratTugas->dokumen_pendukung) {
            abort(404, 'Dokumen tidak ditemukan');
        }

        $path = 'public/dokumen/surat-tugas/' . $suratTugas->dokumen_pendukung;

        if (Storage::exists($path)) {
            return Storage::download($path);
        }

        abort(404, 'Dokumen tidak ditemukan');
    }
}
