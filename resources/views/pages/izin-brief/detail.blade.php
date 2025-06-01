@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Detail Izin Meninggalkan Pekerjaan</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item">HRD</li>
                <li class="breadcrumb-item"><a href="{{ route('brief.index') }}">Izin Brief</a></li>
                <li class="breadcrumb-item active">Detail</li>
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
                <h5 class="card-title">Informasi Pengajuan</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="mb-1 text-muted">Nama Lengkap</p>
                        <h5>{{ $brief->employee->full_name }}</h5>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1 text-muted">Nomor Induk</p>
                        <h5>{{ $brief->employee->employee_number }}</h5>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="mb-1 text-muted">Unit</p>
                        <h5>{{ $brief->employee->unit }}</h5>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1 text-muted">Divisi</p>
                        <h5>{{ $brief->employee->division }}</h5>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="mb-1 text-muted">Status</p>
                        <h5>{{ $brief->employee->employment_status }}</h5>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1 text-muted">Jabatan</p>
                        <h5>{{ $brief->employee->position }}</h5>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="mb-1 text-muted">Tanggal</p>
                        <h5>{{ date('d-m-Y', strtotime($brief->tanggal)) }}</h5>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1 text-muted">Waktu</p>
                        <h5>{{ $brief->waktu }}</h5>
                    </div>
                </div>
                <div class="mb-3">
                    <p class="mb-1 text-muted">Keterangan Keperluan</p>
                    <div class="p-3 bg-light rounded">
                        <p>{{ $brief->keperluan }}</p>
                    </div>
                </div>
                
                @if($brief->dokumen)
                <div class="mb-3">
                    <p class="mb-1 text-muted">Dokumen Pendukung</p>
                    <div class="d-flex">
                        <a href="{{ route('brief.preview', $brief->id) }}" target="_blank" class="btn btn-sm btn-primary me-2">
                            <i class="las la-eye"></i> Lihat Dokumen
                        </a>
                        <a href="{{ route('brief.dokumen', $brief->id) }}" class="btn btn-sm btn-secondary">
                            <i class="las la-download"></i> Download
                        </a>
                    </div>
                </div>
                @endif
                
                @if($brief->status == 'rejected')
                <div class="alert alert-danger">
                    <h6 class="alert-heading"><i class="las la-times-circle"></i> Alasan Penolakan:</h6>
                    <p class="mb-0">{{ $brief->rejected_message }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title mb-0">Status Pengajuan</h5>
                @if($brief->status == 'pending')
                    <span class="badge bg-warning ms-auto">Menunggu</span>
                @elseif($brief->status == 'approved')
                    <span class="badge bg-success ms-auto">Disetujui</span>
                @elseif($brief->status == 'rejected')
                    <span class="badge bg-danger ms-auto">Ditolak</span>
                @endif
            </div>
            <div class="card-body">
                @if($brief->status == 'pending')
                    <div class="alert alert-warning mb-0">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="las la-clock fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="alert-heading">Menunggu Persetujuan</h5>
                                <p class="mb-0">Pengajuan sedang menunggu persetujuan dari approver.</p>
                            </div>
                        </div>
                    </div>
                @elseif($brief->status == 'approved')
                    <div class="alert alert-success mb-0">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="las la-check-circle fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="alert-heading">Disetujui</h5>
                                <p class="mb-0">Pengajuan izin telah disetujui.</p>
                            </div>
                        </div>
                    </div>
                @elseif($brief->status == 'rejected')
                    <div class="alert alert-danger mb-0">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="las la-times-circle fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="alert-heading">Ditolak</h5>
                                <p class="mb-0">Pengajuan izin telah ditolak.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Aksi</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('brief.index') }}" class="btn btn-secondary">
                        <i class="las la-arrow-left"></i> Kembali
                    </a>
                    
                    @if($brief->status == 'pending')
                        @if(Auth::id() == $brief->employee->user_id)
                            <a href="{{ route('brief.edit', $brief->id) }}" class="btn btn-warning">
                                <i class="las la-edit"></i> Edit
                            </a>
                            <form action="{{ route('brief.destroy', $brief->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">
                                    <i class="las la-trash"></i> Hapus
                                </button>
                            </form>
                        @endif
                        
                        @if(Auth::user()->isApproverFor('brief-absen'))
                            <hr>
                            <div class="alert alert-light mb-3">
                                <h6><i class="las la-info-circle"></i> Approver Action</h6>
                                <p class="mb-0 small">Sebagai approver, Anda dapat menyetujui atau menolak pengajuan ini.</p>
                            </div>
                            <a href="{{ route('brief.approve', $brief->id) }}" class="btn btn-success" onclick="return confirm('Setujui izin brief ini?');">
                                <i class="las la-check"></i> Setujui
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                <i class="las la-times"></i> Tolak
                            </button>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
@if($brief->status == 'pending' && Auth::user()->isApproverFor('brief-absen'))
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('brief.reject', $brief->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Tolak Pengajuan Izin Brief</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="rejected_message" class="form-label">Alasan Penolakan</label>
                        <textarea class="form-control" id="rejected_message" name="rejected_message" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tolak Izin</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection 