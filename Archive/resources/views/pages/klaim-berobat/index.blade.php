@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Pengajuan Klaim Berobat</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item">HRD</li>
                <li class="breadcrumb-item active">Klaim Berobat</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="{{ route('klaim.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajukan Klaim
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
        
        @if(count($klaims) > 0)
        <table class="table table-bordered table-hover" id="klaimTable">
            <thead class="table-light">
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Nomor Induk</th>
                    <th>Tanggal Berobat</th>
                    <th>Nama Pasien</th>
                    <th>Hubungan</th>
                    <th>Diagnosa</th>
                    <th>Nama Dokter</th>
                    <th>Nama RS/Klinik</th>
                    <th>Biaya</th>
                    <th class="text-center">Bukti</th>
                    <th class="text-center">Status</th>
                    <th class="text-center" width="100">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($klaims as $klaim)
                <tr>
                    <td>{{ $klaim->employee->full_name }}</td>
                    <td>{{ $klaim->employee->employee_number }}</td>
                    <td>{{ date('d-m-Y', strtotime($klaim->tanggal_berobat)) }}</td>
                    <td>{{ $klaim->nama_pasien }}</td>
                    <td>{{ $klaim->hubungan }}</td>
                    <td>{{ Str::limit($klaim->diagnosa, 30) }}</td>
                    <td>{{ $klaim->nama_dokter }}</td>
                    <td>{{ $klaim->nama_rs }}</td>
                    <td>Rp {{ number_format($klaim->biaya, 0, ',', '.') }}</td>
                    <td class="text-center">
                        @if($klaim->bukti_pembayaran)
                            <a href="{{ route('klaim.preview', $klaim->id) }}" target="_blank" class="btn btn-sm btn-light rounded-pill px-3">
                                <i class="fas fa-file-alt"></i> Lihat
                            </a>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($klaim->status == 'pending')
                            <span class="badge bg-warning rounded-pill px-3 py-2">Menunggu</span>
                        @elseif($klaim->status == 'approved')
                            <span class="badge bg-success rounded-pill px-3 py-2">Disetujui</span>
                        @elseif($klaim->status == 'rejected')
                            <span class="badge bg-danger rounded-pill px-3 py-2">Ditolak</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('klaim.show', $klaim->id) }}" class="btn btn-primary btn-sm rounded-circle" data-bs-toggle="tooltip" title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            
                            @if($klaim->status == 'pending')
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-circle" type="button" id="dropdownMenuButton{{ $klaim->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="dropdownMenuButton{{ $klaim->id }}">
                                        @if(Auth::id() == $klaim->employee->user_id)
                                            <li>
                                                <a href="{{ route('klaim.edit', $klaim->id) }}" class="dropdown-item">
                                                    <i class="fas fa-edit text-warning"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('klaim.destroy', $klaim->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                                        <i class="fas fa-trash text-danger"></i> Delete
                                                    </button>
                                                </form>
                                            </li>
                                        @endif
                                        
                                        @if(Auth::user()->isApproverFor('klaim-berobat'))
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <a href="{{ route('klaim.approve', $klaim->id) }}" class="dropdown-item" onclick="return confirm('Setujui klaim berobat ini?');">
                                                    <i class="fas fa-check text-success"></i> Approve
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $klaim->id }}">
                                                    <i class="fas fa-times text-danger"></i> Reject
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Reject Modal -->
                        <div class="modal fade" id="rejectModal{{ $klaim->id }}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
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
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center py-5">
            <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" alt="No Data" style="width: 80px; height: 80px; opacity: 0.5;" class="mb-3">
            <p class="text-muted mb-0">Tidak ada data klaim berobat</p>
        </div>
        @endif
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
    $(document).ready(function() {
        // Only initialize DataTables if the table exists
        if ($('#klaimTable').length > 0) {
            $('#klaimTable').DataTable({
                "ordering": false,
                "paging": true,
                "searching": true,
                "info": true
            });
        }
        
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
