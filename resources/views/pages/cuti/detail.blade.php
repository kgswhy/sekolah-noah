@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Detail Pengajuan Cuti</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/cuti">Cuti</a></li>
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
                <th>Nama Lengkap</th>
                <td>{{ $cuti->employee->full_name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Nomor Induk Karyawan</th>
                <td>{{ $cuti->employee->nik ?? '-' }}</td>
            </tr>
            <tr>
                <th>Unit</th>
                <td>{{ $cuti->employee->unit ?? '-' }}</td>
            </tr>
            <tr>
                <th>Divisi</th>
                <td>{{ $cuti->employee->division ?? '-' }}</td>
            </tr>
            <tr>
                <th>Status Karyawan</th>
                <td>{{ $cuti->employee->employee_status ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>{{ $cuti->employee->position ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal Tidak Masuk</th>
                <td>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d-m-Y') }} s.d. {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Alasan Tidak Masuk</th>
                <td>{{ $cuti->alasan }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if ($cuti->status === 'pending')
                        <span class="badge bg-warning">Menunggu Persetujuan (Level {{ $cuti->current_approval_level }})</span>
                    @elseif ($cuti->status === 'approved')
                        <span class="badge bg-success">Disetujui</span>
                        @if($cuti->approved_by)
                            <br>
                            <small class="text-muted">
                                Disetujui oleh: {{ $cuti->approver->name ?? '-' }}
                                <br>
                                Tanggal: {{ $cuti->approved_at ? \Carbon\Carbon::parse($cuti->approved_at)->format('d-m-Y H:i') : '-' }}
                            </small>
                        @endif
                    @else
                        <span class="text-danger">Ditolak: {{ $cuti->rejected_message }}</span>
                        @if($cuti->rejected_by)
                            <br>
                            <small class="text-muted">
                                Ditolak oleh: {{ $cuti->rejector->name ?? '-' }}
                                <br>
                                Tanggal: {{ $cuti->rejected_at ? \Carbon\Carbon::parse($cuti->rejected_at)->format('d-m-Y H:i') : '-' }}
                            </small>
                        @endif
                    @endif
                </td>
            </tr>
            <tr>
                <th>Departemen</th>
                <td>{{ ucfirst($cuti->department_type) }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $cuti->keterangan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Dokumen Pendukung</th>
                <td>
                    @if($cuti->dokumen)
                        <a href="{{ route('cuti.preview', $cuti->id) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="las la-eye"></i> Preview Dokumen
                        </a>
                        <a href="{{ route('cuti.dokumen', $cuti->id) }}" class="btn btn-sm btn-primary">
                            <i class="las la-download"></i> Download
                        </a>
                    @else
                        <span class="text-muted">Tidak ada dokumen</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>No Telpon yang Bisa Dihubungi</th>
                <td>{{ $cuti->telepon }}</td>
            </tr>
        </table>

        @if($cuti->approval_history)
        <div class="mt-4">
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
                        @foreach($cuti->approval_history as $history)
                        <tr>
                            <td>Level {{ $history['level'] }}</td>
                            <td>
                                @if($history['action'] === 'approved')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>{{ $history['user_name'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($history['timestamp'])->format('d-m-Y H:i') }}</td>
                            <td>
                                @if($history['action'] === 'rejected')
                                    {{ $history['message'] }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        
        <div class="mt-3">
            <a href="{{ route('cuti.index') }}" class="btn btn-secondary">Kembali</a>
            @if($cuti->status === 'pending')
                <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn btn-warning">Edit</a>
                @if(Auth::user()->isApproverFor('cuti', $cuti->current_approval_level, $cuti->department_type))
                    <a href="{{ route('cuti.approve', $cuti->id) }}" class="btn btn-success">Terima</a>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">
                        Tolak
                    </button>

                    <!-- Reject Modal -->
                    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('cuti.reject', $cuti->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rejectModalLabel">Tolak Pengajuan Cuti</h5>
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
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
