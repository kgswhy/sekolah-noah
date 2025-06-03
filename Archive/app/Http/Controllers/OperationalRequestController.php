<?php

namespace App\Http\Controllers;

use App\Models\OperationalRequest;
use Illuminate\Http\Request;

class OperationalRequestController extends Controller
{
    public function index()
    {
        // Memisahkan request berdasarkan jenis kurir dan mobil
        $kurirRequests = OperationalRequest::where('jenis', 'kurir')->get();
        $mobilRequests = OperationalRequest::where('jenis', 'mobil')->get();

        return view('pages.operasional.kurir-mobil.index', compact('kurirRequests', 'mobilRequests'));
    }


    public function create()
    {
        return view('pages.operasional.kurir-mobil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'request_by' => 'required|string|max:255',
            'jenis' => 'required|in:Kurir,Mobil',
            'tanggal' => 'required|date',
            'dari_jam' => 'required',
            'sampai_jam' => 'required',
            'tujuan' => 'required|string|max:255',
            'keperluan' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        OperationalRequest::create($request->all());

        return redirect()->route('operasional.index')->with('success', 'Request berhasil disimpan!');
    }

    public function edit($id)
    {
        $request = OperationalRequest::findOrFail($id);
        return view('pages.operasional.kurir-mobil.edit', compact('request'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'unit' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'request_by' => 'required|string|max:255',
            'jenis' => 'required|in:Kurir,Mobil',
            'tanggal' => 'required|date',
            'dari_jam' => 'required',
            'sampai_jam' => 'required',
            'tujuan' => 'required|string|max:255',
            'keperluan' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $opRequest = OperationalRequest::findOrFail($id);
        $opRequest->update($request->all());

        return redirect()->route('operasional.index')->with('success', 'Request berhasil diupdate!');
    }

    public function destroy($id)
    {
        $opRequest = OperationalRequest::findOrFail($id);
        $opRequest->delete();

        return redirect()->route('operasional.index')->with('success', 'Request berhasil dihapus!');
    }
}
