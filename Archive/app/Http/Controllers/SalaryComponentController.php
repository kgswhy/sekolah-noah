<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaryComponent;
use App\Models\Employee;

class SalaryComponentController extends Controller
{
    public function index($employeeId)
    {
        // Get the salary components for the employee
        $employee = Employee::findOrFail($employeeId);
        $salaryComponents = $employee->salaryComponents;

        return view('pages/salary-component/index', compact('employee', 'salaryComponents'));
    }

    public function create($employeeId)
    {
        $employee = Employee::findOrFail($employeeId);
        return view('pages/salary-component/create', compact('employee'));
    }

    public function store(Request $request, $employeeId)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|integer|min:1',
        ]);

        $salaryComponent = new SalaryComponent();
        $salaryComponent->employee_id = $employeeId;
        $salaryComponent->title = $validatedData['title'];
        $salaryComponent->description = $validatedData['description'];
        $salaryComponent->amount = $validatedData['amount'];
        $salaryComponent->save();

        return redirect()->route('salary-components.index', $employeeId)->with('success', 'Komponen Gaji berhasil ditambahkan!');
    }

    public function edit($employeeId, $id)
    {
        $salaryComponent = SalaryComponent::findOrFail($id);
        return view('pages/salary-component/edit', compact('salaryComponent', 'employeeId'));
    }

    public function update(Request $request, $employeeId, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|integer|min:1',
        ]);

        $salaryComponent = SalaryComponent::findOrFail($id);
        $salaryComponent->title = $validatedData['title'];
        $salaryComponent->description = $validatedData['description'];
        $salaryComponent->amount = $validatedData['amount'];
        $salaryComponent->save();

        return redirect()->route('salary-components.index', $employeeId)->with('success', 'Komponen Gaji berhasil diperbarui!');
    }

    public function destroy($employeeId, $id)
    {
        $salaryComponent = SalaryComponent::findOrFail($id);
        $salaryComponent->delete();

        return redirect()->route('salary-components.index', $employeeId)->with('success', 'Komponen Gaji berhasil dihapus!');
    }
}
