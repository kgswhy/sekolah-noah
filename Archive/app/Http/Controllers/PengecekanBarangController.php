<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PengecekanBarang;
use Illuminate\Http\Request;

class PengecekanBarangController extends Controller
{
    public function index($id_barang)
    {
        $barang = Barang::findOrFail($id_barang);
        $pengecekan = $barang->pengecekan;
        return view('pages.operasional.pengecekan.index', compact('barang', 'pengecekan'));
    }

    public function create($id_barang)
    {
        $barang = Barang::findOrFail($id_barang);
        return view('pages.operasional.pengecekan.create', compact('barang'));
    }

    public function store(Request $request, $id_barang)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kondisi' => 'required|string|max:255',
        ]);

        PengecekanBarang::create([
            'barang_id' => $id_barang,
            'tanggal' => $request->tanggal,
            'kondisi' => $request->kondisi,
        ]);

        return redirect()->route('pengecekan.index', $id_barang)->with('success', 'Pengecekan barang berhasil disimpan!');
    }

    public function edit($barangId, $id)
    {
        // Find the barang by ID
        $barang = Barang::findOrFail($barangId);

        // Find the pengecekan by ID for the given barang
        $pengecekan = PengecekanBarang::findOrFail($id);

        // Return the edit view with the barang and pengecekan data
        return view('pages.operasional.pengecekan.edit', compact('barang', 'pengecekan'));
    }

    public function update(Request $request, $barangId, $id)
    {
        // Validate the incoming data
        $request->validate([
            'tanggal' => 'required|date',
            'kondisi' => 'required|string|max:255',
        ]);

        // Find the pengecekan entry
        $pengecekan = PengecekanBarang::findOrFail($id);

        // Update the pengecekan entry with the validated data
        $pengecekan->update([
            'tanggal' => $request->tanggal,
            'kondisi' => $request->kondisi,
        ]);

        // Redirect back to the pengecekan index page with a success message
        return redirect()->route('pengecekan.index', $barangId)
            ->with('success', 'Pengecekan barang berhasil diperbarui!');
    }

    public function destroy($id_barang, $id)
    {
        PengecekanBarang::findOrFail($id)->delete();
        return redirect()->route('pengecekan.index', $id_barang)->with('success', 'Pengecekan barang berhasil dihapus!');
    }
}
