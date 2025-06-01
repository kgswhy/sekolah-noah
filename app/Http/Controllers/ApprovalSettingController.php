<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Approver;

class ApprovalSettingController extends Controller
{
    /**
     * Display the approval settings page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get all users for selection
        $users = User::all();
        
        // Get all approvers for any module with their department types
        $approvers = Approver::with('user')
            ->orderBy('module')
            ->orderBy('approval_level')
            ->orderBy('department_type')
            ->get();
            
        return view('pages.settings.approval', compact('users', 'approvers'));
    }
    
    /**
     * Add a new approver.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'module' => 'required|string|max:20',
            'approval_level' => 'required|integer|between:1,3',
            'department_type' => 'required|in:akademik,non-akademik',
            'description' => 'nullable|string|max:255',
        ]);
        
        // Check if user is already an approver for this module at this level and department type
        $exists = Approver::where('user_id', $request->user_id)
            ->where('module', $request->module)
            ->where('approval_level', $request->approval_level)
            ->where('department_type', $request->department_type)
            ->exists();
            
        if ($exists) {
            return back()->with('error', 'User sudah terdaftar sebagai approver untuk jenis approval ini pada level dan departemen yang sama.');
        }
        
        Approver::create([
            'user_id' => $request->user_id,
            'module' => $request->module,
            'approval_level' => $request->approval_level,
            'department_type' => $request->department_type,
            'description' => $request->description,
            'active' => true,
        ]);
        
        return redirect()->route('approval.index')->with('success', 'Approver berhasil ditambahkan.');
    }
    
    /**
     * Toggle the active status of an approver.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleStatus($id)
    {
        $approver = Approver::findOrFail($id);
        $approver->active = !$approver->active;
        $approver->save();
        
        $status = $approver->active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Approver berhasil $status.");
    }
    
    /**
     * Remove an approver.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $approver = Approver::findOrFail($id);
        $approver->delete();
        
        return back()->with('success', 'Approver berhasil dihapus.');
    }
}
