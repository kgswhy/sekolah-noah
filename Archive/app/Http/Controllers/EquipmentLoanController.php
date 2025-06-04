<?php

namespace App\Http\Controllers;

use App\Models\EquipmentLoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipmentLoanController extends Controller
{
    public function index(Request $request)
    {
        $query = EquipmentLoan::with('user');

        // Filter by status if provided
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // If user is not admin, only show their loans
        if (!Auth::user()->hasRole('admin')) {
            $query->where('user_id', Auth::id());
        }

        $equipmentLoans = $query->latest()->get();

        return view('pages.equipment-loan.index', compact('equipmentLoans'));
    }

    public function create()
    {
        return view('pages.equipment-loan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'equipment_name' => 'required|string|max:255',
            'unit' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'loan_date' => 'required|date',
            'return_date' => 'required|date|after:loan_date',
            'purpose' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'pending';

        EquipmentLoan::create($validated);

        return redirect()->route('equipment-loan.index')
            ->with('success', 'Permintaan peminjaman peralatan berhasil dibuat.');
    }

    public function show(EquipmentLoan $equipmentLoan)
    {
        return view('pages.equipment-loan.show', compact('equipmentLoan'));
    }

    public function approve(EquipmentLoan $equipmentLoan)
    {
        if (!Auth::user()->hasRole('admin')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menyetujui permintaan ini.');
        }

        if ($equipmentLoan->status !== 'pending') {
            return redirect()->back()->with('error', 'Status permintaan tidak valid.');
        }

        $equipmentLoan->update([
            'status' => 'approved',
            'approved_by' => Auth::id(),
        ]);

        return redirect()->route('equipment-loan.index')
            ->with('success', 'Permintaan peminjaman peralatan berhasil disetujui.');
    }

    public function reject(Request $request, EquipmentLoan $equipmentLoan)
    {
        if (!Auth::user()->hasRole('admin')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menolak permintaan ini.');
        }

        if ($equipmentLoan->status !== 'pending') {
            return redirect()->back()->with('error', 'Status permintaan tidak valid.');
        }

        $validated = $request->validate([
            'rejected_message' => 'required|string',
        ]);

        $equipmentLoan->update([
            'status' => 'rejected',
            'rejected_by' => Auth::id(),
            'rejected_at' => now(),
            'rejected_message' => $validated['rejected_message'],
        ]);

        return redirect()->route('equipment-loan.index')
            ->with('success', 'Permintaan peminjaman peralatan berhasil ditolak.');
    }

    public function destroy(EquipmentLoan $equipmentLoan)
    {
        if (Auth::id() !== $equipmentLoan->user_id && !Auth::user()->hasRole('admin')) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus permintaan ini.');
        }

        if ($equipmentLoan->status !== 'pending' && !Auth::user()->hasRole('admin')) {
            return redirect()->back()->with('error', 'Hanya permintaan yang masih pending yang dapat dihapus.');
        }

        $equipmentLoan->delete();

        return redirect()->route('equipment-loan.index')
            ->with('success', 'Permintaan peminjaman peralatan berhasil dihapus.');
    }

    public function edit(EquipmentLoan $equipmentLoan)
    {
        // Hanya pemilik data atau admin yang boleh edit
        if (Auth::id() !== $equipmentLoan->user_id && !Auth::user()->hasRole('admin')) {
            return redirect()->route('equipment-loan.index')->with('error', 'Anda tidak memiliki akses untuk mengedit permintaan ini.');
        }
        return view('pages.equipment-loan.edit', compact('equipmentLoan'));
    }

    public function update(Request $request, EquipmentLoan $equipmentLoan)
    {
        // Hanya pemilik data atau admin yang boleh update
        if (Auth::id() !== $equipmentLoan->user_id && !Auth::user()->hasRole('admin')) {
            return redirect()->route('equipment-loan.index')->with('error', 'Anda tidak memiliki akses untuk mengubah permintaan ini.');
        }
        // Hanya status pending yang bisa diupdate oleh user
        if ($equipmentLoan->status !== 'pending' && !Auth::user()->hasRole('admin')) {
            return redirect()->route('equipment-loan.index')->with('error', 'Hanya permintaan yang masih pending yang dapat diubah.');
        }
        $validated = $request->validate([
            'equipment_name' => 'required|string|max:255',
            'loan_date' => 'required|date',
            'return_date' => 'required|date|after:loan_date',
            'purpose' => 'required|string',
        ]);
        $equipmentLoan->update($validated);
        return redirect()->route('equipment-loan.index')->with('success', 'Permintaan peminjaman peralatan berhasil diupdate.');
    }
}