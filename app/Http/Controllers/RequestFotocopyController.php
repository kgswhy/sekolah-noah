<?php

namespace App\Http\Controllers;

use App\Models\PengajuanFotocopy;
use App\Models\Employee;
use App\Models\Approver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestFotocopyController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            $requests = PengajuanFotocopy::with('employee')->get();
        } else {
            // Get the department types this user can approve
            $departmentTypes = $user->approvers()
                ->where('module', 'fotocopy')
                ->where('active', true)
                ->pluck('department_type')
                ->unique();

            // If user is an approver, show only requests from their department type and current approval level
            if ($departmentTypes->isNotEmpty()) {
                $requests = PengajuanFotocopy::with('employee')
                    ->whereIn('department_type', $departmentTypes)
                    ->whereIn('current_approval_level', $user->approvers()->where('module', 'fotocopy')->pluck('approval_level'))
                    ->get();
            } else {
                // If user is not an approver, show only their own requests
                $employee = $user->employee;
                if (!$employee) {
                    $requests = collect(); // Return empty collection if no employee record
                } else {
                    $requests = PengajuanFotocopy::with('employee')
                        ->where('employee_id', $employee->id)
                        ->get();
                }
            }
        }

        return view('pages.request-fotocopy.index', compact('requests'));
    }

    public function create()
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();

        if (!$employee) {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Data karyawan tidak ditemukan. Silakan hubungi admin.');
        }

        return view('pages.request-fotocopy.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kegiatan' => 'required|string',
            'subject' => 'required|string',
            'kelas' => 'required|string',
            'tanggal_penggunaan' => 'required|date',
            'nama_barang' => 'required|array',
            'nama_barang.*' => 'required|string',
            'jumlah_halaman' => 'required|array',
            'jumlah_halaman.*' => 'required|integer|min:1',
            'jumlah_diperlukan' => 'required|array',
            'jumlah_diperlukan.*' => 'required|integer|min:1',
            'keterangan' => 'required|array',
            'keterangan.*' => 'required|string',
        ]);

        $user = Auth::user();
        $employee = $user->employee;

        if (!$employee) {
            return redirect()->back()->with('error', 'Employee data not found');
        }

        $pengajuan = PengajuanFotocopy::create([
            'employee_id' => $employee->id,
            'nama_lengkap' => $employee->nama_lengkap,
            'nomor_induk_karyawan' => $employee->nomor_induk_karyawan,
            'unit' => $employee->unit,
            'divisi' => $employee->divisi,
            'status_karyawan' => $employee->status_karyawan,
            'jabatan' => $employee->jabatan,
            'kegiatan' => $validated['kegiatan'],
            'subject' => $validated['subject'],
            'kelas' => $validated['kelas'],
            'tanggal_penggunaan' => $validated['tanggal_penggunaan'],
            'nama_barang' => json_encode($validated['nama_barang']),
            'jumlah_halaman' => json_encode($validated['jumlah_halaman']),
            'jumlah_diperlukan' => json_encode($validated['jumlah_diperlukan']),
            'keterangan' => json_encode($validated['keterangan']),
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => $employee->department_type ?? 'non-akademik',
            'approval_history' => json_encode([])
        ]);

        return redirect()->route('request-fotocopy.index')->with('success', 'Request fotocopy berhasil dibuat');
    }

    public function edit(PengajuanFotocopy $requestFotocopy)
    {
        $user = Auth::user();
        if ($requestFotocopy->employee_id !== $user->employee->id) {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit pengajuan ini.');
        }

        if ($requestFotocopy->status !== 'pending') {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Pengajuan yang sudah diproses tidak dapat diubah.');
        }

        return view('pages.request-fotocopy.edit', compact('requestFotocopy'));
    }

    public function update(Request $request, PengajuanFotocopy $requestFotocopy)
    {
        $user = Auth::user();
        if ($requestFotocopy->employee_id !== $user->employee->id) {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Anda tidak memiliki akses untuk mengubah pengajuan ini.');
        }

        if ($requestFotocopy->status !== 'pending') {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Pengajuan yang sudah diproses tidak dapat diubah.');
        }

        $validated = $request->validate([
            'kegiatan' => 'required|string',
            'subject' => 'required|string',
            'kelas' => 'required|string',
            'tanggal_penggunaan' => 'required|date',
            'nama_barang' => 'required|array',
            'nama_barang.*' => 'required|string',
            'jumlah_halaman' => 'required|array',
            'jumlah_halaman.*' => 'required|integer|min:1',
            'jumlah_diperlukan' => 'required|array',
            'jumlah_diperlukan.*' => 'required|integer|min:1',
            'keterangan' => 'required|array',
            'keterangan.*' => 'required|string',
        ]);

        $requestFotocopy->update([
            'kegiatan' => $validated['kegiatan'],
            'subject' => $validated['subject'],
            'kelas' => $validated['kelas'],
            'tanggal_penggunaan' => $validated['tanggal_penggunaan'],
            'nama_barang' => json_encode($validated['nama_barang']),
            'jumlah_halaman' => json_encode($validated['jumlah_halaman']),
            'jumlah_diperlukan' => json_encode($validated['jumlah_diperlukan']),
            'keterangan' => json_encode($validated['keterangan'])
        ]);

        return redirect()->route('request-fotocopy.index')
            ->with('success', 'Pengajuan fotocopy berhasil diperbarui.');
    }

    public function destroy(PengajuanFotocopy $requestFotocopy)
    {
        $user = Auth::user();
        if ($requestFotocopy->employee_id !== $user->employee->id) {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Anda tidak memiliki akses untuk menghapus pengajuan ini.');
        }

        if ($requestFotocopy->status !== 'pending') {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Pengajuan yang sudah diproses tidak dapat dihapus.');
        }

        $requestFotocopy->delete();

        return redirect()->route('request-fotocopy.index')
            ->with('success', 'Pengajuan fotocopy berhasil dihapus.');
    }

    public function approve(PengajuanFotocopy $requestFotocopy)
    {
        $user = Auth::user();
        
        if (!$requestFotocopy->canBeApprovedBy($user)) {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Anda tidak memiliki akses untuk menyetujui pengajuan ini.');
        }

        DB::transaction(function () use ($requestFotocopy, $user) {
            $nextLevel = $requestFotocopy->getNextApprovalLevel();
            
            $approvalHistory = $requestFotocopy->approval_history ?? [];
            $approvalHistory[] = [
                'level' => $requestFotocopy->current_approval_level,
                'user_id' => $user->id,
                'user_name' => $user->name,
                'action' => 'approved',
                'timestamp' => now()
            ];

            if ($nextLevel === null) {
                $requestFotocopy->update([
                    'status' => 'approved',
                    'approved_by' => $user->id,
                    'approved_at' => now(),
                    'final_status' => 'approved',
                    'approval_history' => $approvalHistory
                ]);
            } else {
                $requestFotocopy->update([
                    'current_approval_level' => $nextLevel,
                    'approval_history' => $approvalHistory
                ]);
            }
        });

        return redirect()->route('request-fotocopy.index')
            ->with('success', 'Pengajuan fotocopy berhasil disetujui.');
    }

    public function reject(Request $request, PengajuanFotocopy $requestFotocopy)
    {
        $user = Auth::user();
        
        if (!$requestFotocopy->canBeApprovedBy($user)) {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Anda tidak memiliki akses untuk menolak pengajuan ini.');
        }

        $validated = $request->validate([
            'rejected_message' => 'required|string|min:10'
        ]);

        DB::transaction(function () use ($requestFotocopy, $user, $validated) {
            $approvalHistory = $requestFotocopy->approval_history ?? [];
            $approvalHistory[] = [
                'level' => $requestFotocopy->current_approval_level,
                'user_id' => $user->id,
                'user_name' => $user->name,
                'action' => 'rejected',
                'message' => $validated['rejected_message'],
                'timestamp' => now()
            ];

            $requestFotocopy->update([
                'status' => 'rejected',
                'rejected_by' => $user->id,
                'rejected_at' => now(),
                'rejected_message' => $validated['rejected_message'],
                'final_status' => 'rejected',
                'approval_history' => $approvalHistory
            ]);
        });

        return redirect()->route('request-fotocopy.index')
            ->with('success', 'Pengajuan fotocopy berhasil ditolak.');
    }
}