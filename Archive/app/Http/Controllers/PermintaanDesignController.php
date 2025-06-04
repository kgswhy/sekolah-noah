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
        // Jika admin tampilkan semua, jika bukan hanya milik user
        $designs = $user->role_id == 1
            ? PermintaanDesign::latest()->get()
            : PermintaanDesign::where('user_id', $user->id)->latest()->get();
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
            'status' => 'Proses',
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
}
