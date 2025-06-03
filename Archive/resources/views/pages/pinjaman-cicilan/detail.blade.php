@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Detail Pengajuan Pinjaman</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('pinjaman.index') }}">Pinjaman & Cicilan</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="{{ route('pinjaman.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Informasi Pinjaman</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 30%">Status</th>
                        <td>
                            @if($pinjaman->status == 'pending')
                                <span class="badge bg-warning rounded-pill px-3 py-2">Menunggu</span>
                            @elseif($pinjaman->status == 'approved')
                                <span class="badge bg-success rounded-pill px-3 py-2">Disetujui</span>
                            @elseif($pinjaman->status == 'rejected')
                                <span class="badge bg-danger rounded-pill px-3 py-2">Ditolak</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Karyawan</th>
                        <td>{{ $pinjaman->employee->full_name }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Induk</th>
                        <td>{{ $pinjaman->employee->employee_number }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pinjaman</th>
                        <td>Rp {{ number_format($pinjaman->jumlah_pinjaman, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Tujuan Pinjaman</th>
                        <td>{{ $pinjaman->tujuan_pinjaman }}</td>
                    </tr>
                    <tr>
                        <th>Jangka Waktu</th>
                        <td>{{ $pinjaman->jangka_waktu }} bulan</td>
                    </tr>
                    <tr>
                        <th>Cicilan per Bulan</th>
                        <td>Rp {{ number_format($pinjaman->cicilan_per_bulan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pengajuan</th>
                        <td>{{ date('d F Y', strtotime($pinjaman->tanggal_pengajuan)) }}</td>
                    </tr>
                    <tr>
                        <th>Dokumen Pendukung</th>
                        <td>
                            @if($pinjaman->dokumen_pendukung)
                                <a href="{{ route('pinjaman.preview', $pinjaman->id) }}" target="_blank" class="btn btn-sm btn-light">
                                    <i class="fas fa-file-alt"></i> Lihat Dokumen
                                </a>
                            @else
                                <span class="text-muted">Tidak ada dokumen</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Dibuat</th>
                        <td>{{ date('d F Y H:i', strtotime($pinjaman->created_at)) }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diperbarui</th>
                        <td>{{ date('d F Y H:i', strtotime($pinjaman->updated_at)) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Status Approval</h5>
            </div>
            <div class="card-body">
                @if($pinjaman->status == 'approved')
                    <div class="alert alert-success">
                        <h5 class="alert-heading">Disetujui</h5>
                        <p>Pengajuan pinjaman ini telah disetujui oleh:</p>
                        <hr>
                        <p class="mb-0"><strong>{{ $pinjaman->approver->name }}</strong></p>
                        <p class="mb-0">{{ date('d F Y H:i', strtotime($pinjaman->updated_at)) }}</p>
                    </div>
                @elseif($pinjaman->status == 'rejected')
                    <div class="alert alert-danger">
                        <h5 class="alert-heading">Ditolak</h5>
                        <p>Pengajuan pinjaman ini ditolak dengan alasan:</p>
                        <hr>
                        <p class="mb-0">{{ $pinjaman->rejected_message }}</p>
                        <p class="mt-2 mb-0">{{ date('d F Y H:i', strtotime($pinjaman->rejected_at)) }}</p>
                    </div>
                @elseif($pinjaman->status == 'pending')
                    <div class="alert alert-warning">
                        <h5 class="alert-heading">Menunggu Persetujuan</h5>
                        <p class="mb-0">Pengajuan pinjaman ini masih menunggu persetujuan.</p>
                    </div>
                    
                    @if(Auth::user()->isApproverFor('pinjaman-cicilan'))
                        <div class="mt-3">
                            <h6>Tindakan:</h6>
                            <div class="d-grid gap-2">
                                <a href="{{ route('pinjaman.approve', $pinjaman->id) }}" class="btn btn-success" onclick="return confirm('Setujui pengajuan pinjaman ini?');">
                                    <i class="fas fa-check"></i> Setujui Pengajuan
                                </a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                    <i class="fas fa-times"></i> Tolak Pengajuan
                                </button>
                            </div>
                        </div>
                        
                        <!-- Reject Modal -->
                        <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('pinjaman.reject', $pinjaman->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rejectModalLabel">Tolak Pengajuan Pinjaman</h5>
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
                                            <button type="submit" class="btn btn-danger">Tolak Pinjaman</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
                
                @if(Auth::id() == $pinjaman->employee->user_id && $pinjaman->status == 'pending')
                    <div class="mt-3">
                        <h6>Tindakan:</h6>
                        <div class="d-flex gap-2">
                            <a href="{{ route('pinjaman.edit', $pinjaman->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('pinjaman.destroy', $pinjaman->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .badge {
        font-weight: 500;
        letter-spacing: 0.3px;
    }
    .card-title {
        font-weight: 600;
    }
    th {
        background-color: rgba(0, 0, 0, 0.02);
    }
</style>
@endsection 