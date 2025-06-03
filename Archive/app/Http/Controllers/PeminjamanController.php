<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman; // Pastikan Anda membuat model Peminjaman

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('pages.peminjaman-ruangan.index');
    }

    public function create()
    {
        return view('pages.peminjaman-ruangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_diperlukan' => 'required|date',
            'waktu_pelaksanaan' => 'required|string',
            'unit' => 'required|string',
            'divisi' => 'required|string',
            'nama_kegiatan' => 'required|string',
            'tempat_kegiatan' => 'required|string',
            'nama_ruangan' => 'required|string',
            'jumlah_ruangan' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        Peminjaman::create($request->all());
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil disimpan');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return view('pages.peminjaman-ruangan.edit', compact('peminjaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_user' => 'required|string',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_diperlukan' => 'required|date',
            'waktu_pelaksanaan' => 'required|string',
            'unit' => 'required|string',
            'divisi' => 'required|string',
            'nama_kegiatan' => 'required|string',
            'tempat_kegiatan' => 'required|string',
            'nama_ruangan' => 'required|string',
            'jumlah_ruangan' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui');
    }

    public function destroy($id)
    {
        Peminjaman::destroy($id);
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}
