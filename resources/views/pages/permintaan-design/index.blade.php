@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Permintaan Design</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active">Permintaan Design</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="{{ route('permintaan-design.create') }}" class="btn btn-primary">Buat Permintaan</a>
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
        
        <table class="table table-bordered" id="designTable">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Unit</th>
                    <th>Divisi</th>
                    <th>Tanggal Deadline</th>
                    <th>Kegiatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($designs as $item)
                <tr>
                    <td>{{ $item->kategori }}@if($item->kategori == 'lainnya' && $item->kategori_lainnya) ({{ $item->kategori_lainnya }})@endif</td>
                    <td>{{ $item->unit }}</td>
                    <td>{{ $item->divisi }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_deadline)->format('d-m-Y') }}</td>
                    <td>{{ $item->kegiatan }}</td>
                    <td>
                        @if ($item->status === 'pending')
                            <span class="badge bg-warning text-dark">
                                Menunggu Persetujuan (Level {{ $item->current_approval_level ?? 1 }})
                            </span>
                        @elseif ($item->status === 'approved')
                            <span class="badge bg-success">Disetujui</span>
                        @elseif ($item->status === 'rejected')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($item->status) }}</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('permintaan-design.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="las la-edit"></i> Edit
                            </a>
                            
                            <form action="{{ route('permintaan-design.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    <i class="las la-trash"></i> Hapus
                                </button>
                            </form>

                            @if($item->status === 'pending' && $item->canBeApprovedBy(auth()->user()))
                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#approveModal{{ $item->id }}">
                                    <i class="las la-check"></i> Setuju
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $item->id }}">
                                    <i class="las la-times"></i> Tolak
                                </button>
                            @endif
                        </div>

                        <!-- Approve Modal -->
                        @if($item->status === 'pending' && $item->canBeApprovedBy(auth()->user()))
                        <div class="modal fade" id="approveModal{{ $item->id }}" tabindex="-1" aria-labelledby="approveModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('permintaan-design.approve', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="approveModalLabel{{ $item->id }}">Setujui Permintaan Design</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menyetujui permintaan design untuk:</p>
                                            <ul>
                                                <li><strong>Kategori:</strong> {{ $item->kategori }}</li>
                                                <li><strong>Kegiatan:</strong> {{ $item->kegiatan }}</li>
                                                <li><strong>Unit:</strong> {{ $item->unit }}</li>
                                                <li><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($item->tanggal_deadline)->format('d M Y') }}</li>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success">
                                                <i class="las la-check"></i> Setujui
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Reject Modal -->
                        <div class="modal fade" id="rejectModal{{ $item->id }}" tabindex="-1" aria-labelledby="rejectModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('permintaan-design.reject', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rejectModalLabel{{ $item->id }}">Tolak Permintaan Design</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda akan menolak permintaan design untuk:</p>
                                            <ul>
                                                <li><strong>Kategori:</strong> {{ $item->kategori }}</li>
                                                <li><strong>Kegiatan:</strong> {{ $item->kegiatan }}</li>
                                                <li><strong>Unit:</strong> {{ $item->unit }}</li>
                                            </ul>
                                            
                                            <div class="mb-3">
                                                <label for="rejected_message{{ $item->id }}" class="form-label">Alasan Penolakan <span class="text-danger">*</span></label>
                                                <textarea name="rejected_message" id="rejected_message{{ $item->id }}" class="form-control" rows="4" required placeholder="Masukkan alasan penolakan..."></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">
                                                <i class="las la-times"></i> Tolak
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#designTable').DataTable({
            order: [[5, 'desc']], // Order by status column
            columnDefs: [
                { orderable: false, targets: [6] } // Disable sorting on action column
            ]
        });
    });
</script>
@endsection
