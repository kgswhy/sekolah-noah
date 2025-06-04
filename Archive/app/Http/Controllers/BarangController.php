<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('pages.operasional.barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('pages.operasional.barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|integer',
            'nama_ruangan' => 'required|string|max:255',
            'nomor_ruangan' => 'required|string|max:255',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil disimpan!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('pages.operasional.barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|integer',
            'nama_ruangan' => 'required|string|max:255',
            'nomor_ruangan' => 'required|string|max:255',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
