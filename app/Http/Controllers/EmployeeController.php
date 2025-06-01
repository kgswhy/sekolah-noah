<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    
    public function createEmployee(Request $request)
    {
        // Validasi semua data dari form
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'employee_number' => 'required|string|max:100|unique:employees,employee_number',
            'unit' => 'nullable|string|max:100',
            'division' => 'nullable|string|max:100',
            'employment_status' => 'nullable|string|max:100',
            'position' => 'nullable|string|max:100',
            'gender' => 'nullable|string|in:Laki-laki,Perempuan',
            'blood_type' => 'nullable|string|max:3',
            'birth_place' => 'nullable|string|max:100',
            'birth_date' => 'nullable|date',
            'bpjs_ketenagakerjaan_number' => 'nullable|string|max:100',
            'bpjs_kesehatan_number' => 'nullable|string|max:100',
            'nik' => 'nullable|string|max:50',
            'kk_number' => 'nullable|string|max:50',
            'religion' => 'nullable|string|max:50',
            'last_education' => 'nullable|string|max:100',
            'ktp_address' => 'nullable|string',
            'domicile_address' => 'nullable|string',
            'phone_number' => 'nullable|string|max:20',
            'npwp_number' => 'nullable|string|max:50',
            'school_email' => 'nullable|email|max:255',
            'other_email' => 'nullable|email|max:255',
            'marital_status' => 'nullable|string|max:50',
            'employee_status' => 'required|in:aktif,tidak aktif',
            'entry_date' => 'nullable|date',
            'exit_date' => 'nullable|date|after_or_equal:entry_date',
        ]);

        // Simpan data
        $employee = new Employee();
        $employee->full_name = $validatedData['full_name'];
        $employee->employee_number = $validatedData['employee_number'];
        $employee->unit = $validatedData['unit'];
        $employee->division = $validatedData['division'];
        $employee->employment_status = $validatedData['employment_status'];
        $employee->position = $validatedData['position'];
        $employee->gender = $validatedData['gender'];
        $employee->blood_type = $validatedData['blood_type'];
        $employee->birth_place = $validatedData['birth_place'];
        $employee->birth_date = $validatedData['birth_date'];
        $employee->bpjs_ketenagakerjaan_number = $validatedData['bpjs_ketenagakerjaan_number'];
        $employee->bpjs_kesehatan_number = $validatedData['bpjs_kesehatan_number'];
        $employee->nik = $validatedData['nik'];
        $employee->kk_number = $validatedData['kk_number'];
        $employee->religion = $validatedData['religion'];
        $employee->last_education = $validatedData['last_education'];
        $employee->ktp_address = $validatedData['ktp_address'];
        $employee->domicile_address = $validatedData['domicile_address'];
        $employee->phone_number = $validatedData['phone_number'];
        $employee->npwp_number = $validatedData['npwp_number'];
        $employee->school_email = $validatedData['school_email'];
        $employee->other_email = $validatedData['other_email'];
        $employee->marital_status = $validatedData['marital_status'];
        $employee->employee_status = $validatedData['employee_status'];
        $employee->entry_date = $validatedData['entry_date'];
        $employee->exit_date = $validatedData['exit_date'];
        $employee->save();

        return redirect()->route('employee.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }


    public function editEmployee(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'employee_number' => 'required|string|max:50',
            'unit' => 'nullable|string|max:100',
            'division' => 'nullable|string|max:100',
            'position' => 'nullable|string|max:100',
            'employment_status' => 'nullable|string|max:100',
            'gender' => 'nullable|string|max:20',
            'blood_type' => 'nullable|string|max:5',
            'birth_place' => 'nullable|string|max:100',
            'birth_date' => 'nullable|date',
            'bpjs_ketenagakerjaan_number' => 'nullable|string|max:50',
            'bpjs_kesehatan_number' => 'nullable|string|max:50',
            'nik' => 'nullable|string|max:20',
            'kk_number' => 'nullable|string|max:20',
            'religion' => 'nullable|string|max:50',
            'last_education' => 'nullable|string|max:100',
            'ktp_address' => 'nullable|string|max:255',
            'domicile_address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'npwp_number' => 'nullable|string|max:30',
            'school_email' => 'nullable|email|max:100',
            'other_email' => 'nullable|email|max:100',
            'marital_status' => 'nullable|string|max:50',
            'employee_status' => 'required|in:aktif,tidak aktif',
            'entry_date' => 'nullable|date',
            'exit_date' => 'nullable|date|after_or_equal:entry_date',
        ]);

        // Temukan karyawan berdasarkan ID
        $employee = Employee::findOrFail($id);

        // Update data karyawan
        $employee->update($validatedData);

        return redirect('/employee')->with('success', 'Data karyawan berhasil diperbarui!');
    }


}
