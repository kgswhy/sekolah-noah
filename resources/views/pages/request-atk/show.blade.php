@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Permintaan ATK</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <p class="form-control-static">{{ $requestAtk->nama_lengkap }}</p>
                            </div>
                            <div class="form-group">
                                <label>Nomor Induk Karyawan</label>
                                <p class="form-control-static">{{ $requestAtk->nomor_induk_karyawan }}</p>
                            </div>
                            <div class="form-group">
                                <label>Unit</label>
                                <p class="form-control-static">{{ $requestAtk->unit }}</p>
                            </div>
                            <div class="form-group">
                                <label>Divisi</label>
                                <p class="form-control-static">{{ $requestAtk->divisi }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status Karyawan</label>
                                <p class="form-control-static">{{ $requestAtk->status_karyawan }}</p>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <p class="form-control-static">{{ $requestAtk->jabatan }}</p>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <p class="form-control-static">
                                    @switch($requestAtk->status)
                                        @case('pending')
                                            <span class="badge badge-warning">Pending</span>
                                            @break
                                        @case('approved')
                                            <span class="badge badge-success">Approved</span>
                                            @break
                                        @case('rejected')
                                            <span class="badge badge-danger">Rejected</span>
                                            @break
                                    @endswitch
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Level Approval</label>
                                <p class="form-control-static">{{ $requestAtk->current_approval_level }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>Detail Barang</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(json_decode($requestAtk->nama_barang) as $index => $nama)
                                            <tr>
                                                <td>{{ $nama }}</td>
                                                <td>{{ json_decode($requestAtk->jumlah)[$index] }}</td>
                                                <td>{{ json_decode($requestAtk->satuan)[$index] }}</td>
                                                <td>{{ json_decode($requestAtk->keterangan)[$index] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    @if($requestAtk->status === 'rejected')
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="alert alert-danger">
                                    <h5>Alasan Penolakan</h5>
                                    <p>{{ $requestAtk->rejected_message }}</p>
                                    <small>Ditolak oleh: {{ $requestAtk->rejectedBy->name ?? 'Unknown' }} pada {{ $requestAtk->rejected_at }}</small>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($requestAtk->status === 'approved')
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="alert alert-success">
                                    <h5>Informasi Persetujuan</h5>
                                    <p>Disetujui oleh: {{ $requestAtk->approvedBy->name ?? 'Unknown' }} pada {{ $requestAtk->approved_at }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($requestAtk->approval_history)
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5>Riwayat Approval</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Level</th>
                                                <th>Status</th>
                                                <th>Oleh</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(json_decode($requestAtk->approval_history) as $history)
                                                <tr>
                                                    <td>{{ $history->level }}</td>
                                                    <td>
                                                        @if($history->action === 'approved')
                                                            <span class="badge badge-success">Approved</span>
                                                        @else
                                                            <span class="badge badge-danger">Rejected</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $history->user_name }}</td>
                                                    <td>{{ $history->timestamp }}</td>
                                                    <td>{{ $history->message ?? '-' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($requestAtk->status === 'pending')
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#approveModal">
                                        <i class="fas fa-check"></i> Setujui
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal">
                                        <i class="fas fa-times"></i> Tolak
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Approve Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveModalLabel">Konfirmasi Persetujuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('request-atk.approve', $requestAtk) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menyetujui permintaan ATK ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Setujui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Konfirmasi Penolakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('request-atk.reject', $requestAtk) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="rejected_message">Alasan Penolakan</label>
                        <textarea class="form-control" id="rejected_message" name="rejected_message" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 