@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Detail Permintaan Slip Gaji / SKK</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('slip-gaji-skk.index') }}">Permintaan Slip Gaji / SKK</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="30%">Nama Karyawan</th>
                <td>{{ $request->employee->full_name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Nomor Induk Karyawan</th>
                <td>{{ $request->employee->employee_number ?? '-' }}</td>
            </tr>
            <tr>
                <th>Unit</th>
                <td>{{ $request->employee->unit ?? '-' }}</td>
            </tr>
            <tr>
                <th>Divisi</th>
                <td>{{ $request->employee->division ?? '-' }}</td>
            </tr>
            <tr>
                <th>Status Karyawan</th>
                <td>{{ $request->employee->employee_status ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>{{ $request->employee->position ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jenis Permintaan</th>
                <td>{{ $request->jenis_permintaan }}</td>
            </tr>
            <tr>
                <th>Bulan/Tahun</th>
                <td>{{ $request->bulan_tahun }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $request->keterangan }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if ($request->status === 'pending')
                        <span class="badge bg-warning rounded-pill px-3 py-2">Menunggu Persetujuan</span>
                    @elseif ($request->status === 'approved')
                        <span class="badge bg-success rounded-pill px-3 py-2">Disetujui</span>
                    @else
                        <div>
                            <span class="badge bg-danger rounded-pill px-3 py-2">Ditolak</span>
                            @if($request->rejected_message)
                                <p class="text-danger mt-2 mb-0">Alasan: {{ $request->rejected_message }}</p>
                            @endif
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Dokumen Pendukung</th>
                <td>
                    @if($request->dokumen_pendukung)
                        <a href="{{ route('slip-gaji-skk.preview', $request->id) }}" target="_blank" class="btn btn-sm btn-info rounded-pill px-3">
                            <i class="fas fa-eye"></i> Preview Dokumen
                        </a>
                        <a href="{{ route('slip-gaji-skk.dokumen', $request->id) }}" class="btn btn-sm btn-primary rounded-pill px-3">
                            <i class="fas fa-download"></i> Download
                        </a>
                    @else
                        <span class="text-muted">Tidak ada dokumen</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Tanggal Pengajuan</th>
                <td>{{ date('d-m-Y H:i', strtotime($request->created_at)) }}</td>
            </tr>
            @if($request->updated_at != $request->created_at)
            <tr>
                <th>Terakhir Diperbarui</th>
                <td>{{ date('d-m-Y H:i', strtotime($request->updated_at)) }}</td>
            </tr>
            @endif
        </table>
        
        <div class="mt-4">
            <a href="{{ route('slip-gaji-skk.index') }}" class="btn btn-secondary">Kembali</a>
            
            @if($request->status === 'pending' && Auth::id() == $request->employee->user_id)
                <a href="{{ route('slip-gaji-skk.edit', $request->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                
                <form action="{{ route('slip-gaji-skk.destroy', $request->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            @endif
            
            @if($request->status === 'pending' && Auth::user()->isApproverFor('slip-gaji'))
                <a href="{{ route('slip-gaji-skk.approve', $request->id) }}" class="btn btn-success" onclick="return confirm('Setujui permintaan ini?');">
                    <i class="fas fa-check"></i> Approve
                </a>
                
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                    <i class="fas fa-times"></i> Reject
                </button>
                
                <!-- Reject Modal -->
                <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('slip-gaji-skk.reject', $request->id) }}" method="POST">
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
                                    <button type="submit" class="btn btn-danger">Tolak Permintaan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .badge {
        font-weight: 500;
        letter-spacing: 0.3px;
    }
    .table th {
        background-color: #f8f9fa;
        width: 30%;
    }
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