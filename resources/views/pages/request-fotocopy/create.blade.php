@extends('layouts.master-dashboard')

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Tambah Pengajuan Fotocopy</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item active">Tambah Pengajuan</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('request-fotocopy.store') }}" method="POST">
                @csrf
                <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="{{ $employee->full_name }}"
                            readonly required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Nomor Induk Karyawan</label>
                        <input type="text" name="nomor_induk_karyawan" class="form-control" value="{{ $employee->nik }}"
                            readonly required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Unit</label>
                        <input type="text" name="unit" class="form-control" value="{{ $employee->unit }}" readonly
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Divisi</label>
                        <input type="text" name="divisi" class="form-control" value="{{ $employee->division }}" readonly
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Status Karyawan</label>
                        <input type="text" name="status_karyawan" class="form-control"
                            value="{{ $employee->employee_status }}" readonly required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" value="{{ $employee->position }}" readonly
                            required>
                    </div>
                </div>

                @include('pages.request-fotocopy.form')
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('request-fotocopy.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
