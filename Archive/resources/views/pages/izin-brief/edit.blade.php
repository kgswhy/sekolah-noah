@extends('layouts/master-dashboard')

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Edit Izin Meninggalkan Pekerjaan</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item">HRD</li>
                    <li class="breadcrumb-item"><a href="{{ route('brief.index') }}">Izin Brief</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Form Edit Izin Brief</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('brief.update', $brief->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title text-muted">Informasi Karyawan</h6>
                                        <div class="mb-3">
                                            <label class="form-label small text-muted">Nama Lengkap</label>
                                            <input type="text" class="form-control bg-white" value="{{ $employee->full_name }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label small text-muted">Nomor Induk Karyawan</label>
                                            <input type="text" class="form-control bg-white" value="{{ $employee->employee_number }}" readonly>
                                        </div>
                                        <div class="mb-0">
                                            <label class="form-label small text-muted">Jabatan</label>
                                            <input type="text" class="form-control bg-white" value="{{ $employee->position }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="card-title text-muted">Informasi Unit Kerja</h6>
                                        <div class="mb-3">
                                            <label class="form-label small text-muted">Unit</label>
                                            <input type="text" class="form-control bg-white" value="{{ $employee->unit }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label small text-muted">Divisi</label>
                                            <input type="text" class="form-control bg-white" value="{{ $employee->division }}" readonly>
                                        </div>
                                        <div class="mb-0">
                                            <label class="form-label small text-muted">Status Karyawan</label>
                                            <input type="text" class="form-control bg-white" value="{{ $employee->employment_status }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="mb-3">Detail Izin</h5>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="tanggal" value="{{ date('Y-m-d', strtotime($brief->tanggal)) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Waktu <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="waktu" placeholder="Contoh: 10:00 - 12:00" value="{{ $brief->waktu }}" required>
                                <small class="text-muted">Format: HH:MM - HH:MM</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keterangan Keperluan <span class="text-danger">*</span></label>
                            <textarea class="form-control" rows="4" name="keperluan" required>{{ $brief->keperluan }}</textarea>
                            <small class="text-muted">Jelaskan alasan dan keperluan izin meninggalkan pekerjaan secara detail</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Dokumen Pendukung</label>
                            @if($brief->dokumen)
                                <div class="card mb-2 bg-light">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="las la-file-alt fs-2 text-primary"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-1">Dokumen saat ini</h6>
                                                <div class="d-flex mt-2">
                                                    <a href="{{ route('brief.preview', $brief->id) }}" target="_blank" class="btn btn-sm btn-primary me-2">
                                                        <i class="las la-eye"></i> Lihat
                                                    </a>
                                                    <a href="{{ route('brief.dokumen', $brief->id) }}" class="btn btn-sm btn-secondary">
                                                        <i class="las la-download"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <input type="file" class="form-control" name="dokumen">
                            <small class="text-muted">Format yang diperbolehkan: PDF, JPG, PNG (max: 2MB). Kosongkan jika tidak ingin mengubah dokumen.</small>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('brief.index') }}" class="btn btn-secondary">
                                <i class="las la-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="las la-save"></i> Perbarui Izin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">Informasi</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info mb-4">
                        <h6 class="alert-heading"><i class="las la-info-circle"></i> Perhatian!</h6>
                        <p class="mb-0">Pengajuan yang sudah diperbarui akan kembali ke status <strong>Menunggu</strong> dan perlu disetujui ulang oleh approver.</p>
                    </div>
                    
                    <h6><i class="las la-check-circle text-success"></i> Ketentuan Izin Brief</h6>
                    <ul class="small mb-0">
                        <li>Izin brief digunakan untuk keperluan meninggalkan pekerjaan dalam waktu singkat</li>
                        <li>Pastikan mencantumkan waktu dengan jelas (jam mulai dan selesai)</li>
                        <li>Dokumen pendukung akan mempercepat proses persetujuan</li>
                        <li>Periksa kembali semua informasi sebelum mengirimkan perubahan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection 