<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Employee;
use App\Models\Absence;
use App\Models\Payroll;
use App\Models\User;
use App\Models\Role;
use App\Models\FixingRequest;

class PagesController extends Controller
{

    public function loginPage()
    {
        return view('pages/auth/login');
    }

    public function dashboardPage()
    {
        return view('pages/dashboard/index');
    }

    public function studentsPage()
    {
        $data['students'] = Student::all();
        return view('pages/students/index', $data);
    }

    public function createStudentPage()
    {
        return view('pages/students/create');
    }

    public function editStudentPage($id)
    {
        $data['student'] = Student::find($id);
        return view('pages/students/edit', $data);
    }

    public function showDetailStudent($id)
    {
        $data['student'] = Student::find($id);
        return view('pages/students/detail', $data);
    }

    public function fixingRequestPage()
    {
        $data['fixing_requests'] = FixingRequest::all();
        return view('pages/fixing-request/index', $data);
    }

    public function createFixingRequestPage()
    {
        return view('pages/fixing-request/create');
    }

    public function equipmentLoanPage()
    {
        return view('pages/equipment-loan/index');
    }

    public function createEquipmentLoanPage()
    {
        return view('pages/equipment-loan/create');
    }

    public function employeePage()
    {
        $data['employees'] = Employee::all();
        return view('pages/employee/index', $data);
    }

    public function createEmployeePage()
    {
        return view('pages/employee/create');
    }

    public function editEmployeePage($id)
    {
        $data['employee'] = Employee::find($id);
        return view('pages/employee/edit', $data);
    }

    public function absencePage()
    {
        $data['absences'] = Absence::all();
        return view('pages/absence/index', $data);
    }

    public function payrollPage(Request $request)
    {
        // Ambil parameter 'monthyear' dari request
        $monthyear = $request->input('monthyear');

        // Ambil semua data payroll dan filter berdasarkan bulan dan tahun
        if ($monthyear) {
            // Misalnya, format monthyear adalah "YYYY-MM"
            $data['payrolls'] = Payroll::whereYear('date', substr($monthyear, 0, 4))
                ->whereMonth('date', substr($monthyear, 5, 2))
                ->get();
        } else {
            // Jika tidak ada parameter monthyear, ambil semua data
            $data['payrolls'] = Payroll::all();
        }

        return view('pages/payroll/index', $data);
    }

    public function usersPage()
    {
        $data['users'] = User::all();
        return view('pages/users/index', $data);
    }

    public function createUsersPage()
    {
        $data['roles'] = Role::all();
        $data['employees'] = Employee::all();  // Fetch all employees
        return view('pages/users/create', $data);
    }

    public function dmsPage()
    {
        return view('pages/dms/index');
    }

    public function sopPage()
    {
        return view('pages/sop/index');
    }

    public function detailSopPage()
    {
        return view('pages/sop/detail');
    }

    public function createSopPage()
    {
        return view('pages/sop/create');
    }

    public function regulasiPage()
    {
        return view('pages/regulasi/index');
    }

    public function detailRegulasiPage()
    {
        return view('pages/regulasi/detail');
    }

    public function createRegulasiPage()
    {
        return view('pages/regulasi/create');
    }

}
