@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Izin Meninggalkan Pekerjaan (Brief)</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item">HRD</li>
                <li class="breadcrumb-item active">Izin Brief</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="{{ route('brief.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajukan Izin
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
        @endif
        
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('error') }}
            </div>
        @endif
        
        <table class="table table-bordered table-hover" id="briefTable">
            <thead class="table-light">
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Nomor Induk</th>
                    <th>Unit</th>
                    <th>Divisi</th>
                    <th>Status</th>
                    <th>Jabatan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Keperluan</th>
                    <th class="text-center">Dokumen</th>
                    <th class="text-center">Status</th>
                    <th class="text-center" width="100">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($briefs as $brief)
                <tr>
                    <td>{{ $brief->employee->full_name }}</td>
                    <td>{{ $brief->employee->employee_number }}</td>
                    <td>{{ $brief->employee->unit }}</td>
                    <td>{{ $brief->employee->division }}</td>
                    <td>{{ $brief->employee->employment_status }}</td>
                    <td>{{ $brief->employee->position }}</td>
                    <td>{{ date('d-m-Y', strtotime($brief->tanggal)) }}</td>
                    <td>{{ $brief->waktu }}</td>
                    <td>{{ Str::limit($brief->keperluan, 30) }}</td>
                    <td class="text-center">
                        @if($brief->dokumen)
                            <a href="{{ route('brief.preview', $brief->id) }}" target="_blank" class="btn btn-sm btn-light rounded-pill px-3">
                                <i class="fas fa-file-alt"></i> Lihat
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($brief->status == 'pending')
                            <span class="badge bg-warning rounded-pill px-3 py-2">Menunggu</span>
                        @elseif($brief->status == 'approved')
                            <span class="badge bg-success rounded-pill px-3 py-2">Disetujui</span>
                        @elseif($brief->status == 'rejected')
                            <span class="badge bg-danger rounded-pill px-3 py-2">Ditolak</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('brief.show', $brief->id) }}" class="btn btn-primary btn-sm rounded-circle" data-bs-toggle="tooltip" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            
                            @if($brief->status == 'pending')
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-circle" type="button" id="dropdownMenuButton{{ $brief->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="dropdownMenuButton{{ $brief->id }}">
                                        @if(Auth::id() == $brief->employee->user_id)
                                            <li>
                                                <a href="{{ route('brief.edit', $brief->id) }}" class="dropdown-item">
                                                    <i class="fas fa-edit text-warning"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('brief.destroy', $brief->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                                        <i class="fas fa-trash text-danger"></i> Delete
                                                    </button>
                                                </form>
                                            </li>
                                        @endif
                                        
                                        @if(Auth::user()->isApproverFor('brief-absen'))
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <a href="{{ route('brief.approve', $brief->id) }}" class="dropdown-item" onclick="return confirm('Setujui izin brief ini?');">
                                                    <i class="fas fa-check text-success"></i> Approve
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $brief->id }}">
                                                    <i class="fas fa-times text-danger"></i> Reject
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Reject Modal -->
                        <div class="modal fade" id="rejectModal{{ $brief->id }}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('brief.reject', $brief->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rejectModalLabel">Tolak Pengajuan Izin Brief</h5>
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
                                            <button type="submit" class="btn btn-danger">Tolak Izin</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="12" class="text-center py-4">
                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" alt="No Data" style="width: 60px; height: 60px; opacity: 0.5;" class="mb-3">
                        <p class="text-muted mb-0">Tidak ada data izin brief</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .badge {
        font-weight: 500;
        letter-spacing: 0.3px;
    }
    .table > :not(caption) > * > * {
        padding: 0.75rem 1rem;
        vertical-align: middle;
    }
    .dropdown-menu {
        padding: 0.5rem 0;
        border: none;
        border-radius: 0.5rem;
    }
    .dropdown-item {
        padding: 0.5rem 1.25rem;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }
    .rounded-circle {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
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

@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

<script>
    $(document).ready(function () {
        $('#briefTable').DataTable({
            pageLength: 10,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                zeroRecords: "Tidak ditemukan data yang sesuai",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                infoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                },
            },
            ordering: true,
            responsive: true,
        });
        
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Auto-dismiss alerts after 5 seconds
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    });
</script>
@endsection
