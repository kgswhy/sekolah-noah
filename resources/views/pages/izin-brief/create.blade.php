@extends('layouts/master-dashboard')

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Form Izin Meninggalkan Pekerjaan</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item">HRD</li>
                    <li class="breadcrumb-item"><a href="/brief-absen">Izin Brief</a></li>
                    <li class="breadcrumb-item active">Ajukan Izin</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('brief.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $employee->full_name }}" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nomor Induk Karyawan</label>
                        <input type="text" class="form-control" value="{{ $employee->employee_number }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Unit</label>
                        <input type="text" class="form-control" value="{{ $employee->unit }}" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Divisi</label>
                        <input type="text" class="form-control" value="{{ $employee->division }}" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Status Karyawan</label>
                        <input type="text" class="form-control" value="{{ $employee->employment_status }}" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control" value="{{ $employee->position }}" readonly>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Waktu</label>
                        <input type="text" class="form-control" name="waktu" placeholder="Contoh: 10:00 - 12:00" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan Keperluan</label>
                    <textarea class="form-control" rows="3" name="keperluan" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Unggah Dokumen Pendukung</label>
                    <input type="file" class="form-control" name="dokumen">
                    <small class="text-muted">Format yang diperbolehkan: PDF, JPG, PNG (max: 2MB)</small>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Kirim Izin</button>
                    <a href="{{ route('brief.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
