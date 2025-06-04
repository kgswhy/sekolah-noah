@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Edit Surat Tugas</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('surat-tugas.index') }}">Surat Tugas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Surat Tugas</li>
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
                <form action="{{ route('surat-tugas.update', $suratTugas->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h5>Data Pegawai</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ $suratTugas->employee->full_name ?? '-' }}" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Nomor Induk Karyawan</label>
                            <input type="text" class="form-control" value="{{ $suratTugas->employee->nik ?? '-' }}" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Unit</label>
                            <input type="text" class="form-control" value="{{ $suratTugas->employee->unit ?? '-' }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Divisi</label>
                            <input type="text" class="form-control" value="{{ $suratTugas->employee->division ?? '-' }}" readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Status Karyawan</label>
                            <input type="text" class="form-control" value="{{ $suratTugas->employee->employee_status ?? '-' }}" readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Jabatan</label>
                            <input type="text" class="form-control" value="{{ $suratTugas->employee->position ?? '-' }}" readonly>
                        </div>
                    </div>

                    <hr>
                    <h5>Data Surat Tugas</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="judul_tugas">Judul Tugas</label>
                            <input type="text" class="form-control @error('judul_tugas') is-invalid @enderror" id="judul_tugas" name="judul_tugas" value="{{ old('judul_tugas', $suratTugas->judul_tugas) }}" required>
                            @error('judul_tugas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lokasi_tugas">Lokasi Tugas</label>
                            <input type="text" class="form-control @error('lokasi_tugas') is-invalid @enderror" id="lokasi_tugas" name="lokasi_tugas" value="{{ old('lokasi_tugas', $suratTugas->lokasi_tugas) }}" required>
                            @error('lokasi_tugas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                            <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $suratTugas->tanggal_mulai->format('Y-m-d')) }}" required>
                            @error('tanggal_mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', $suratTugas->tanggal_selesai ? $suratTugas->tanggal_selesai->format('Y-m-d') : '') }}">
                            <small class="text-muted">Isi jika berbeda dengan tanggal mulai</small>
                            @error('tanggal_selesai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="deskripsi_tugas">Deskripsi Tugas</label>
                            <textarea class="form-control @error('deskripsi_tugas') is-invalid @enderror" id="deskripsi_tugas" name="deskripsi_tugas" rows="3" required>{{ old('deskripsi_tugas', $suratTugas->deskripsi_tugas) }}</textarea>
                            @error('deskripsi_tugas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="tujuan_tugas">Tujuan Tugas</label>
                            <textarea class="form-control @error('tujuan_tugas') is-invalid @enderror" id="tujuan_tugas" name="tujuan_tugas" rows="3" required>{{ old('tujuan_tugas', $suratTugas->tujuan_tugas) }}</textarea>
                            @error('tujuan_tugas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="keterangan">Keterangan Tambahan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $suratTugas->keterangan) }}</textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr>
                    <h5>Dokumen Pendukung</h5>
                    <div class="mb-3">
                        <label for="dokumen_pendukung">Upload Dokumen</label>
                        @if($suratTugas->dokumen_pendukung)
                            <div class="mb-2">
                                <p class="mb-1">Dokumen saat ini:</p>
                                <a href="{{ route('surat-tugas.preview', $suratTugas->id) }}" target="_blank" class="btn btn-sm btn-info">
                                    <i class="las la-eye"></i> Preview Dokumen
                                </a>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('dokumen_pendukung') is-invalid @enderror" id="dokumen_pendukung" name="dokumen_pendukung">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah dokumen</small>
                        @error('dokumen_pendukung')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ route('surat-tugas.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 