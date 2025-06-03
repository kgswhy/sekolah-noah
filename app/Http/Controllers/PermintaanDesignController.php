<?php

namespace App\Http\Controllers;

use App\Models\PermintaanDesign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PermintaanDesignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Get all requests if user is admin
        if ($user->isAdmin()) {
            $designs = PermintaanDesign::with('user')->latest()->get();
        } else {
            // Get the department types this user can approve
            $departmentTypes = $user->approvers()
                ->where('module', 'permintaan-design')
                ->where('active', true)
                ->pluck('department_type')
                ->unique();

            // If user is an approver, show only requests from their department type
            if ($departmentTypes->isNotEmpty()) {
                $designs = PermintaanDesign::with('user')
                    ->whereIn('department_type', $departmentTypes)
                    ->latest()
                    ->get();
            } else {
                // If user is not an approver, show only their own requests
                $designs = PermintaanDesign::where('user_id', $user->id)->latest()->get();
            }
        }

        return view('pages.permintaan-design.index', compact('designs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $defaultData = [
            'nama' => $user->name,
            'email' => $user->email,
            'unit' => $user->employee->unit ?? '',
            'divisi' => $user->employee->division ?? '',
        ];
        return view('pages.permintaan-design.create', compact('defaultData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'kategori' => 'required|string',
            'kegiatan' => 'required|string',
            'deskripsi' => 'nullable|string',
            'tanggal_deadline' => 'required|date',
            'unit' => 'required|string',
            'divisi' => 'required|string',
            'kategori_lainnya' => 'nullable|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $dokumen = null;
        if ($request->hasFile('dokumen_pendukung')) {
            $dokumen = $request->file('dokumen_pendukung')->store('permintaan_design', 'public');
        }

        // Determine department type based on division
        $departmentType = ($request->divisi === 'Akademik') ? 'akademik' : 'non-akademik';

        PermintaanDesign::create([
            'user_id' => $user->id,
            'nama' => $user->name,
            'email' => $user->email,
            'unit' => $request->unit,
            'divisi' => $request->divisi,
            'kategori' => $request->kategori,
            'kategori_lainnya' => $request->kategori_lainnya,
            'kegiatan' => $request->kegiatan,
            'deskripsi' => $request->deskripsi,
            'tanggal_deadline' => $request->tanggal_deadline,
            'dokumen_pendukung' => $dokumen,
            'status' => 'pending',
            'current_approval_level' => 1,
            'department_type' => $departmentType,
        ]);

        return redirect()->route('permintaan-design.index')->with('success', 'Permintaan design berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PermintaanDesign $permintaanDesign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PermintaanDesign $permintaan_design)
    {
        return view('pages.permintaan-design.edit', compact('permintaan_design'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PermintaanDesign $permintaan_design)
    {
        $request->validate([
            'kategori' => 'required|string',
            'kegiatan' => 'required|string',
            'deskripsi' => 'nullable|string',
            'tanggal_deadline' => 'required|date',
            'unit' => 'required|string',
            'divisi' => 'required|string',
            'kategori_lainnya' => 'nullable|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        $dokumen = $permintaan_design->dokumen_pendukung;
        if ($request->hasFile('dokumen_pendukung')) {
            if ($dokumen)
                Storage::disk('public')->delete($dokumen);
            $dokumen = $request->file('dokumen_pendukung')->store('permintaan_design', 'public');
        }
        $permintaan_design->update([
            'unit' => $request->unit,
            'divisi' => $request->divisi,
            'kategori' => $request->kategori,
            'kategori_lainnya' => $request->kategori_lainnya,
            'kegiatan' => $request->kegiatan,
            'deskripsi' => $request->deskripsi,
            'tanggal_deadline' => $request->tanggal_deadline,
            'dokumen_pendukung' => $dokumen,
        ]);
        return redirect()->route('permintaan-design.index')->with('success', 'Permintaan design berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PermintaanDesign $permintaan_design)
    {
        if ($permintaan_design->dokumen_pendukung) {
            Storage::disk('public')->delete($permintaan_design->dokumen_pendukung);
        }
        $permintaan_design->delete();
        return redirect()->route('permintaan-design.index')->with('success', 'Permintaan design berhasil dihapus!');
    }

    /**
     * Approve the specified design request
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        $user = Auth::user();
        $request = PermintaanDesign::findOrFail($id);

        if (!$request->canBeApprovedBy($user)) {
            return redirect()->route('permintaan-design.index')
                ->with('error', 'Anda tidak memiliki hak untuk menyetujui permintaan ini.');
        }

        $request->approve($user->id, 'Approved');

        return redirect()->route('permintaan-design.index')
            ->with('success', 'Permintaan design berhasil disetujui.');
    }

    /**
     * Reject the specified design request with a reason
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, $id)
    {
        $user = Auth::user();
        $designRequest = PermintaanDesign::findOrFail($id);

        if (!$designRequest->canBeApprovedBy($user)) {
            return redirect()->route('permintaan-design.index')
                ->with('error', 'Anda tidak memiliki hak untuk menolak permintaan ini.');
        }

        $request->validate([
            'rejected_message' => 'required|string|max:1000',
        ]);

        $designRequest->reject($user->id, $request->rejected_message);

        return redirect()->route('permintaan-design.index')
            ->with('success', 'Permintaan design telah ditolak.');
    }
}
