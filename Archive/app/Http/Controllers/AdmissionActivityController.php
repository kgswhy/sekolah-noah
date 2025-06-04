<?php

namespace App\Http\Controllers;

use App\Models\AdmissionActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdmissionActivityController extends Controller
{
    public function index() {
        $activities = AdmissionActivity::all();
        return view('pages.admission.activity.index', compact('activities'));
    }

    public function create() {
        return view('pages.admission.activity.create');
    }

    public function store(Request $request) {
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string|max:255',
            'deskripsi_kegiatan' => 'required|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png',
            'status' => 'required|in:Dijadwalkan,Berlangsung,Selesai',
            'keterangan' => 'nullable|string',
        ]);
    
        $filePath = null;
        if ($request->hasFile('dokumen_pendukung')) {
            $filePath = $request->file('dokumen_pendukung')->store('dokumen_admission', 'public');
        }
    
        AdmissionActivity::create([
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'dokumen_pendukung' => $filePath,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);
    
        return redirect()->route('admission.activity.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }    

    public function edit($id) {
        $activity = AdmissionActivity::findOrFail($id);
        return view('pages.admission.activity.edit', compact('activity'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string|max:255',
            'deskripsi_kegiatan' => 'required|string',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,png',
            'status' => 'required|in:Dijadwalkan,Berlangsung,Selesai',
            'keterangan' => 'nullable|string',
        ]);
    
        $activity = AdmissionActivity::findOrFail($id);
    
        if ($request->hasFile('dokumen_pendukung')) {
            if ($activity->dokumen_pendukung) {
                Storage::disk('public')->delete($activity->dokumen_pendukung);
            }
            $activity->dokumen_pendukung = $request->file('dokumen_pendukung')->store('dokumen_admission', 'public');
        }
    
        $activity->update([
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);
    
        return redirect()->route('admission.activity.index')->with('success', 'Kegiatan berhasil diupdate!');
    }
    

    public function destroy($id) {
        $activity = AdmissionActivity::findOrFail($id);
        if ($activity->dokumen_pendukung) {
            Storage::delete($activity->dokumen_pendukung);
        }
        $activity->delete();

        return redirect()->route('admission.activity.index')->with('success', 'Kegiatan berhasil dihapus!');
    }
}
