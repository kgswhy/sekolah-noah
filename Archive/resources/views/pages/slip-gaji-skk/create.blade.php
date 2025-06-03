@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Ajukan Permintaan Slip Gaji / Surat Keterangan Kerja</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('slip-gaji-skk.index') }}">Permintaan Slip Gaji / SKK</a></li>
                <li class="breadcrumb-item active">Ajukan Permintaan</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('slip-gaji-skk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="employee_id" value="{{ $employee->id }}">
            
            <h5 class="mb-4">Data Pegawai</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" value="{{ $employee->full_name }}" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nomor Induk Karyawan</label>
                    <input type="text" class="form-control" value="{{ $employee->employee_number }}" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Unit</label>
                    <input type="text" class="form-control" value="{{ $employee->unit }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Divisi</label>
                    <input type="text" class="form-control" value="{{ $employee->division }}" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Status Karyawan</label>
                    <input type="text" class="form-control" value="{{ $employee->employee_status }}" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control" value="{{ $employee->position }}" readonly>
                </div>
            </div>

            <hr>
            <h5 class="mb-4">Data Permintaan</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Jenis Permintaan <span class="text-danger">*</span></label>
                    <select class="form-select" name="jenis_permintaan" required>
                        <option value="" selected disabled>Pilih Jenis Permintaan</option>
                        <option value="Slip Gaji" {{ old('jenis_permintaan') == 'Slip Gaji' ? 'selected' : '' }}>Slip Gaji</option>
                        <option value="Surat Keterangan Kerja" {{ old('jenis_permintaan') == 'Surat Keterangan Kerja' ? 'selected' : '' }}>Surat Keterangan Kerja</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Bulan/Tahun <span class="text-danger">*</span></label>
                    <input type="month" class="form-control" name="bulan_tahun" required value="{{ old('bulan_tahun') }}">
                    <div class="form-text text-muted">
                        Format: MM/YYYY (contoh: 01/2023 untuk Januari 2023)
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Keterangan / Tujuan <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="keterangan" rows="3" required>{{ old('keterangan') }}</textarea>
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label">Dokumen Pendukung</label>
                    <input type="file" class="form-control" name="dokumen_pendukung" accept=".pdf,.jpg,.jpeg,.png">
                    <div class="form-text text-muted">
                        File yang diterima: PDF, JPG, JPEG, PNG. Maksimal 2MB.
                    </div>
                </div>
            </div>

            <div class="d-flex">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="fas fa-paper-plane"></i> Kirim Permintaan
                </button>
                <a href="{{ route('slip-gaji-skk.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .btn-primary {
        background-color: #6f42c1;
        border-color: #6f42c1;
    }
    .btn-primary:hover, .btn-primary:focus {
        background-color: #5e35b1;
        border-color: #5e35b1;
    }
</style>
@endsection
