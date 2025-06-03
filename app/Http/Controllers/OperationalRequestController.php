<?php

namespace App\Http\Controllers;

use App\Models\OperationalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationalRequestController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get all requests if user is admin
        if ($user->isAdmin()) {
            $kurirRequests = OperationalRequest::where('jenis', 'kurir')->latest()->get();
            $mobilRequests = OperationalRequest::where('jenis', 'mobil')->latest()->get();
        } else {
            // Get the department types this user can approve
            $departmentTypes = $user->approvers()
                ->where('module', 'kurir-mobil')
                ->where('active', true)
                ->pluck('department_type')
                ->unique();

            // If user is an approver, show only requests from their department type
            if ($departmentTypes->isNotEmpty()) {
                $kurirRequests = OperationalRequest::where('jenis', 'kurir')
                    ->whereIn('department_type', $departmentTypes)
                    ->latest()
                    ->get();
                $mobilRequests = OperationalRequest::where('jenis', 'mobil')
                    ->whereIn('department_type', $departmentTypes)
                    ->latest()
                    ->get();
            } else {
                // If user is not an approver, show only their own requests (by name)
                $kurirRequests = OperationalRequest::where('jenis', 'kurir')
                    ->where('request_by', $user->name)
                    ->latest()
                    ->get();
                $mobilRequests = OperationalRequest::where('jenis', 'mobil')
                    ->where('request_by', $user->name)
                    ->latest()
                    ->get();
            }
        }

        return view('pages.operasional.kurir-mobil.index', compact('kurirRequests', 'mobilRequests'));
    }


    public function create()
    {
        return view('pages.operasional.kurir-mobil.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        
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

        // Determine department type based on division
        $departmentType = ($request->divisi === 'Akademik') ? 'akademik' : 'non-akademik';

        $requestData = $request->all();
        $requestData['status'] = 'pending';
        $requestData['current_approval_level'] = 1;
        $requestData['department_type'] = $departmentType;

        OperationalRequest::create($requestData);

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

    /**
     * Approve the specified operational request
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        $user = Auth::user();
        $request = OperationalRequest::findOrFail($id);

        if (!$request->canBeApprovedBy($user)) {
            return redirect()->route('operasional.index')
                ->with('error', 'Anda tidak memiliki hak untuk menyetujui permintaan ini.');
        }

        $request->approve($user->id, 'Approved');

        return redirect()->route('operasional.index')
            ->with('success', 'Permintaan operasional berhasil disetujui.');
    }

    /**
     * Reject the specified operational request with a reason
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, $id)
    {
        $user = Auth::user();
        $operationalRequest = OperationalRequest::findOrFail($id);

        if (!$operationalRequest->canBeApprovedBy($user)) {
            return redirect()->route('operasional.index')
                ->with('error', 'Anda tidak memiliki hak untuk menolak permintaan ini.');
        }

        $request->validate([
            'rejected_message' => 'required|string|max:1000',
        ]);

        $operationalRequest->reject($user->id, $request->rejected_message);

        return redirect()->route('operasional.index')
            ->with('success', 'Permintaan operasional telah ditolak.');
    }
}
