<?php

namespace App\Http\Controllers;

use App\Models\FixingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FixingRequestController extends Controller
{
    public function index()
    {
        $fixingRequests = FixingRequest::with('user')->latest()->get();
        return view('pages.fixing-request.index', compact('fixingRequests'));
    }

    public function create()
    {
        return view('pages.fixing-request.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'device_category' => 'required|string',
            'unit' => 'required|string',
            'division' => 'required|string',
            'damage_details' => 'required|string',
            'supporting_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx',
        ]);

        $path = null;
        if ($request->hasFile('supporting_document')) {
            $path = $request->file('supporting_document')->store('fixing_documents', 'public');
        }

        FixingRequest::create([
            'user_id' => Auth::user()->id,
            'device_category' => $request->device_category,
            'unit' => $request->unit,
            'division' => $request->division,
            'damage_details' => $request->damage_details,
            'supporting_document' => $path,
        ]);

        return redirect()->route('fixing-request.index')->with('success', 'Permintaan perbaikan berhasil dikirim.');
    }

    public function show($id)
    {
        $fixingRequest = FixingRequest::with('user')->findOrFail($id);
        return view('pages.fixing-request.show', compact('fixingRequest'));
    }

    public function approve($id)
    {
        $request = FixingRequest::findOrFail($id);
        $request->status = 'approved';
        $request->rejected_message = null;
        $request->save();

        return redirect()->back()->with('success', 'Permintaan berhasil disetujui.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejected_message' => 'required|string'
        ]);

        $fixingRequest = FixingRequest::findOrFail($id);
        $fixingRequest->status = 'rejected';
        $fixingRequest->rejected_message = $request->rejected_message;
        $fixingRequest->save();

        return redirect()->back()->with('success', 'Permintaan berhasil ditolak.');
    }

    public function destroy($id)
    {
        $fixingRequest = FixingRequest::findOrFail($id);
        
        // Delete the supporting document if it exists
        if ($fixingRequest->supporting_document) {
            Storage::disk('public')->delete($fixingRequest->supporting_document);
        }
        
        $fixingRequest->delete();
        
        return redirect()->back()->with('success', 'Permintaan berhasil dihapus.');
    }
}
