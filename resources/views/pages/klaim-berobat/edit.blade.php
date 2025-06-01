@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Edit Pengajuan Klaim Berobat</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('klaim.index') }}">Klaim Berobat</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Pengajuan</li>
                </ol>
            </nav>
        </div>
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

        <form action="{{ route('klaim.update', $klaim->id) }}" method="POST" enctype="multipart/form-data">
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
            <h5 class="mb-4">Data Klaim Berobat</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Berobat <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="tanggal_berobat" required value="{{ date('Y-m-d', strtotime($klaim->tanggal_berobat)) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Pasien <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_pasien" required value="{{ $klaim->nama_pasien }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Hubungan dengan Karyawan <span class="text-danger">*</span></label>
                    <select class="form-select" name="hubungan" required>
                        <option value="" disabled>Pilih Hubungan</option>
                        <option value="Diri Sendiri" {{ $klaim->hubungan == 'Diri Sendiri' ? 'selected' : '' }}>Diri Sendiri</option>
                        <option value="Suami/Istri" {{ $klaim->hubungan == 'Suami/Istri' ? 'selected' : '' }}>Suami/Istri</option>
                        <option value="Anak" {{ $klaim->hubungan == 'Anak' ? 'selected' : '' }}>Anak</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Biaya Berobat (Rp) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="biaya" required value="{{ $klaim->biaya }}" min="1">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Dokter <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_dokter" required value="{{ $klaim->nama_dokter }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Rumah Sakit/Klinik <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama_rs" required value="{{ $klaim->nama_rs }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label class="form-label">Diagnosa <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="diagnosa" rows="3" required>{{ $klaim->diagnosa }}</textarea>
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label">Bukti Pembayaran</label>
                    @if($klaim->bukti_pembayaran)
                        <div class="mb-2">
                            <p class="mb-1">Bukti pembayaran saat ini:</p>
                            <a href="{{ route('klaim.preview', $klaim->id) }}" target="_blank" class="btn btn-sm btn-info rounded-pill px-3">
                                <i class="fas fa-eye"></i> Preview Dokumen
                            </a>
                            <a href="{{ route('klaim.dokumen', $klaim->id) }}" class="btn btn-sm btn-primary rounded-pill px-3">
                                <i class="fas fa-download"></i> Download
                            </a>
                        </div>
                    @endif
                    <input type="file" class="form-control" name="bukti_pembayaran" accept=".pdf,.jpg,.jpeg,.png">
                    <div class="form-text text-muted">
                        Biarkan kosong jika tidak ingin mengubah bukti pembayaran. File yang diterima: PDF, JPG, JPEG, PNG. Maksimal 2MB.
                    </div>
                </div>
            </div>

            <div class="d-flex">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="fas fa-save"></i> Perbarui Klaim
                </button>
                <a href="{{ route('klaim.index') }}" class="btn btn-secondary">
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