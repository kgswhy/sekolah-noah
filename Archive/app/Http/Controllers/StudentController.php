<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    
    public function createStudent(Request $request){
        // Menyimpan data siswa ke database
        $student = Student::create([
            'full_name' => $request->full_name,
            'school_id' => $request->school_id,
            'national_school_id' => $request->national_school_id,
            'nickname' => $request->nickname,
            'class' => $request->class,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'nationality' => $request->nationality,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'living_with' => $request->living_with,
            'has_siblings_at_school' => $request->has_siblings_at_school,
            'previous_school_name' => $request->previous_school_name,
            'previous_school_class' => $request->previous_school_class,
            'previous_school_address' => $request->previous_school_address,
            'previous_school_phone' => $request->previous_school_phone,
            'father_name' => $request->father_name,
            'father_email' => $request->father_email,
            'father_phone' => $request->father_phone,
            'father_nationality' => $request->father_nationality,
            'father_id_card_number' => $request->father_id_card_number,
            'father_kitas_number' => $request->father_kitas_number,
            'father_job' => $request->father_job,
            'father_company' => $request->father_company,
            'father_position' => $request->father_position,
            'father_office_phone' => $request->father_office_phone,
            'father_office_address' => $request->father_office_address,
            'father_monthly_income' => $request->father_monthly_income,
            'mother_name' => $request->mother_name,
            'mother_email' => $request->mother_email,
            'mother_phone' => $request->mother_phone,
            'mother_nationality' => $request->mother_nationality,
            'mother_id_card_number' => $request->mother_id_card_number,
            'mother_kitas_number' => $request->mother_kitas_number,
            'mother_job' => $request->mother_job,
            'mother_company' => $request->mother_company,
            'mother_position' => $request->mother_position,
            'mother_office_phone' => $request->mother_office_phone,
            'mother_office_address' => $request->mother_office_address,
            'mother_monthly_income' => $request->mother_monthly_income,
            'guardian_name' => $request->guardian_name,
            'guardian_email' => $request->guardian_email,
            'guardian_phone' => $request->guardian_phone,
            'guardian_nationality' => $request->guardian_nationality,
            'guardian_id_card_number' => $request->guardian_id_card_number,
            'guardian_kitas_number' => $request->guardian_kitas_number,
            'guardian_job' => $request->guardian_job,
            'guardian_company' => $request->guardian_company,
            'guardian_position' => $request->guardian_position,
            'guardian_office_phone' => $request->guardian_office_phone,
            'guardian_office_address' => $request->guardian_office_address,
            'guardian_monthly_income' => $request->guardian_monthly_income,
        ]);

        // Redirect setelah data disimpan
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function updateStudent(Request $request, $id){
        // Mencari data siswa berdasarkan ID
        $student = Student::findOrFail($id);
    
        // Update data siswa dengan data yang dikirimkan dari form
        $student->update([
            'full_name' => $request->full_name,
            'school_id' => $request->school_id,
            'national_school_id' => $request->national_school_id,
            'nickname' => $request->nickname,
            'class' => $request->class,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'nationality' => $request->nationality,
            'address' => $request->address,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'living_with' => $request->living_with,
            'has_siblings_at_school' => $request->has_siblings_at_school,
            'previous_school_name' => $request->previous_school_name,
            'previous_school_class' => $request->previous_school_class,
            'previous_school_address' => $request->previous_school_address,
            'previous_school_phone' => $request->previous_school_phone,
            'father_name' => $request->father_name,
            'father_email' => $request->father_email,
            'father_phone' => $request->father_phone,
            'father_nationality' => $request->father_nationality,
            'father_id_card_number' => $request->father_id_card_number,
            'father_kitas_number' => $request->father_kitas_number,
            'father_job' => $request->father_job,
            'father_company' => $request->father_company,
            'father_position' => $request->father_position,
            'father_office_phone' => $request->father_office_phone,
            'father_office_address' => $request->father_office_address,
            'father_monthly_income' => $request->father_monthly_income,
            'mother_name' => $request->mother_name,
            'mother_email' => $request->mother_email,
            'mother_phone' => $request->mother_phone,
            'mother_nationality' => $request->mother_nationality,
            'mother_id_card_number' => $request->mother_id_card_number,
            'mother_kitas_number' => $request->mother_kitas_number,
            'mother_job' => $request->mother_job,
            'mother_company' => $request->mother_company,
            'mother_position' => $request->mother_position,
            'mother_office_phone' => $request->mother_office_phone,
            'mother_office_address' => $request->mother_office_address,
            'mother_monthly_income' => $request->mother_monthly_income,
            'guardian_name' => $request->guardian_name,
            'guardian_email' => $request->guardian_email,
            'guardian_phone' => $request->guardian_phone,
            'guardian_nationality' => $request->guardian_nationality,
            'guardian_id_card_number' => $request->guardian_id_card_number,
            'guardian_kitas_number' => $request->guardian_kitas_number,
            'guardian_job' => $request->guardian_job,
            'guardian_company' => $request->guardian_company,
            'guardian_position' => $request->guardian_position,
            'guardian_office_phone' => $request->guardian_office_phone,
            'guardian_office_address' => $request->guardian_office_address,
            'guardian_monthly_income' => $request->guardian_monthly_income,
        ]);
    
        // Redirect setelah data berhasil diupdate
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Find the student by ID
        $student = Student::findOrFail($id);

        // Delete the student
        $student->delete();

        // Redirect back with a success message
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    } 

}
