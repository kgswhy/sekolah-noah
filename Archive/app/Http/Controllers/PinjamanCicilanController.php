<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PinjamanCicilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PinjamanCicilanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        
        // Check if the user is an admin or approver
        if ($user->isAdmin() || $user->isApproverFor('pinjaman-cicilan')) {
            $pinjaman = PinjamanCicilan::with('employee')->latest()->get();
        } else {
            // Regular employee can only see their own requests
            $pinjaman = PinjamanCicilan::where('employee_id', $employee->id)->latest()->get();
        }
        
        return view('pages.pinjaman-cicilan.index', compact('pinjaman'));
    }

    public function create()
    {
        $employee = Employee::where('user_id', Auth::id())->first();
        return view('pages.pinjaman-cicilan.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_pinjaman' => 'required|numeric',
            'tujuan_pinjaman' => 'required|string|max:255',
            'jangka_waktu' => 'required|integer|min:1|max:36',
            'tanggal_pengajuan' => 'required|date',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $employee = Employee::where('user_id', Auth::id())->first();
        
        $cicilan_per_bulan = $request->jumlah_pinjaman / $request->jangka_waktu;
        
        $pinjaman = new PinjamanCicilan();
        $pinjaman->employee_id = $employee->id;
        $pinjaman->jumlah_pinjaman = $request->jumlah_pinjaman;
        $pinjaman->tujuan_pinjaman = $request->tujuan_pinjaman;
        $pinjaman->jangka_waktu = $request->jangka_waktu;
        $pinjaman->cicilan_per_bulan = $cicilan_per_bulan;
        $pinjaman->tanggal_pengajuan = $request->tanggal_pengajuan;
        $pinjaman->status = 'pending';
        
        if ($request->hasFile('dokumen_pendukung')) {
            $file = $request->file('dokumen_pendukung');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/dokumen/pinjaman', $fileName);
            $pinjaman->dokumen_pendukung = $fileName;
        }
        
        $pinjaman->save();
        
        return redirect()->route('pinjaman.index')->with('success', 'Pengajuan pinjaman berhasil dibuat.');
    }

    public function show($id)
    {
        $pinjaman = PinjamanCicilan::with(['employee', 'approver'])->findOrFail($id);
        
        // Authorization check
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        
        if (!$user->isAdmin() && !$user->isApproverFor('pinjaman-cicilan') && $employee->id != $pinjaman->employee_id) {
            return redirect()->route('pinjaman.index')->with('error', 'Anda tidak memiliki akses untuk melihat data ini.');
        }
        
        return view('pages.pinjaman-cicilan.detail', compact('pinjaman'));
    }

    public function edit($id)
    {
        $pinjaman = PinjamanCicilan::findOrFail($id);
        
        // Authorization check
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        
        if ($employee->id != $pinjaman->employee_id) {
            return redirect()->route('pinjaman.index')->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }
        
        if ($pinjaman->status != 'pending') {
            return redirect()->route('pinjaman.index')->with('error', 'Anda hanya dapat mengedit pengajuan yang masih dalam status menunggu.');
        }
        
        return view('pages.pinjaman-cicilan.edit', compact('pinjaman'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_pinjaman' => 'required|numeric',
            'tujuan_pinjaman' => 'required|string|max:255',
            'jangka_waktu' => 'required|integer|min:1|max:36',
            'tanggal_pengajuan' => 'required|date',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);
        
        $pinjaman = PinjamanCicilan::findOrFail($id);
        
        // Authorization check
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        
        if ($employee->id != $pinjaman->employee_id) {
            return redirect()->route('pinjaman.index')->with('error', 'Anda tidak memiliki akses untuk mengedit data ini.');
        }
        
        if ($pinjaman->status != 'pending') {
            return redirect()->route('pinjaman.index')->with('error', 'Anda hanya dapat mengedit pengajuan yang masih dalam status menunggu.');
        }
        
        $cicilan_per_bulan = $request->jumlah_pinjaman / $request->jangka_waktu;
        
        $pinjaman->jumlah_pinjaman = $request->jumlah_pinjaman;
        $pinjaman->tujuan_pinjaman = $request->tujuan_pinjaman;
        $pinjaman->jangka_waktu = $request->jangka_waktu;
        $pinjaman->cicilan_per_bulan = $cicilan_per_bulan;
        $pinjaman->tanggal_pengajuan = $request->tanggal_pengajuan;
        
        if ($request->hasFile('dokumen_pendukung')) {
            // Delete old file
            if ($pinjaman->dokumen_pendukung) {
                Storage::delete('public/dokumen/pinjaman/' . $pinjaman->dokumen_pendukung);
            }
            
            $file = $request->file('dokumen_pendukung');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/dokumen/pinjaman', $fileName);
            $pinjaman->dokumen_pendukung = $fileName;
        }
        
        $pinjaman->save();
        
        return redirect()->route('pinjaman.index')->with('success', 'Pengajuan pinjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pinjaman = PinjamanCicilan::findOrFail($id);
        
        // Authorization check
        $user = Auth::user();
        $employee = Employee::where('user_id', $user->id)->first();
        
        if ($employee->id != $pinjaman->employee_id) {
            return redirect()->route('pinjaman.index')->with('error', 'Anda tidak memiliki akses untuk menghapus data ini.');
        }
        
        if ($pinjaman->status != 'pending') {
            return redirect()->route('pinjaman.index')->with('error', 'Anda hanya dapat menghapus pengajuan yang masih dalam status menunggu.');
        }
        
        // Delete file if exists
        if ($pinjaman->dokumen_pendukung) {
            Storage::delete('public/dokumen/pinjaman/' . $pinjaman->dokumen_pendukung);
        }
        
        $pinjaman->delete();
        
        return redirect()->route('pinjaman.index')->with('success', 'Pengajuan pinjaman berhasil dihapus.');
    }

    public function approve($id)
    {
        $pinjaman = PinjamanCicilan::findOrFail($id);
        
        // Check if user has permission to approve
        if (!Auth::user()->isApproverFor('pinjaman-cicilan')) {
            return redirect()->route('pinjaman.index')->with('error', 'Anda tidak memiliki hak untuk menyetujui pengajuan ini.');
        }
        
        $pinjaman->status = 'approved';
        $pinjaman->approved_by = Auth::id();
        $pinjaman->save();
        
        return redirect()->route('pinjaman.index')->with('success', 'Pengajuan pinjaman berhasil disetujui.');
    }
    
    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejected_message' => 'required|string'
        ]);
        
        $pinjaman = PinjamanCicilan::findOrFail($id);
        
        // Check if user has permission to reject
        if (!Auth::user()->isApproverFor('pinjaman-cicilan')) {
            return redirect()->route('pinjaman.index')->with('error', 'Anda tidak memiliki hak untuk menolak pengajuan ini.');
        }
        
        $pinjaman->status = 'rejected';
        $pinjaman->rejected_message = $request->rejected_message;
        $pinjaman->rejected_at = now();
        $pinjaman->save();
        
        return redirect()->route('pinjaman.index')->with('success', 'Pengajuan pinjaman telah ditolak.');
    }
    
    public function preview($id)
    {
        $pinjaman = PinjamanCicilan::findOrFail($id);
        
        if (!$pinjaman->dokumen_pendukung) {
            return redirect()->back()->with('error', 'Tidak ada dokumen pendukung.');
        }
        
        $path = 'public/dokumen/pinjaman/' . $pinjaman->dokumen_pendukung;
        
        if (!Storage::exists($path)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
        
        return response()->file(storage_path('app/' . $path));
    }
} 