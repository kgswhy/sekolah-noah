<?php

namespace App\Http\Controllers;

use App\Models\RequestAtk;
use App\Models\Approver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestAtkController extends Controller
{
    public function index()
    {
        $requests = RequestAtk::latest()->get();
        return view('pages.request-atk.index', compact('requests'));
    }

    public function create()
    {
        $employee = Auth::user()->employee;
        if (!$employee) {
            return redirect()->route('request-fotocopy.index')
                ->with('error', 'Anda tidak memiliki data karyawan yang terkait dengan akun ini.');
        }
        return view('pages.request-atk.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $employee = Auth::user()->employee;
        
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'nomor_induk_karyawan' => 'required',
            'unit' => 'required',
            'divisi' => 'required',
            'status_karyawan' => 'required',
            'jabatan' => 'required',
            'nama_barang' => 'required|array',
            'jumlah' => 'required|array',
            'satuan' => 'required|array',
            'keterangan' => 'required|array',
        ]);

        // Determine department type based on employee division
        $departmentType = 'non-akademik';
        if ($employee && strtolower($employee->division) === 'akademik') {
            $departmentType = 'akademik';
        }

        $validated['status'] = 'pending';
        $validated['current_approval_level'] = 1;
        $validated['department_type'] = $departmentType;

        RequestAtk::create($validated);

        return redirect()->route('request-atk.index')
            ->with('success', 'Permintaan ATK berhasil dibuat');
    }

    public function show(RequestAtk $requestAtk)
    {
        return view('pages.request-atk.show', compact('requestAtk'));
    }

    public function approve(RequestAtk $requestAtk)
    {
        $user = Auth::user();
        $approver = Approver::where('user_id', $user->id)
            ->where('module', 'request-atk')
            ->where('department_type', $requestAtk->department_type)
            ->where('approval_level', $requestAtk->current_approval_level)
            ->first();

        if (!$approver) {
            return back()->with('error', 'Anda tidak memiliki akses untuk menyetujui permintaan ini');
        }

        DB::transaction(function () use ($requestAtk, $user) {
            // Update approval history
            $history = json_decode($requestAtk->approval_history ?? '[]', true);
            $history[] = [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'action' => 'approved',
                'level' => $requestAtk->current_approval_level,
                'timestamp' => now()->toDateTimeString()
            ];
            $requestAtk->approval_history = json_encode($history);

            // Check if this is the final approval level
            $nextLevel = $requestAtk->current_approval_level + 1;
            $hasNextLevel = Approver::where('module', 'request-atk')
                ->where('department_type', $requestAtk->department_type)
                ->where('approval_level', $nextLevel)
                ->exists();

            if (!$hasNextLevel) {
                $requestAtk->status = 'approved';
                $requestAtk->final_status = 'approved';
                $requestAtk->approved_by = $user->id;
                $requestAtk->approved_at = now();
            } else {
                $requestAtk->current_approval_level = $nextLevel;
            }

            $requestAtk->save();
        });

        return redirect()->route('request-atk.index')
            ->with('success', 'Permintaan ATK berhasil disetujui');
    }

    public function reject(Request $request, RequestAtk $requestAtk)
    {
        $user = Auth::user();
        $approver = Approver::where('user_id', $user->id)
            ->where('module', 'request-atk')
            ->where('department_type', $requestAtk->department_type)
            ->where('approval_level', $requestAtk->current_approval_level)
            ->first();

        if (!$approver) {
            return back()->with('error', 'Anda tidak memiliki akses untuk menolak permintaan ini');
        }

        $validated = $request->validate([
            'rejected_message' => 'required|string'
        ]);

        DB::transaction(function () use ($requestAtk, $user, $validated) {
            // Update approval history
            $history = json_decode($requestAtk->approval_history ?? '[]', true);
            $history[] = [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'action' => 'rejected',
                'level' => $requestAtk->current_approval_level,
                'message' => $validated['rejected_message'],
                'timestamp' => now()->toDateTimeString()
            ];
            $requestAtk->approval_history = json_encode($history);

            $requestAtk->status = 'rejected';
            $requestAtk->final_status = 'rejected';
            $requestAtk->rejected_by = $user->id;
            $requestAtk->rejected_at = now();
            $requestAtk->rejected_message = $validated['rejected_message'];
            $requestAtk->save();
        });

        return redirect()->route('request-atk.index')
            ->with('success', 'Permintaan ATK berhasil ditolak');
    }
}