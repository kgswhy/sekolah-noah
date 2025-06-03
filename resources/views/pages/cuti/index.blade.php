@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Daftar Pengajuan Cuti</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cuti</li>
                </ol>
            </nav>
        </div>
    </div>
    <div>
        <a href="{{ route('cuti.create') }}" class="btn btn-primary">
            <i class="las la-plus"></i> Ajukan Cuti
        </a>
    </div>
</div>
@endsection

@section('content')
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
                    <th>Level Approval</th>
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
                                <span class="badge bg-warning">Menunggu Persetujuan</span>
                            @elseif ($cuti->status === 'approved')
                                <span class="badge bg-success">Disetujui</span>
                                @if($cuti->approved_by)
                                    <br>
                                    <small class="text-muted">
                                        Oleh: {{ $cuti->approver->name ?? '-' }}
                                        <br>
                                        {{ $cuti->approved_at ? \Carbon\Carbon::parse($cuti->approved_at)->format('d-m-Y H:i') : '-' }}
                                    </small>
                                @endif
                            @else
                                <span class="badge bg-danger">Ditolak</span>
                                @if($cuti->rejected_by)
                                    <br>
                                    <small class="text-muted">
                                        Oleh: {{ $cuti->rejector->name ?? '-' }}
                                        <br>
                                        {{ $cuti->rejected_at ? \Carbon\Carbon::parse($cuti->rejected_at)->format('d-m-Y H:i') : '-' }}
                                    </small>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if($cuti->status === 'pending')
                                Level {{ $cuti->current_approval_level }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('cuti.show', $cuti->id) }}" class="btn btn-info btn-sm">
                                <i class="las la-eye"></i> Detail
                            </a>
                            @if($cuti->status === 'pending')
                                @if(Auth::user()->isApproverFor('cuti', $cuti->current_approval_level, $cuti->department_type))
                                    <a href="{{ route('cuti.approve', $cuti->id) }}" class="btn btn-success btn-sm">
                                        <i class="las la-check"></i> Terima
                                    </a>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $cuti->id }}">
                                        <i class="las la-times"></i> Tolak
                                    </button>

                                    <!-- Reject Modal -->
                                    <div class="modal fade" id="rejectModal-{{ $cuti->id }}" tabindex="-1" aria-labelledby="rejectModalLabel-{{ $cuti->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('cuti.reject', $cuti->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="rejectModalLabel-{{ $cuti->id }}">Tolak Pengajuan Cuti</h5>
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#cutiTable').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
            }
        });
    });
</script>
@endpush
