@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Ajukan Cuti</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item">Manajemen Cuti</li>
                    <li class="breadcrumb-item active" aria-current="page">Ajukan Cuti</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Card for Cuti Submission Form -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('cuti.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Hidden input for employee_id -->
                    <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $employee->full_name }}" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">Nomor Induk Karyawan</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $employee->nik }}" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="unit" class="form-label">Unit</label>
                        <input type="text" class="form-control" id="unit" name="unit" value="{{ $employee->unit }}" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="divisi" class="form-label">Divisi</label>
                        <input type="text" class="form-control" id="divisi" name="divisi" value="{{ $employee->division }}" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="status_karyawan" class="form-label">Status Karyawan</label>
                        <input type="text" class="form-control" id="status_karyawan" name="status_karyawan" value="{{ $employee->employee_status }}" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $employee->position }}" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai Cuti</label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai Cuti</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
                    </div>

                    <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan Cuti</label>
                        <select class="form-select" id="alasan" name="alasan" required>
                            <option value="" disabled selected>Pilih Alasan</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Izin">Izin</option>
                            <option value="Cuti">Cuti</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan Tambahan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="dokumen" class="form-label">Upload Dokumen Pendukung</label>
                        <input type="file" class="form-control" id="dokumen" name="dokumen">
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">No Telepon yang Bisa Dihubungi</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Ajukan Cuti</button>
                        <a href="/cuti" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
