<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Controller for managing leave (cuti) requests
 */
class CutiController extends Controller
{
    /**
     * Display a listing of leave requests
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // Get all leave requests if user is admin
        if ($user->isAdmin()) {
            $cutis = Cuti::with('employee')->get();
        } else {
            // Get the department types this user can approve
            $departmentTypes = $user->approvers()
                ->where('module', 'cuti')
                ->where('active', true)
                ->pluck(column: 'department_type')
                ->unique();

            // If user is an approver, show only requests from their department type
            if ($departmentTypes->isNotEmpty()) {
                $cutis = Cuti::with('employee')
                    ->whereIn('department_type', $departmentTypes)
                    ->get();
            } else {
                // If user is not an approver, show only their own requests
                $cutis = Cuti::with('employee')
                    ->where('employee_id', $user->employee->id)
                    ->get();
            }
        }

        return view('pages.cuti.index', compact('cutis'));
    }

    /**
     * Show the form for creating a new leave request
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retrieve the logged-in user's employee data
        $employee = Auth::user()->employee;

        if (!$employee) {
            return redirect()->route('cuti.index')
                ->with('error', 'Anda tidak memiliki data karyawan yang terkait dengan akun ini.');
        }

        return view('pages.cuti.create', compact('employee'));
    }

    /**
     * Store a newly created leave request in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'alasan' => 'required|string',
            'telepon' => 'required|string',
            'dokumen' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        // Handle file upload for dokumen
        if ($request->hasFile('dokumen')) {
            $dokumenPath = $request->file('dokumen')->store('private/dokumen_cuti');
        } else {
            $dokumenPath = null;
        }

        // Get employee data to determine department type
        $employee = Auth::user()->employee;

        if (!$employee) {
            return redirect()->route('cuti.index')
                ->with('error', 'Anda tidak memiliki data karyawan yang terkait dengan akun ini.');
        }

        $departmentType = $employee->division === 'Akademik' ? 'akademik' : 'non-akademik';

        // Store the leave request data in the database
        Cuti::create([
            'employee_id' => $employee->id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
            'keterangan' => $request->keterangan,
            'dokumen' => $dokumenPath,
            'telepon' => $request->telepon,
            'status' => 'pending',
            'current_approval_level' => 1,
            'final_status' => null,
            'department_type' => $departmentType,
        ]);

        return redirect('/cuti')->with('success', 'Cuti berhasil diajukan!');
    }

    /**
     * Display the specified leave request
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cuti = Cuti::with('employee')->findOrFail($id);
        return view('pages.cuti.detail', compact('cuti'));
    }

    /**
     * Show the form for editing the specified leave request
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        $employee = $cuti->employee;

        return view('pages.cuti.edit', compact('cuti', 'employee'));
    }

    /**
     * Update the specified leave request in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'alasan' => 'required|string',
            'telepon' => 'required|string',
            'dokumen' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $cuti = Cuti::findOrFail($id);

        // Handle file upload for dokumen
        if ($request->hasFile('dokumen')) {
            // Delete old file if exists
            if ($cuti->dokumen) {
                Storage::delete($cuti->dokumen);
            }
            $dokumenPath = $request->file('dokumen')->store('private/dokumen_cuti');
        } else {
            $dokumenPath = $cuti->dokumen;
        }

        // Update the leave request
        $cuti->update([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
            'keterangan' => $request->keterangan,
            'dokumen' => $dokumenPath,
            'telepon' => $request->telepon,
            'status' => 'pending', // Reset status to pending after update
        ]);

        return redirect('/cuti')->with('success', 'Cuti berhasil diperbarui!');
    }

    /**
     * Remove the specified leave request from storage
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);

        // Delete associated file if exists
        if ($cuti->dokumen) {
            Storage::delete($cuti->dokumen);
        }

        $cuti->delete();

        return redirect('/cuti')->with('success', 'Pengajuan cuti berhasil dihapus!');
    }

    /**
     * Download the document associated with the leave request
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|\Illuminate\Http\Response
     */
    public function downloadDocument($id)
    {
        $cuti = Cuti::findOrFail($id);

        if (!$cuti->dokumen) {
            abort(404, 'Dokumen tidak ditemukan');
        }

        // Check if user has permission to access this document
        // For example, you might want to check if the user is the owner or has appropriate role

        if (Storage::exists($cuti->dokumen)) {
            return Storage::download($cuti->dokumen);
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
        $cuti = Cuti::findOrFail($id);

        if (!$cuti->dokumen) {
            abort(404, 'Dokumen tidak ditemukan');
        }

        if (!Storage::exists($cuti->dokumen)) {
            abort(404, 'Dokumen tidak ditemukan');
        }

        $file = Storage::get($cuti->dokumen);
        $type = Storage::mimeType($cuti->dokumen);
        $fileName = basename($cuti->dokumen);

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
     * Approve the specified leave request
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        $user = Auth::user();
        $cuti = Cuti::findOrFail($id);
        $currentLevel = $cuti->current_approval_level;

        // Cek apakah user adalah approver di level ini untuk departemen yang sesuai
        if (!$user->isApproverFor('cuti', $currentLevel, $cuti->department_type)) {
            return redirect()->route('cuti.index')
                ->with('error', 'Anda tidak memiliki hak untuk menyetujui pengajuan cuti di level ini untuk departemen ini.');
        }

        // Hitung jumlah level approval untuk cuti berdasarkan departemen
        $maxLevel = \App\Models\Approver::where('module', 'cuti')
            ->where('department_type', $cuti->department_type)
            ->where('active', true)
            ->max('approval_level');

        if ($currentLevel < $maxLevel) {
            // Naikkan ke level berikutnya
            $cuti->current_approval_level = $currentLevel + 1;
            $cuti->save();
            return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti naik ke level approval berikutnya.');
        } else {
            // Sudah level terakhir, setujui
            $cuti->status = 'approved';
            $cuti->final_status = 'approved';
            $cuti->approved_by = $user->id;
            $cuti->approved_at = now();
            $cuti->save();
            return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti disetujui sepenuhnya.');
        }
    }

    /**
     * Reject the specified leave request with a reason
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, $id)
    {
        $user = Auth::user();
        $cuti = Cuti::findOrFail($id);
        $currentLevel = $cuti->current_approval_level;

        // Cek apakah user adalah approver di level ini untuk departemen yang sesuai
        if (!$user->isApproverFor('cuti', $currentLevel, $cuti->department_type)) {
            return redirect()->route('cuti.index')
                ->with('error', 'Anda tidak memiliki hak untuk menolak pengajuan cuti di level ini untuk departemen ini.');
        }

        $request->validate([
            'rejected_message' => 'required|string|max:1000',
        ]);

        $cuti->status = 'rejected';
        $cuti->final_status = 'rejected';
        $cuti->rejected_message = $request->rejected_message;
        $cuti->rejected_by = $user->id;
        $cuti->rejected_at = now();
        $cuti->save();

        return redirect()->route('cuti.index')->with('success', 'Pengajuan cuti telah ditolak.');
    }
}
