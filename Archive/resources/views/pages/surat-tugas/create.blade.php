@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Ajukan Surat Tugas</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('surat-tugas.index') }}">Surat Tugas</a></li>
                <li class="breadcrumb-item active">Form Pengajuan</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('surat-tugas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <h5>Data Pegawai</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" value="{{ $employee->full_name }}" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Nomor Induk Karyawan</label>
                    <input type="text" class="form-control" value="{{ $employee->nik }}" readonly>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Unit</label>
                    <input type="text" class="form-control" value="{{ $employee->unit }}" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Divisi</label>
                    <input type="text" class="form-control" value="{{ $employee->division }}" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Status Karyawan</label>
                    <input type="text" class="form-control" value="{{ $employee->employee_status }}" readonly>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" value="{{ $employee->position }}" readonly>
                </div>
            </div>

            <hr>
            <h5>Data Surat Tugas</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="judul_tugas">Judul Tugas</label>
                    <input type="text" class="form-control @error('judul_tugas') is-invalid @enderror" id="judul_tugas" name="judul_tugas" value="{{ old('judul_tugas') }}" required>
                    @error('judul_tugas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lokasi_tugas">Lokasi Tugas</label>
                    <input type="text" class="form-control @error('lokasi_tugas') is-invalid @enderror" id="lokasi_tugas" name="lokasi_tugas" value="{{ old('lokasi_tugas') }}" required>
                    @error('lokasi_tugas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                    @error('tanggal_mulai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
                    <small class="text-muted">Isi jika berbeda dengan tanggal mulai</small>
                    @error('tanggal_selesai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="deskripsi_tugas">Deskripsi Tugas</label>
                    <textarea class="form-control @error('deskripsi_tugas') is-invalid @enderror" id="deskripsi_tugas" name="deskripsi_tugas" rows="3" required>{{ old('deskripsi_tugas') }}</textarea>
                    @error('deskripsi_tugas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="tujuan_tugas">Tujuan Tugas</label>
                    <textarea class="form-control @error('tujuan_tugas') is-invalid @enderror" id="tujuan_tugas" name="tujuan_tugas" rows="3" required>{{ old('tujuan_tugas') }}</textarea>
                    @error('tujuan_tugas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="keterangan">Keterangan Tambahan</label>
                    <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <hr>
            <h5>Dokumen Pendukung</h5>
            <div class="mb-3">
                <label for="dokumen_pendukung">Upload Dokumen</label>
                <input type="file" class="form-control @error('dokumen_pendukung') is-invalid @enderror" id="dokumen_pendukung" name="dokumen_pendukung">
                <small class="text-muted">Format file: PDF, JPG, JPEG, PNG. Ukuran maksimal: 2MB</small>
                @error('dokumen_pendukung')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Ajukan</button>
                <a href="{{ route('surat-tugas.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
