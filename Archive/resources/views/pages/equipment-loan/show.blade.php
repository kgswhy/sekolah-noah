@extends('layouts.master-dashboard')

@section('title', 'Detail Peminjaman Peralatan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('equipment-loan.index') }}">Peminjaman Peralatan</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
                <h4 class="page-title">Detail Peminjaman Peralatan</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Peralatan</label>
                                <p class="form-control-static">{{ $equipmentLoan->equipment_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Unit</label>
                                <p class="form-control-static">{{ $equipmentLoan->unit }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Divisi</label>
                                <p class="form-control-static">{{ $equipmentLoan->division }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pinjam</label>
                                <p class="form-control-static">{{ $equipmentLoan->loan_date->format('d/m/Y') }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Kembali</label>
                                <p class="form-control-static">{{ $equipmentLoan->return_date->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tujuan Peminjaman</label>
                                <p class="form-control-static">{{ $equipmentLoan->purpose }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <p class="form-control-static">
                                    @if($equipmentLoan->status === 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($equipmentLoan->status === 'approved')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </p>
                            </div>
                            @if($equipmentLoan->status === 'approved')
                                <div class="mb-3">
                                    <label class="form-label">Disetujui Oleh</label>
                                    <p class="form-control-static">{{ $equipmentLoan->approver->name }}</p>
                                </div>
                            @endif
                            @if($equipmentLoan->status === 'rejected')
                                <div class="mb-3">
                                    <label class="form-label">Ditolak Oleh</label>
                                    <p class="form-control-static">{{ $equipmentLoan->rejecter->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alasan Penolakan</label>
                                    <p class="form-control-static">{{ $equipmentLoan->rejected_message }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Penolakan</label>
                                    <p class="form-control-static">{{ $equipmentLoan->rejected_at->format('d/m/Y H:i') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <a href="{{ route('equipment-loan.index') }}" class="btn btn-secondary">Kembali</a>
                            @if($equipmentLoan->status === 'pending' && Auth::user()->hasRole('admin'))
                                <form action="{{ route('equipment-loan.approve', $equipmentLoan) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin menyetujui permintaan ini?')">
                                        Setujui
                                    </button>
                                </form>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                    Tolak
                                </button>
                            @endif
                            @if(($equipmentLoan->status === 'pending' && Auth::id() === $equipmentLoan->user_id) || Auth::user()->hasRole('admin'))
                                <form action="{{ route('equipment-loan.destroy', $equipmentLoan) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus permintaan ini?')">
                                        Hapus
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('equipment-loan.reject', $equipmentLoan) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Tolak Permintaan</h5>
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
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 