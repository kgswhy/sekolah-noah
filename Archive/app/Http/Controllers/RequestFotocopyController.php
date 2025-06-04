<?php

namespace App\Http\Controllers;

use App\Models\PengajuanFotocopy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestFotocopyController extends Controller
{
    public function index()
    {
        $pengajuanFotocopy = PengajuanFotocopy::with(['rejecter', 'approver'])->get();
        return view('pages.request-fotocopy.index', compact('pengajuanFotocopy'));
    }

    public function create()
    {
        return view('pages.request-fotocopy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nomor_induk_karyawan' => 'required',
            'unit' => 'required',
            'divisi' => 'required',
            'status_karyawan' => 'required',
            'jabatan' => 'required',
            'kegiatan' => 'required',
            'subject' => 'required',
            'kelas' => 'required',
            'tanggal_penggunaan' => 'required|date',
            'nama_barang' => 'required|array',
            'jumlah_halaman' => 'required|array',
            'jumlah_diperlukan' => 'required|array',
            'keterangan' => 'required|array',
        ]);

        $user = Auth::user();
        $employee = $user->employee;

        $pengajuan = new PengajuanFotocopy();
        $pengajuan->fill($request->all());
        $pengajuan->status = 'pending';
        $pengajuan->current_approval_level = 0;
        $pengajuan->department_type = $employee ? $employee->division : 'non-akademik';
        $pengajuan->save();

        return redirect()->route('request-fotocopy.index')
            ->with('success', 'Pengajuan fotocopy berhasil dibuat');
    }

    public function edit(PengajuanFotocopy $requestFotocopy)
    {
        return view('pages.request-fotocopy.edit', compact('requestFotocopy'));
    }

    public function update(Request $request, PengajuanFotocopy $requestFotocopy)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nomor_induk_karyawan' => 'required',
            'unit' => 'required',
            'divisi' => 'required',
            'status_karyawan' => 'required',
            'jabatan' => 'required',
            'kegiatan' => 'required',
            'subject' => 'required',
            'kelas' => 'required',
            'tanggal_penggunaan' => 'required|date',
            'nama_barang' => 'required|array',
            'jumlah_halaman' => 'required|array',
            'jumlah_diperlukan' => 'required|array',
            'keterangan' => 'required|array',
        ]);

        $requestFotocopy->update($request->all());

        return redirect()->route('request-fotocopy.index')
            ->with('success', 'Pengajuan fotocopy berhasil diperbarui');
    }

    public function destroy(PengajuanFotocopy $requestFotocopy)
    {
        $requestFotocopy->delete();
        return redirect()->route('request-fotocopy.index')
            ->with('success', 'Pengajuan fotocopy berhasil dihapus');
    }

    public function approve(PengajuanFotocopy $requestFotocopy)
    {
        $user = Auth::user();

        // Get total approval levels for this module and department
        $totalLevels = \App\Models\Approver::where('module', 'fotocopy')
            ->where('department_type', $requestFotocopy->department_type)
            ->where('active', true)
            ->max('approval_level');

        // Check if user is an approver for any level
        $isApprover = \App\Models\Approver::where('module', 'fotocopy')
            ->where('department_type', $requestFotocopy->department_type)
            ->where('active', true)
            ->where('user_id', $user->id)
            ->exists();

        if (!$isApprover) {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Anda tidak memiliki hak untuk menyetujui pengajuan ini.');
        }

        // Get the next level
        $nextLevel = $requestFotocopy->current_approval_level + 1;

        // Check if this is the final approval
        if ($nextLevel >= $totalLevels) {
            $requestFotocopy->status = 'approved';
            $requestFotocopy->final_status = 'approved';
            $requestFotocopy->approved_by = $user->id;
            $requestFotocopy->approved_at = now();
        } else {
            $requestFotocopy->current_approval_level = $nextLevel;
        }

        $requestFotocopy->save();

        return redirect()->route('request-fotocopy.index')
            ->with('success', 'Pengajuan fotocopy berhasil disetujui');
    }

    public function reject(Request $request, PengajuanFotocopy $requestFotocopy)
    {
        $request->validate([
            'rejected_message' => 'required'
        ]);

        $user = Auth::user();

        $requestFotocopy->status = 'rejected';
        $requestFotocopy->final_status = 'rejected';
        $requestFotocopy->rejected_message = $request->rejected_message;
        $requestFotocopy->rejected_by = $user->id;
        $requestFotocopy->rejected_at = now();
        $requestFotocopy->save();

        return redirect()->route('request-fotocopy.index')
            ->with('success', 'Pengajuan fotocopy berhasil ditolak');
    }
}