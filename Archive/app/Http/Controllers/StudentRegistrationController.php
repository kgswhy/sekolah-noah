<?php

namespace App\Http\Controllers;

use App\Models\StudentRegistration;
use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    public function index() {
        $registrations = StudentRegistration::all();
        return view('pages.admission.index', compact('registrations'));
    }

    public function create() {
        return view('pages.admission.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'tujuan_kelas' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'status' => 'required|in:Proses,Diterima,Ditolak',
        ]);

        StudentRegistration::create([
            'nama_siswa' => $request->nama_siswa,
            'tujuan_kelas' => $request->tujuan_kelas,
            'asal_sekolah' => $request->asal_sekolah,
            'status' => $request->status,
            'pembayaran' => $request->has('pembayaran'),
            'observasi' => $request->has('observasi'),
            'pengumuman' => $request->has('pengumuman'),
            'id_card' => $request->has('id_card'),
        ]);

        return redirect()->route('admission.index')->with('success', 'Pendaftaran berhasil disimpan!');
    }

    public function edit($id) {
        $registration = StudentRegistration::findOrFail($id);
        return view('pages.admission.edit', compact('registration'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'tujuan_kelas' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'status' => 'required|in:Proses,Diterima,Ditolak',
        ]);

        $registration = StudentRegistration::findOrFail($id);
        $registration->update([
            'nama_siswa' => $request->nama_siswa,
            'tujuan_kelas' => $request->tujuan_kelas,
            'asal_sekolah' => $request->asal_sekolah,
            'status' => $request->status,
            'pembayaran' => $request->has('pembayaran'),
            'observasi' => $request->has('observasi'),
            'pengumuman' => $request->has('pengumuman'),
            'id_card' => $request->has('id_card'),
        ]);

        return redirect()->route('admission.index')->with('success', 'Pendaftaran berhasil diupdate!');
    }

    public function destroy($id) {
        $registration = StudentRegistration::findOrFail($id);
        $registration->delete();

        return redirect()->route('admission.index')->with('success', 'Pendaftaran berhasil dihapus!');
    }

    public function accepted() {
        $registrations = StudentRegistration::where('status', 'Diterima')->get();
        return view('pages.admission.accepted', compact('registrations'));
    }
    
    public function rejected() {
        $registrations = StudentRegistration::where('status', 'Ditolak')->get();
        return view('pages.admission.rejected', compact('registrations'));
    }
    
}
