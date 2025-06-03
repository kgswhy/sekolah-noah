<?php

namespace App\Http\Controllers\Operasional;

use App\Http\Controllers\Controller;
use App\Models\PeminjamanRuangan;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanRuanganController extends Controller
{
    public function index()
    {
        $peminjamanRuangan = PeminjamanRuangan::latest()->get();
        return view('pages.peminjaman-ruangan.index', compact('peminjamanRuangan'));
    }

    public function create()
    {
        $employee = Employee::where('user_id', Auth::id())->first();
        
        // Default data for new peminjaman
        $defaultData = [
            'nama_karyawan' => $employee->full_name ?? '',
            'unit' => $employee->unit ?? '',
            'departemen' => $employee->division ?? '',
            'tanggal_pengajuan' => date('Y-m-d'),
            'waktu_pelaksanaan' => '',
            'nama_kegiatan' => '',
            'tempat_kegiatan' => '',
            'ruangan' => [],
            'jumlah' => [1],
            'keterangan' => ['']
        ];

        return view('pages.peminjaman-ruangan.create', compact('employee', 'defaultData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required|string',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_diperlukan' => 'required|date',
            'waktu_pelaksanaan' => 'required|string',
            'unit' => 'required|string',
            'departemen' => 'required|string',
            'nama_kegiatan' => 'required|string',
            'tempat_kegiatan' => 'required|string',
            'ruangan.*' => 'required|string',
            'jumlah.*' => 'required|integer|min:1',
            'keterangan.*' => 'nullable|string',
        ]);

        $peminjaman = PeminjamanRuangan::create($request->only([
            'nama_karyawan', 'tanggal_pengajuan', 'tanggal_diperlukan',
            'waktu_pelaksanaan', 'unit', 'departemen', 'nama_kegiatan', 'tempat_kegiatan'
        ]) + [
            'ruangan' => json_encode($request->ruangan),
            'jumlah' => json_encode($request->jumlah),
            'keterangan' => json_encode($request->keterangan)
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman Ruangan berhasil disimpan!');
    }

    public function edit($id)
    {
        $peminjaman = PeminjamanRuangan::findOrFail($id);
        $employee = Employee::where('user_id', Auth::id())->first();
        
        // Get existing data
        $existingData = [
            'nama_karyawan' => $peminjaman->nama_karyawan,
            'unit' => $peminjaman->unit,
            'departemen' => $peminjaman->departemen,
            'tanggal_pengajuan' => $peminjaman->tanggal_pengajuan,
            'tanggal_diperlukan' => $peminjaman->tanggal_diperlukan,
            'waktu_pelaksanaan' => $peminjaman->waktu_pelaksanaan,
            'nama_kegiatan' => $peminjaman->nama_kegiatan,
            'tempat_kegiatan' => $peminjaman->tempat_kegiatan,
            'ruangan' => json_decode($peminjaman->ruangan),
            'jumlah' => json_decode($peminjaman->jumlah),
            'keterangan' => json_decode($peminjaman->keterangan)
        ];

        return view('pages.peminjaman-ruangan.edit', compact('peminjaman', 'employee', 'existingData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required|string',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_diperlukan' => 'required|date',
            'waktu_pelaksanaan' => 'required|string',
            'unit' => 'required|string',
            'departemen' => 'required|string',
            'nama_kegiatan' => 'required|string',
            'tempat_kegiatan' => 'required|string',
            'ruangan.*' => 'required|string',
            'jumlah.*' => 'required|integer|min:1',
            'keterangan.*' => 'nullable|string',
        ]);

        $peminjaman = PeminjamanRuangan::findOrFail($id);
        $peminjaman->update($request->only([
            'nama_karyawan', 'tanggal_pengajuan', 'tanggal_diperlukan',
            'waktu_pelaksanaan', 'unit', 'departemen', 'nama_kegiatan', 'tempat_kegiatan'
        ]) + [
            'ruangan' => json_encode($request->ruangan),
            'jumlah' => json_encode($request->jumlah),
            'keterangan' => json_encode($request->keterangan)
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman Ruangan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $peminjaman = PeminjamanRuangan::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman Ruangan berhasil dihapus!');
    }

    public function show($id)
    {
        $peminjaman = PeminjamanRuangan::findOrFail($id);
        $employee = Employee::where('user_id', Auth::id())->first();
        return view('pages.peminjaman-ruangan.show', compact('peminjaman', 'employee'));
    }
}

