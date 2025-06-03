<?php

namespace App\Http\Controllers;

use App\Models\PengajuanFotocopy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanFotocopyController extends Controller {

    public function index()
    {
        $requests = PengajuanFotocopy::with(['employee', 'approver', 'rejecter'])->get();
        return view('pages.request-fotocopy.index', compact('requests'));
    }

    public function create()
    {
        $employee = Auth::user()->employee;
        if (!$employee) {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Anda tidak memiliki data karyawan yang terkait dengan akun ini.');
        }
        return view('pages.request-fotocopy.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $employee = Auth::user()->employee;
        $request->validate([
            'kegiatan' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'tanggal_penggunaan' => 'required|date',
            'nama_barang' => 'required|array',
            'nama_barang.*' => 'required|string|max:255',
            'jumlah_halaman' => 'required|array',
            'jumlah_halaman.*' => 'required|integer|min:1',
            'jumlah_diperlukan' => 'required|array',
            'jumlah_diperlukan.*' => 'required|integer|min:1',
            'keterangan' => 'required|array',
            'keterangan.*' => 'required|string|max:255',
        ]);

        // Determine department type based on employee division
        $departmentType = strtolower($employee->division) === 'akademik' ? 'akademik' : 'non-akademik';

        PengajuanFotocopy::create([
            'employee_id' => $employee->id,
            'nama_lengkap' => $employee->full_name,
            'nomor_induk_karyawan' => $employee->nik,
            'unit' => $employee->unit,
            'divisi' => $employee->division,
            'status_karyawan' => $employee->employee_status,
            'jabatan' => $employee->position,
            'kegiatan' => $request->kegiatan,
            'subject' => $request->subject,
            'kelas' => $request->kelas,
            'tanggal_penggunaan' => $request->tanggal_penggunaan,
            'nama_barang' => $request->nama_barang,
            'jumlah_halaman' => $request->jumlah_halaman,
            'jumlah_diperlukan' => $request->jumlah_diperlukan,
            'keterangan' => $request->keterangan,
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => $departmentType
        ]);

        return redirect()->route('request-fotocopy.index')->with('success', 'Pengajuan fotocopy berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pengajuanFotocopy = PengajuanFotocopy::findOrFail($id);
        if ($pengajuanFotocopy->status !== 'pending') {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Pengajuan tidak dapat diubah karena sudah diproses.');
        }
        return view('pages.request-fotocopy.edit', compact('pengajuanFotocopy'));
    }

    public function update(Request $request, $id)
    {
        $pengajuanFotocopy = PengajuanFotocopy::findOrFail($id);
        if ($pengajuanFotocopy->status !== 'pending') {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Pengajuan tidak dapat diubah karena sudah diproses.');
        }

        $request->validate([
            'kegiatan' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'tanggal_penggunaan' => 'required|date',
            'nama_barang' => 'required|array',
            'nama_barang.*' => 'required|string|max:255',
            'jumlah_halaman' => 'required|array',
            'jumlah_halaman.*' => 'required|integer|min:1',
            'jumlah_diperlukan' => 'required|array',
            'jumlah_diperlukan.*' => 'required|integer|min:1',
            'keterangan' => 'required|array',
            'keterangan.*' => 'required|string|max:255',
        ]);

        $pengajuanFotocopy->update([
            'kegiatan' => $request->kegiatan,
            'subject' => $request->subject,
            'kelas' => $request->kelas,
            'tanggal_penggunaan' => $request->tanggal_penggunaan,
            'nama_barang' => $request->nama_barang,
            'jumlah_halaman' => $request->jumlah_halaman,
            'jumlah_diperlukan' => $request->jumlah_diperlukan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('request-fotocopy.index')->with('success', 'Pengajuan fotocopy berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pengajuanFotocopy = PengajuanFotocopy::findOrFail($id);
        if ($pengajuanFotocopy->status !== 'pending') {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Pengajuan tidak dapat dihapus karena sudah diproses.');
        }
        $pengajuanFotocopy->delete();
        return redirect()->route('request-fotocopy.index')->with('success', 'Pengajuan fotocopy berhasil dihapus!');
    }

    public function approve($id)
    {
        $user = Auth::user();
        $pengajuanFotocopy = PengajuanFotocopy::findOrFail($id);
        $currentLevel = $pengajuanFotocopy->current_approval_level;

        // Check if current user is approver at current level
        $isApprover = \App\Models\Approver::where('module', 'fotocopy')
            ->where('department_type', $pengajuanFotocopy->department_type)
            ->where('active', true)
            ->where('user_id', $user->id)
            ->where('approval_level', $currentLevel)
            ->exists();

        if (!$isApprover) {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Anda tidak memiliki hak untuk menyetujui pengajuan ini di level saat ini.');
        }

        // Check if this is the final approval level
        $maxLevel = \App\Models\Approver::where('module', 'fotocopy')
            ->where('department_type', $pengajuanFotocopy->department_type)
            ->where('active', true)
            ->max('approval_level');

        // Add to approval history
        $history = $pengajuanFotocopy->approval_history ?? [];
        $history[] = [
            'level' => $currentLevel,
            'status' => 'approved',
            'approver_name' => $user->name,
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'notes' => null
        ];

        if ($currentLevel >= $maxLevel) {
            // Final approval
            $pengajuanFotocopy->update([
                'status' => 'approved',
                'final_status' => 'approved',
                'approved_by' => $user->id,
                'approved_at' => now(),
                'approval_history' => $history
            ]);
        } else {
            // Move to next level
            $pengajuanFotocopy->update([
                'current_approval_level' => $currentLevel + 1,
                'approval_history' => $history
            ]);
        }

        return redirect()->route('request-fotocopy.index')
            ->with('success', 'Pengajuan fotocopy berhasil disetujui!');
    }

    public function reject(Request $request, $id)
    {
        $user = Auth::user();
        $pengajuanFotocopy = PengajuanFotocopy::findOrFail($id);
        $currentLevel = $pengajuanFotocopy->current_approval_level;

        // Check if user is authorized to reject at current level
        $isApprover = \App\Models\Approver::where('module', 'fotocopy')
            ->where('department_type', $pengajuanFotocopy->department_type)
            ->where('active', true)
            ->where('user_id', $user->id)
            ->where('approval_level', $currentLevel)
            ->exists();

        if (!$isApprover) {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Anda tidak memiliki akses untuk menolak pengajuan ini di level saat ini.');
        }

        if ($pengajuanFotocopy->status !== 'pending') {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Pengajuan sudah diproses sebelumnya.');
        }

        $request->validate([
            'rejected_message' => 'required|string|max:255'
        ]);

        // Add to approval history
        $history = $pengajuanFotocopy->approval_history ?? [];
        $history[] = [
            'level' => $currentLevel,
            'status' => 'rejected',
            'approver_name' => $user->name,
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'notes' => $request->rejected_message
        ];

        $pengajuanFotocopy->update([
            'status' => 'rejected',
            'final_status' => 'rejected',
            'rejected_by' => $user->id,
            'rejected_message' => $request->rejected_message,
            'rejected_at' => now(),
            'approval_history' => $history
        ]);

        return redirect()->route('request-fotocopy.index')
            ->with('success', 'Pengajuan fotocopy berhasil ditolak!');
    }
}
