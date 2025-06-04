@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Detail Pengajuan Lembur/Honor</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/lembur-honor">Lembur dan Honor</a></li>
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
                <td>{{ $lemburHonor->employee->full_name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Nomor Induk Karyawan</th>
                <td>{{ $lemburHonor->employee->nik ?? '-' }}</td>
            </tr>
            <tr>
                <th>Unit</th>
                <td>{{ $lemburHonor->employee->unit ?? '-' }}</td>
            </tr>
            <tr>
                <th>Divisi</th>
                <td>{{ $lemburHonor->employee->division ?? '-' }}</td>
            </tr>
            <tr>
                <th>Status Karyawan</th>
                <td>{{ $lemburHonor->employee->employee_status ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>{{ $lemburHonor->employee->position ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jenis Pengajuan</th>
                <td>{{ $lemburHonor->jenis == 'lembur' ? 'Lembur' : 'Honor Kegiatan' }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>
                    @if($lemburHonor->tanggal_selesai)
                        {{ \Carbon\Carbon::parse($lemburHonor->tanggal_mulai)->format('d-m-Y') }} s.d. {{ \Carbon\Carbon::parse($lemburHonor->tanggal_selesai)->format('d-m-Y') }}
                    @else
                        {{ \Carbon\Carbon::parse($lemburHonor->tanggal_mulai)->format('d-m-Y') }}
                    @endif
                </td>
            </tr>
            <tr>
                <th>Waktu</th>
                <td>
                    @if($lemburHonor->waktu_mulai && $lemburHonor->waktu_selesai)
                        {{ $lemburHonor->waktu_mulai }} - {{ $lemburHonor->waktu_selesai }}
                    @else
                        -
                    @endif
                </td>
            </tr>
            <tr>
                <th>Durasi (jam)</th>
                <td>{{ $lemburHonor->durasi ?? '-' }}</td>
            </tr>
            <tr>
                <th>Kegiatan</th>
                <td>{{ $lemburHonor->kegiatan }}</td>
            </tr>
            <tr>
                <th>Lokasi</th>
                <td>{{ $lemburHonor->lokasi }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if ($lemburHonor->status === 'pending')
                        <span class="badge bg-warning">Menunggu Persetujuan</span>
                    @elseif ($lemburHonor->status === 'approved')
                        <span class="badge bg-success">Disetujui</span>
                    @else
                        <span class="text-danger">Ditolak: {{ $lemburHonor->rejected_message }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $lemburHonor->keterangan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Dokumen Pendukung</th>
                <td>
                    @if($lemburHonor->dokumen_pendukung)
                        <a href="{{ route('lembur-honor.preview', $lemburHonor->id) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="las la-eye"></i> Preview Dokumen
                        </a>
                        <a href="{{ route('lembur-honor.dokumen', $lemburHonor->id) }}" class="btn btn-sm btn-primary">
                            <i class="las la-download"></i> Download
                        </a>
                    @else
                        <span class="text-muted">Tidak ada dokumen</span>
                    @endif
                </td>
            </tr>
        </table>
        
        <div class="mt-3">
            <a href="{{ route('lembur-honor.index') }}" class="btn btn-secondary">Kembali</a>
            @if($lemburHonor->status === 'pending')
                @if(Auth::user()->isApproverFor('lembur'))
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approveModal">Setujui</a>
                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Tolak</a>
                @endif
                @if(Auth::id() == $lemburHonor->employee->user_id)
                    <a href="{{ route('lembur-honor.edit', $lemburHonor->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('lembur-honor.destroy', $lemburHonor->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>

<!-- Approve Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveModalLabel">Konfirmasi Persetujuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('lembur-honor.approve', $lemburHonor->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    Apakah Anda yakin ingin menyetujui pengajuan lembur/honor ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Setujui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Konfirmasi Penolakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('lembur-honor.reject', $lemburHonor->id) }}" method="POST">
                @csrf
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