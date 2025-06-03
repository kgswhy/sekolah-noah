@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah Karyawan</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item" aria-current="page">HRD</li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Karyawan</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="/employee/create" method="POST">
                    @csrf
                    <!-- Nav Tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="personal-tab" data-bs-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Data Pribadi</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Data Kontak</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="employment-tab" data-bs-toggle="tab" href="#employment" role="tab" aria-controls="employment" aria-selected="false">Data Karyawan</a>
                        </li>
                    </ul>
                    <!-- Tab Content -->
                    <div class="tab-content mt-3" id="myTabContent">
                        <!-- Data Pribadi Tab -->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="full_name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nomor Induk Karyawan</label>
                                    <input type="text" class="form-control" name="employee_number" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="birth_place">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="birth_date">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-control" name="gender">
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Golongan Darah</label>
                                    <input type="text" class="form-control" name="blood_type">
                                </div>
                            </div>
                        </div>
                        <!-- Data Kontak Tab -->
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Alamat KTP</label>
                                    <textarea class="form-control" name="ktp_address"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Alamat Domisili</label>
                                    <textarea class="form-control" name="domicile_address"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" name="phone_number">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nomor NPWP</label>
                                    <input type="text" class="form-control" name="npwp_number">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email Sekolah</label>
                                    <input type="email" class="form-control" name="school_email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email Lainnya</label>
                                    <input type="email" class="form-control" name="other_email">
                                </div>
                            </div>
                        </div>
                        <!-- Data Karyawan Tab -->
                        <div class="tab-pane fade" id="employment" role="tabpanel" aria-labelledby="employment-tab">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Unit</label>
                                    <input type="text" class="form-control" name="unit">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Divisi</label>
                                    <input type="text" class="form-control" name="division">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status Karyawan</label>
                                    <input type="text" class="form-control" name="employment_status">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" name="position">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Agama</label>
                                    <input type="text" class="form-control" name="religion">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" name="last_education">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status Perkawinan</label>
                                    <input type="text" class="form-control" name="marital_status">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status Pegawai</label>
                                    <select class="form-control" name="employee_status">
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Masuk</label>
                                    <input type="date" class="form-control" name="entry_date">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Keluar</label>
                                    <input type="date" class="form-control" name="exit_date">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Simpan Karyawan</button>
                        <a href="{{ route('employee.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Include Bootstrap JS and CSS for Tabs -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
