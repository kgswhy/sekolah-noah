<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|exists:roles,id',
            'employee_id' => 'required|exists:employees,id',  // Validate employee selection
        ]);

        // Simpan user ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Simpan role_id
        $user->role_id = $request->role;
        $user->save();

        // Assign the user_id to the selected employee
        $employee = Employee::find($request->employee_id);
        $employee->user_id = $user->id;
        $employee->save();

        return redirect('/users')->with('success', 'User berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $employees = Employee::all();  // Fetch all employees to select which employee will be assigned to this user
        return view('pages.users.edit', compact('user', 'roles', 'employees'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|exists:roles,id',
            'employee_id' => 'nullable|exists:employees,id',  // Validate employee selection
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:6']);
            $user->password = Hash::make($request->password);
        }

        $user->role_id = $request->role;

        // Update employee_id if selected
        if ($request->filled('employee_id')) {
            $employee = Employee::find($request->employee_id);
            $employee->update([
                'user_id' => $user->id
            ]);
        }

        $user->save();

        return redirect('/users')->with('success', 'User berhasil diupdate!');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'User berhasil dihapus!');
    }
}
