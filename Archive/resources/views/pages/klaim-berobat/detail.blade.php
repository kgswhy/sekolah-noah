@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Detail Pengajuan Klaim Berobat</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/klaim-berobat">Klaim Berobat</a></li>
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
                <td>{{ $klaim->employee->full_name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Nomor Induk Karyawan</th>
                <td>{{ $klaim->employee->employee_number ?? '-' }}</td>
            </tr>
            <tr>
                <th>Unit</th>
                <td>{{ $klaim->employee->unit ?? '-' }}</td>
            </tr>
            <tr>
                <th>Divisi</th>
                <td>{{ $klaim->employee->division ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>{{ $klaim->employee->position ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal Berobat</th>
                <td>{{ date('d-m-Y', strtotime($klaim->tanggal_berobat)) }}</td>
            </tr>
            <tr>
                <th>Nama Pasien</th>
                <td>{{ $klaim->nama_pasien }}</td>
            </tr>
            <tr>
                <th>Hubungan dengan Karyawan</th>
                <td>{{ $klaim->hubungan }}</td>
            </tr>
            <tr>
                <th>Diagnosa</th>
                <td>{{ $klaim->diagnosa }}</td>
            </tr>
            <tr>
                <th>Nama Dokter</th>
                <td>{{ $klaim->nama_dokter }}</td>
            </tr>
            <tr>
                <th>Nama Rumah Sakit/Klinik</th>
                <td>{{ $klaim->nama_rs }}</td>
            </tr>
            <tr>
                <th>Biaya</th>
                <td>Rp {{ number_format($klaim->biaya, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if ($klaim->status === 'pending')
                        <span class="badge bg-warning rounded-pill px-3 py-2">Menunggu Persetujuan</span>
                    @elseif ($klaim->status === 'approved')
                        <span class="badge bg-success rounded-pill px-3 py-2">Disetujui</span>
                    @else
                        <div>
                            <span class="badge bg-danger rounded-pill px-3 py-2">Ditolak</span>
                            @if($klaim->rejected_message)
                                <p class="text-danger mt-2 mb-0">Alasan: {{ $klaim->rejected_message }}</p>
                            @endif
                        </div>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Bukti Pembayaran</th>
                <td>
                    @if($klaim->bukti_pembayaran)
                        <a href="{{ route('klaim.preview', $klaim->id) }}" target="_blank" class="btn btn-sm btn-info rounded-pill px-3">
                            <i class="fas fa-eye"></i> Preview Dokumen
                        </a>
                        <a href="{{ route('klaim.dokumen', $klaim->id) }}" class="btn btn-sm btn-primary rounded-pill px-3">
                            <i class="fas fa-download"></i> Download
                        </a>
                    @else
                        <span class="text-muted">Tidak ada dokumen</span>
                    @endif
                </td>
            </tr>
        </table>
        
        <div class="mt-4">
            <a href="{{ route('klaim.index') }}" class="btn btn-secondary">Kembali</a>
            
            @if($klaim->status === 'pending' && Auth::id() == $klaim->employee->user_id)
                <a href="{{ route('klaim.edit', $klaim->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit
                </a>
                
                <form action="{{ route('klaim.destroy', $klaim->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            @endif
            
            @if($klaim->status === 'pending' && Auth::user()->isApproverFor('klaim-berobat'))
                <a href="{{ route('klaim.approve', $klaim->id) }}" class="btn btn-success" onclick="return confirm('Setujui klaim berobat ini?');">
                    <i class="fas fa-check"></i> Approve
                </a>
                
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                    <i class="fas fa-times"></i> Reject
                </button>
                
                <!-- Reject Modal -->
                <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('klaim.reject', $klaim->id) }}" method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="rejectModalLabel">Tolak Pengajuan Klaim Berobat</h5>
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
                                    <button type="submit" class="btn btn-danger">Tolak Klaim</button>
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