@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Ajukan Lembur / Honor Kegiatan</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('lembur-honor.index') }}">Lembur dan Honor</a></li>
                <li class="breadcrumb-item active">Form Pengajuan</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('lembur-honor.store') }}" method="POST" enctype="multipart/form-data">
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
            <h5>Data Lembur/Honor</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="jenis">Jenis Pengajuan</label>
                    <select class="form-select @error('jenis') is-invalid @enderror" id="jenis" name="jenis" required>
                        <option value="lembur" {{ old('jenis') == 'lembur' ? 'selected' : '' }}>Lembur</option>
                        <option value="honor" {{ old('jenis') == 'honor' ? 'selected' : '' }}>Honor Kegiatan</option>
                    </select>
                    @error('jenis')
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
                <div class="col-md-6 mb-3">
                    <label for="durasi">Durasi (jam) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('durasi') is-invalid @enderror" id="durasi" name="durasi" value="{{ old('durasi') }}" min="1" required>
                    @error('durasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3" style="display: none;">
                    <label for="waktu_mulai">Waktu Mulai</label>
                    <input type="time" class="form-control @error('waktu_mulai') is-invalid @enderror" id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai') }}">
                    @error('waktu_mulai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3" style="display: none;">
                    <label for="waktu_selesai">Waktu Selesai</label>
                    <input type="time" class="form-control @error('waktu_selesai') is-invalid @enderror" id="waktu_selesai" name="waktu_selesai" value="{{ old('waktu_selesai') }}">
                    @error('waktu_selesai')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kegiatan">Kegiatan</label>
                    <input type="text" class="form-control @error('kegiatan') is-invalid @enderror" id="kegiatan" name="kegiatan" value="{{ old('kegiatan') }}" required>
                    @error('kegiatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" required>
                    @error('lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="keterangan">Keterangan</label>
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
                <a href="{{ route('lembur-honor.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
