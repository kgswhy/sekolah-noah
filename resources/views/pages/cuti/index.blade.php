@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Management Cuti</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item">Cuti</li>
                    <li class="breadcrumb-item active" aria-current="page">Management Cuti</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="ms-auto">
        <a href="/cuti/create" class="btn btn-primary">Ajukan Cuti</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="cutiTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Karyawan</th>
                            <th>NIK</th>
                            <th>Tanggal Cuti</th>
                            <th>Alasan</th>
                            <th>Departemen</th>
                            <th>Status</th>
                            <th>Approval</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cutis as $cuti)
                            <tr>
                                <td>{{ $cuti->id }}</td>
                                <td>{{ $cuti->employee->full_name ?? '-' }}</td>
                                <td>{{ $cuti->employee->nik ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($cuti->tanggal_mulai)->format('d-m-Y') }} s.d. {{ \Carbon\Carbon::parse($cuti->tanggal_selesai)->format('d-m-Y') }}</td>
                                <td>{{ $cuti->alasan }}</td>
                                <td>{{ ucfirst($cuti->department_type) }}</td>
                                <td>
                                    @if ($cuti->status === 'pending')
                                        <span class="badge bg-warning">Menunggu Persetujuan (Level {{ $cuti->current_approval_level }})</span>
                                    @elseif ($cuti->status === 'approved')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="text-danger">Ditolak: {{ $cuti->rejected_message }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($cuti->status === 'pending')
                                        @if(Auth::user()->isApproverFor('cuti', $cuti->current_approval_level))
                                            <a href="{{ route('cuti.approve', $cuti->id) }}" class="btn btn-success btn-sm">Terima</a>

                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $cuti->id }}">
                                                Tolak
                                            </button>

                                            <div class="modal fade" id="rejectModal-{{ $cuti->id }}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('cuti.reject', $cuti->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title">Tolak Pengajuan Cuti</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="rejected_message" class="form-label">Alasan Penolakan</label>
                                                            <textarea name="rejected_message" class="form-control" required></textarea>
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Tolak</button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-muted">Menunggu persetujuan</span>
                                        @endif
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('cuti.show', $cuti->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    @if($cuti->status === 'pending' && Auth::user()->employee && $cuti->employee_id === Auth::user()->employee->id)
                                        <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan cuti ini?')">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#cutiTable').DataTable();
    });
</script>
@endsection
