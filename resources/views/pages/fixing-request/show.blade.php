@extends('layouts/master-dashboard')

@section('header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Detail Permintaan Perbaikan</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('fixing-request.index') }}"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">IT</li>
                        <li class="breadcrumb-item" aria-current="page">Permintaan Perbaikan</li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-bold">Tanggal Pengajuan</label>
                                <p>{{ $fixingRequest->created_at->format('d-m-Y H:i') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-bold">Status</label>
                                <p>
                                    @if($fixingRequest->status == 'pending')
                                        <span class="badge bg-warning">Menunggu</span>
                                    @elseif($fixingRequest->status == 'approved')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-bold">Kategori Perangkat</label>
                                <p>{{ $fixingRequest->device_category }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-bold">Nama User</label>
                                <p>{{ $fixingRequest->user->employee->full_name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-bold">Unit</label>
                                <p>{{ $fixingRequest->unit }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="fw-bold">Divisi</label>
                                <p>{{ $fixingRequest->division }}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="fw-bold">Rincian Kerusakan</label>
                                <p>{{ $fixingRequest->damage_details }}</p>
                            </div>
                        </div>
                        @if($fixingRequest->supporting_document)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold">Dokumen Pendukung</label>
                                    <p>
                                        <a href="{{ asset('storage/' . $fixingRequest->supporting_document) }}" target="_blank" class="btn btn-info btn-sm">
                                            <i class="mdi mdi-download"></i> Download Dokumen
                                        </a>
                                    </p>
                                </div>
                            </div>
                        @endif
                        @if($fixingRequest->status == 'rejected' && $fixingRequest->rejected_message)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="fw-bold">Alasan Penolakan</label>
                                    <p class="text-danger">{{ $fixingRequest->rejected_message }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('fixing-request.index') }}" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left"></i> Kembali
                        </a>
                        @if($fixingRequest->status == 'pending' && Auth::user()->hasRole('admin'))
                            <form action="{{ route('fixing-request.approve', $fixingRequest->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin menyetujui request ini?')">
                                    <i class="mdi mdi-check"></i> Setujui
                                </button>
                            </form>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                                <i class="mdi mdi-close"></i> Tolak
                            </button>
                        @endif
                        @if($fixingRequest->status == 'pending' || Auth::user()->hasRole('admin'))
                            <form action="{{ route('fixing-request.destroy', $fixingRequest->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus request ini?')">
                                    <i class="mdi mdi-delete"></i> Hapus
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reject Modal -->
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('fixing-request.reject', $fixingRequest->id) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="rejectModalLabel">Tolak Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rejection_message">Alasan Penolakan</label>
                            <textarea class="form-control" id="rejection_message" name="rejection_message" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Tolak Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection 