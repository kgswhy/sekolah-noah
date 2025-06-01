<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryComponentController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\FixingRequestController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\AdmissionActivityController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PengecekanBarangController;
use App\Http\Controllers\OperationalRequestController;
use App\Http\Controllers\PengajuanFotocopyController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ApprovalSettingController;
use App\Http\Controllers\IzinBriefController;
use App\Http\Controllers\KlaimBerobatController;
use App\Http\Controllers\SlipGajiSKKController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\RequestAtkController;
use App\Http\Controllers\LemburHonorController;
use App\Http\Controllers\EquipmentLoanController;
use App\Http\Controllers\PermintaanDesignController;

// Authentication Routes
Route::get('/login', [PagesController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::group(['middleware' => 'auth'], function () {

    // Dashboard
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/dashboard', [PagesController::class, 'dashboardPage'])->name('dashboard');

    // Student Management
    Route::get('/students', [PagesController::class, 'studentsPage'])->name('students.index');
    Route::get('/students/create', [PagesController::class, 'createStudentPage'])->name('students.create');
    Route::post('/students/create', [StudentController::class, 'createStudent'])->name('students.store');
    Route::get('/students/edit/{id}', [PagesController::class, 'editStudentPage'])->name('students.edit');
    Route::post('/students/edit/{id}', [StudentController::class, 'updateStudent'])->name('students.update');
    Route::delete('/students/delete/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/students/show/{id}', [PagesController::class, 'showDetailStudent'])->name('students.show');

    // IT Department
    Route::prefix('/it')->group(function () {
        // Fixing Request
        Route::get('/fixing-request', [FixingRequestController::class, 'index'])->name('fixing-request.index');
        Route::get('/fixing-request/create', [FixingRequestController::class, 'create'])->name('fixing-request.create');
        Route::post('/fixing-request', [FixingRequestController::class, 'store'])->name('fixing-request.store');
        Route::get('/fixing-request/{id}', [FixingRequestController::class, 'show'])->name('fixing-request.show');
        Route::get('/fixing-request/{id}/approve', [FixingRequestController::class, 'approve'])->name('fixing-request.approve');
        Route::post('/fixing-request/{id}/reject', [FixingRequestController::class, 'reject'])->name('fixing-request.reject');
        Route::delete('/fixing-request/{id}', [FixingRequestController::class, 'destroy'])->name('fixing-request.destroy');

        // Equipment Loan
        Route::get('/equipment-loan', [EquipmentLoanController::class, 'index'])->name('equipment-loan.index');
        Route::get('/equipment-loan/create', [EquipmentLoanController::class, 'create'])->name('equipment-loan.create');
        Route::post('/equipment-loan', [EquipmentLoanController::class, 'store'])->name('equipment-loan.store');
        Route::get('/equipment-loan/{equipmentLoan}', [EquipmentLoanController::class, 'show'])->name('equipment-loan.show');
        Route::post('/equipment-loan/{equipmentLoan}/approve', [EquipmentLoanController::class, 'approve'])->name('equipment-loan.approve');
        Route::post('/equipment-loan/{equipmentLoan}/reject', [EquipmentLoanController::class, 'reject'])->name('equipment-loan.reject');
        Route::delete('/equipment-loan/{equipmentLoan}', [EquipmentLoanController::class, 'destroy'])->name('equipment-loan.destroy');
        Route::get('/equipment-loan/{equipmentLoan}/edit', [EquipmentLoanController::class, 'edit'])->name('equipment-loan.edit');
        Route::put('/equipment-loan/{equipmentLoan}', [EquipmentLoanController::class, 'update'])->name('equipment-loan.update');
    });

    // Employee Management
    Route::get('/employee', [PagesController::class, 'employeePage'])->name('employee.index');
    Route::get('/employee/create', [PagesController::class, 'createEmployeePage'])->name('employee.create');
    Route::post('/employee/create', [EmployeeController::class, 'createEmployee'])->name('employee.store');
    Route::get('/employee/edit/{id}', [PagesController::class, 'editEmployeePage'])->name('employee.edit');
    Route::post('/employee/edit/{id}', [EmployeeController::class, 'editEmployee'])->name('employee.update');

    // Salary Components
    Route::prefix('/employee/{employeeId}')->group(function () {
        Route::get('salary-components', [SalaryComponentController::class, 'index'])->name('salary-components.index');
        Route::get('salary-components/create', [SalaryComponentController::class, 'create'])->name('salary-components.create');
        Route::post('salary-components', [SalaryComponentController::class, 'store'])->name('salary-components.store');
        Route::get('salary-components/{id}/edit', [SalaryComponentController::class, 'edit'])->name('salary-components.edit');
        Route::post('salary-components/{id}', [SalaryComponentController::class, 'update'])->name('salary-components.update');
        Route::get('salary-components/{id}/delete', [SalaryComponentController::class, 'destroy'])->name('salary-components.destroy');
    });

    // HR Management
    Route::get('/absence', [PagesController::class, 'absencePage'])->name('absence.index');
    Route::get('/payroll', [PagesController::class, 'payrollPage'])->name('payroll.index');
    Route::get('/kinerja', [PagesController::class, 'kinerjaPage'])->name('kinerja.index');

    // Resource Routes
    Route::resource('shifts', ShiftController::class);
    Route::resource('schedules', ScheduleController::class);

    // User Management
    Route::get('/users', [PagesController::class, 'usersPage'])->name('users.index');
    Route::get('/users/create', [PagesController::class, 'createUsersPage'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit']);
    Route::post('/users/update/{id}', [UserController::class, 'update']);
    Route::get('/users/delete/{id}', [UserController::class, 'destroy']);

    // Leave Management
    Route::prefix('/cuti')->group(function () {
        Route::get('/', [CutiController::class, 'index'])->name('cuti.index');
        Route::get('/create', [CutiController::class, 'create'])->name('cuti.create');
        Route::post('/store', [CutiController::class, 'store'])->name('cuti.store');
        Route::get('/{id}', [CutiController::class, 'show'])->name('cuti.show');
        Route::get('/{id}/edit', [CutiController::class, 'edit'])->name('cuti.edit');
        Route::post('/{id}/update', [CutiController::class, 'update'])->name('cuti.update');
        Route::delete('/{id}', [CutiController::class, 'destroy'])->name('cuti.destroy');
        Route::get('/{id}/approve', [CutiController::class, 'approve'])->name('cuti.approve');
        Route::post('/{id}/reject', [CutiController::class, 'reject'])->name('cuti.reject');
        Route::get('/{id}/dokumen', [CutiController::class, 'downloadDocument'])->name('cuti.dokumen');
        Route::get('/{id}/preview', [CutiController::class, 'previewDocument'])->name('cuti.preview');
    });

    // Document Management
    Route::get('/dms/{divisi}', [PagesController::class, 'dmsPage'])->name('dms.index');
    Route::get('/sop', [PagesController::class, 'sopPage'])->name('sop.index');
    Route::get('/sop/detail/{id}', [PagesController::class, 'detailSopPage'])->name('sop.detail');
    Route::get('/sop/create', [PagesController::class, 'createSopPage'])->name('sop.create');
    Route::get('/regulasi', [PagesController::class, 'regulasiPage'])->name('regulasi.index');
    Route::get('/regulasi/detail/{id}', [PagesController::class, 'detailRegulasiPage'])->name('regulasi.detail');
    Route::get('/regulasi/create', [PagesController::class, 'createRegulasiPage'])->name('regulasi.create');

    // Admission Management
    Route::prefix('admission')->group(function () {
        // Student Registration
        Route::get('/pendaftaran', [StudentRegistrationController::class, 'index'])->name('admission.index');
        Route::get('/pendaftaran/create', [StudentRegistrationController::class, 'create'])->name('admission.create');
        Route::post('/pendaftaran', [StudentRegistrationController::class, 'store'])->name('admission.store');
        Route::get('/pendaftaran/edit/{id}', [StudentRegistrationController::class, 'edit'])->name('admission.edit');
        Route::post('/pendaftaran/update/{id}', [StudentRegistrationController::class, 'update'])->name('admission.update');
        Route::get('/pendaftaran/delete/{id}', [StudentRegistrationController::class, 'destroy'])->name('admission.destroy');
        Route::get('/siswa-diterima', [StudentRegistrationController::class, 'accepted'])->name('admission.accepted');
        Route::get('/siswa-tidak-diterima', [StudentRegistrationController::class, 'rejected'])->name('admission.rejected');

        // Admission Activities
        Route::get('/kegiatan', [AdmissionActivityController::class, 'index'])->name('admission.activity.index');
        Route::get('/kegiatan/create', [AdmissionActivityController::class, 'create'])->name('admission.activity.create');
        Route::post('/kegiatan', [AdmissionActivityController::class, 'store'])->name('admission.activity.store');
        Route::get('/kegiatan/edit/{id}', [AdmissionActivityController::class, 'edit'])->name('admission.activity.edit');
        Route::post('/kegiatan/update/{id}', [AdmissionActivityController::class, 'update'])->name('admission.activity.update');
        Route::get('/kegiatan/delete/{id}', [AdmissionActivityController::class, 'destroy'])->name('admission.activity.destroy');
    });

    // Operational Management
    Route::prefix('operasional')->group(function () {
        // Barang Management
        Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
        Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
        Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
        Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
        Route::post('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::get('/barang/delete/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

        // Pengecekan Barang Management
        Route::get('/barang/{id_barang}/pengecekan', [PengecekanBarangController::class, 'index'])->name('pengecekan.index');
        Route::get('/barang/{id_barang}/pengecekan/create', [PengecekanBarangController::class, 'create'])->name('pengecekan.create');
        Route::post('/barang/{id_barang}/pengecekan', [PengecekanBarangController::class, 'store'])->name('pengecekan.store');
        Route::get('/barang/{id_barang}/pengecekan/edit/{id}', [PengecekanBarangController::class, 'edit'])->name('pengecekan.edit');
        Route::post('/barang/{id_barang}/pengecekan/update/{id}', [PengecekanBarangController::class, 'update'])->name('pengecekan.update');
        Route::get('/barang/{id_barang}/pengecekan/delete/{id}', [PengecekanBarangController::class, 'destroy'])->name('pengecekan.destroy');

        // Kurir & Vehicle Management
        Route::get('/kurir-mobil', [OperationalRequestController::class, 'index'])->name('operasional.index');
        Route::get('/kurir-mobil/create', [OperationalRequestController::class, 'create'])->name('operasional.create');
        Route::post('/kurir-mobil', [OperationalRequestController::class, 'store'])->name('operasional.store');
        Route::get('/kurir-mobil/edit/{id}', [OperationalRequestController::class, 'edit'])->name('operasional.edit');
        Route::post('/kurir-mobil/update/{id}', [OperationalRequestController::class, 'update'])->name('operasional.update');
        Route::get('/kurir-mobil/delete/{id}', [OperationalRequestController::class, 'destroy'])->name('operasional.destroy');

        // Peminjaman Management
        Route::prefix('peminjaman')->group(function () {
            Route::get('/', [App\Http\Controllers\Operasional\PeminjamanRuanganController::class, 'index'])->name('peminjaman.index');
            Route::get('/create', [App\Http\Controllers\Operasional\PeminjamanRuanganController::class, 'create'])->name('peminjaman.create');
            Route::post('/store', [App\Http\Controllers\Operasional\PeminjamanRuanganController::class, 'store'])->name('peminjaman.store');
            Route::get('/edit/{id}', [App\Http\Controllers\Operasional\PeminjamanRuanganController::class, 'edit'])->name('peminjaman.edit');
            Route::post('/update/{id}', [App\Http\Controllers\Operasional\PeminjamanRuanganController::class, 'update'])->name('peminjaman.update');
            Route::delete('/delete/{id}', [App\Http\Controllers\Operasional\PeminjamanRuanganController::class, 'destroy'])->name('peminjaman.delete');
            Route::get('/show/{id}', [App\Http\Controllers\Operasional\PeminjamanRuanganController::class, 'show'])->name('peminjaman.show');
        });
    });

    // Administration Management
    Route::prefix('administrasi/request-fotocopy')->name('request-fotocopy.')->group(function () {
        Route::get('/', [PengajuanFotocopyController::class, 'index'])->name('index');
        Route::get('/create', [PengajuanFotocopyController::class, 'create'])->name('create');
        Route::post('/', [PengajuanFotocopyController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PengajuanFotocopyController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PengajuanFotocopyController::class, 'update'])->name('update');
        Route::delete('/{id}', [PengajuanFotocopyController::class, 'destroy'])->name('destroy');
        Route::post('/{id}/approve', [PengajuanFotocopyController::class, 'approve'])->name('approve');
        Route::post('/{id}/reject', [PengajuanFotocopyController::class, 'reject'])->name('reject');
    });

    // Finance Management
    Route::prefix('finance')->group(function () {
        // Pembayaran Siswa
        Route::prefix('pembayaran-siswa')->group(function () {
            Route::view('/', 'pages.pembayaran-siswa.index');
            Route::view('/create', 'pages.pembayaran-siswa.create');
        });

        // Aktiva Tetap
        Route::prefix('aktiva-tetap')->group(function () {
            Route::view('/', 'pages.aktiva-tetap.index');
            Route::view('/create', 'pages.aktiva-tetap.create');
        });

        // Pengajuan Dana Bank
        Route::prefix('pengajuan-dana-bank')->group(function () {
            Route::view('/', 'pages.pengajuan-dana-bank.index');
            Route::view('/create', 'pages.pengajuan-dana-bank.create');
        });
    });

    // HR Additional Features
    // Brief Absen
    Route::prefix('brief-absen')->group(function () {
        Route::get('/', [IzinBriefController::class, 'index'])->name('brief.index');
        Route::get('/create', [IzinBriefController::class, 'create'])->name('brief.create');
        Route::post('/store', [IzinBriefController::class, 'store'])->name('brief.store');
        Route::get('/{id}', [IzinBriefController::class, 'show'])->name('brief.show');
        Route::get('/{id}/edit', [IzinBriefController::class, 'edit'])->name('brief.edit');
        Route::post('/{id}/update', [IzinBriefController::class, 'update'])->name('brief.update');
        Route::delete('/{id}', [IzinBriefController::class, 'destroy'])->name('brief.destroy');
        Route::get('/{id}/approve', [IzinBriefController::class, 'approve'])->name('brief.approve');
        Route::post('/{id}/reject', [IzinBriefController::class, 'reject'])->name('brief.reject');
        Route::get('/{id}/dokumen', [IzinBriefController::class, 'downloadDocument'])->name('brief.dokumen');
        Route::get('/{id}/preview', [IzinBriefController::class, 'previewDocument'])->name('brief.preview');
    });

    // Klaim Berobat
    Route::prefix('klaim-berobat')->group(function () {
        Route::get('/', [KlaimBerobatController::class, 'index'])->name('klaim.index');
        Route::get('/create', [KlaimBerobatController::class, 'create'])->name('klaim.create');
        Route::post('/store', [KlaimBerobatController::class, 'store'])->name('klaim.store');
        Route::get('/{id}', [KlaimBerobatController::class, 'show'])->name('klaim.show');
        Route::get('/{id}/edit', [KlaimBerobatController::class, 'edit'])->name('klaim.edit');
        Route::post('/{id}/update', [KlaimBerobatController::class, 'update'])->name('klaim.update');
        Route::delete('/{id}', [KlaimBerobatController::class, 'destroy'])->name('klaim.destroy');
        Route::get('/{id}/approve', [KlaimBerobatController::class, 'approve'])->name('klaim.approve');
        Route::post('/{id}/reject', [KlaimBerobatController::class, 'reject'])->name('klaim.reject');
        Route::get('/{id}/dokumen', [KlaimBerobatController::class, 'downloadDocument'])->name('klaim.dokumen');
        Route::get('/{id}/preview', [KlaimBerobatController::class, 'previewDocument'])->name('klaim.preview');
    });

    // Slip Gaji SKK
    Route::prefix('slip-gaji-skk')->group(function () {
        Route::get('/', [SlipGajiSKKController::class, 'index'])->name('slip-gaji-skk.index');
        Route::get('/create', [SlipGajiSKKController::class, 'create'])->name('slip-gaji-skk.create');
        Route::post('/store', [SlipGajiSKKController::class, 'store'])->name('slip-gaji-skk.store');
        Route::get('/{id}', [SlipGajiSKKController::class, 'show'])->name('slip-gaji-skk.show');
        Route::get('/{id}/edit', [SlipGajiSKKController::class, 'edit'])->name('slip-gaji-skk.edit');
        Route::post('/{id}/update', [SlipGajiSKKController::class, 'update'])->name('slip-gaji-skk.update');
        Route::delete('/{id}', [SlipGajiSKKController::class, 'destroy'])->name('slip-gaji-skk.destroy');
        Route::get('/{id}/approve', [SlipGajiSKKController::class, 'approve'])->name('slip-gaji-skk.approve');
        Route::post('/{id}/reject', [SlipGajiSKKController::class, 'reject'])->name('slip-gaji-skk.reject');
        Route::get('/{id}/dokumen', [SlipGajiSKKController::class, 'downloadDocument'])->name('slip-gaji-skk.dokumen');
        Route::get('/{id}/preview', [SlipGajiSKKController::class, 'previewDocument'])->name('slip-gaji-skk.preview');
    });

    // Pinjaman Cicilan
    Route::prefix('pinjaman-cicilan')->group(function () {
        Route::get('/', [App\Http\Controllers\PinjamanCicilanController::class, 'index'])->name('pinjaman.index');
        Route::get('/create', [App\Http\Controllers\PinjamanCicilanController::class, 'create'])->name('pinjaman.create');
        Route::post('/', [App\Http\Controllers\PinjamanCicilanController::class, 'store'])->name('pinjaman.store');
        Route::get('/{id}', [App\Http\Controllers\PinjamanCicilanController::class, 'show'])->name('pinjaman.show');
        Route::get('/{id}/edit', [App\Http\Controllers\PinjamanCicilanController::class, 'edit'])->name('pinjaman.edit');
        Route::put('/{id}', [App\Http\Controllers\PinjamanCicilanController::class, 'update'])->name('pinjaman.update');
        Route::delete('/{id}', [App\Http\Controllers\PinjamanCicilanController::class, 'destroy'])->name('pinjaman.destroy');
        Route::get('/{id}/approve', [App\Http\Controllers\PinjamanCicilanController::class, 'approve'])->name('pinjaman.approve');
        Route::post('/{id}/reject', [App\Http\Controllers\PinjamanCicilanController::class, 'reject'])->name('pinjaman.reject');
        Route::get('/{id}/preview', [App\Http\Controllers\PinjamanCicilanController::class, 'preview'])->name('pinjaman.preview');
    });

    // Lembur & Honor
    Route::prefix('lembur-honor')->group(function () {
        Route::get('/', [LemburHonorController::class, 'index'])->name('lembur-honor.index');
        Route::get('/create', [LemburHonorController::class, 'create'])->name('lembur-honor.create');
        Route::post('/store', [LemburHonorController::class, 'store'])->name('lembur-honor.store');
        Route::get('/{id}', [LemburHonorController::class, 'show'])->name('lembur-honor.show');
        Route::get('/{id}/edit', [LemburHonorController::class, 'edit'])->name('lembur-honor.edit');
        Route::post('/{id}/update', [LemburHonorController::class, 'update'])->name('lembur-honor.update');
        Route::delete('/{id}', [LemburHonorController::class, 'destroy'])->name('lembur-honor.destroy');
        Route::post('/{id}/approve', [LemburHonorController::class, 'approve'])->name('lembur-honor.approve');
        Route::post('/{id}/reject', [LemburHonorController::class, 'reject'])->name('lembur-honor.reject');
        Route::get('/{id}/dokumen', [LemburHonorController::class, 'downloadDocument'])->name('lembur-honor.dokumen');
        Route::get('/{id}/preview', [LemburHonorController::class, 'preview'])->name('lembur-honor.preview');
    });

    // Surat & Task Management
    // Surat Tugas
    Route::prefix('surat-tugas')->group(function () {
        Route::get('/', [SuratTugasController::class, 'index'])->name('surat-tugas.index');
        Route::get('/create', [SuratTugasController::class, 'create'])->name('surat-tugas.create');
        Route::post('/store', [SuratTugasController::class, 'store'])->name('surat-tugas.store');
        Route::get('/{id}', [SuratTugasController::class, 'show'])->name('surat-tugas.show');
        Route::get('/{id}/edit', [SuratTugasController::class, 'edit'])->name('surat-tugas.edit');
        Route::post('/{id}/update', [SuratTugasController::class, 'update'])->name('surat-tugas.update');
        Route::delete('/{id}', [SuratTugasController::class, 'destroy'])->name('surat-tugas.destroy');
        Route::post('/{id}/approve', [SuratTugasController::class, 'approve'])->name('surat-tugas.approve');
        Route::post('/{id}/reject', [SuratTugasController::class, 'reject'])->name('surat-tugas.reject');
        Route::get('/{id}/dokumen', [SuratTugasController::class, 'downloadDocument'])->name('surat-tugas.dokumen');
        Route::get('/{id}/preview', [SuratTugasController::class, 'preview'])->name('surat-tugas.preview');
    });

    // Surat Masuk
    Route::prefix('surat-masuk')->group(function () {
        Route::view('/', 'pages.surat-masuk.index');
        Route::view('/create', 'pages.surat-masuk.create');
    });

    // Surat Keluar
    Route::prefix('surat-keluar')->group(function () {
        Route::view('/', 'pages.surat-keluar.index');
        Route::view('/create', 'pages.surat-keluar.create');
    });

    // Task Management
    Route::prefix('task')->group(function () {
        Route::view('/', 'pages.task.index');
    });

    // Calendar
    Route::prefix('dashboard/calendar')->group(function () {
        Route::view('/', 'pages.calendar.index');
        Route::view('/create', 'pages.calendar.create');
    });

    // Misc
    // Pengumuman
    Route::prefix('pengumuman')->group(function () {
        Route::view('/', 'pages.pengumuman.index');
        Route::view('/create', 'pages.pengumuman.create');
    });

    // Kelas
    Route::prefix('kelas')->group(function () {
        Route::get('/', function () {
            return view('pages.kelas.index');
        });
        Route::get('/create', function () {
            return view('pages.kelas.create');
        });
    });

    // Permintaan Design
    Route::resource('permintaan-design', PermintaanDesignController::class);

    // Settings Routes
    Route::prefix('setting')->group(function () {
        // Approval Settings
        Route::get('/approval', [ApprovalSettingController::class, 'index'])->name('approval.index');
        Route::post('/approval', [ApprovalSettingController::class, 'store'])->name('approval.store');
        Route::get('/approval/{id}/toggle', [ApprovalSettingController::class, 'toggleStatus'])->name('approval.toggle');
        Route::delete('/approval/{id}', [ApprovalSettingController::class, 'destroy'])->name('approval.destroy');

        // General Settings
        Route::get('/general', function () {
            return view('pages.settings.general');
        })->name('settings.general');
    });

    // Request ATK Routes
    Route::prefix('administrasi')->group(function () {
        Route::get('/request-atk', [RequestAtkController::class, 'index'])->name('request-atk.index');
        Route::get('/request-atk/create', [RequestAtkController::class, 'create'])->name('request-atk.create');
        Route::post('/request-atk', [RequestAtkController::class, 'store'])->name('request-atk.store');
        Route::get('/request-atk/{requestAtk}', [RequestAtkController::class, 'show'])->name('request-atk.show');
        Route::post('/request-atk/{requestAtk}/approve', [RequestAtkController::class, 'approve'])->name('request-atk.approve');
        Route::post('/request-atk/{requestAtk}/reject', [RequestAtkController::class, 'reject'])->name('request-atk.reject');
    });
});