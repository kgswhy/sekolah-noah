@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Request Kurir / Mobil Operasional</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Operasional</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="ms-auto">
        <a href="{{ route('operasional.create') }}" class="btn btn-primary">Tambah Request</a>
    </div>
</div>
@endsection

@section('content')
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

<div class="row">
    <div class="col-md-12">
        <!-- Tabel Request Kurir -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Request Kurir</h5>
                <table id="kurirTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Unit</th>
                            <th>Divisi</th>
                            <th>Request By</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Tujuan</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kurirRequests as $r)
                        <tr>
                            <td>{{ $r->unit }}</td>
                            <td>{{ $r->divisi }}</td>
                            <td>{{ $r->request_by }}</td>
                            <td>{{ $r->jenis }}</td>
                            <td>{{ \Carbon\Carbon::parse($r->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $r->dari_jam }} - {{ $r->sampai_jam }}</td>
                            <td>{{ $r->tujuan }}</td>
                            <td>{{ $r->keperluan }}</td>
                            <td>
                                @if ($r->status === 'pending')
                                    <span class="badge bg-warning text-dark">
                                        Menunggu Persetujuan (Level {{ $r->current_approval_level ?? 1 }})
                                    </span>
                                @elseif ($r->status === 'approved')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif ($r->status === 'rejected')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($r->status) }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('operasional.edit', $r->id) }}" class="btn btn-warning btn-sm">
                                        <i class="las la-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('operasional.destroy', $r->id) }}"
                                       onclick="return confirm('Yakin ingin menghapus data ini?')"
                                       class="btn btn-danger btn-sm">
                                        <i class="las la-trash"></i> Hapus
                                    </a>

                                    @if($r->status === 'pending' && $r->canBeApprovedBy(auth()->user()))
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#approveModalKurir{{ $r->id }}">
                                            <i class="las la-check"></i> Setuju
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModalKurir{{ $r->id }}">
                                            <i class="las la-times"></i> Tolak
                                        </button>
                                    @endif
                                </div>

                                <!-- Approve Modal for Kurir -->
                                @if($r->status === 'pending' && $r->canBeApprovedBy(auth()->user()))
                                <div class="modal fade" id="approveModalKurir{{ $r->id }}" tabindex="-1" aria-labelledby="approveModalKurirLabel{{ $r->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('operasional.approve', $r->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="approveModalKurirLabel{{ $r->id }}">Setujui Request Kurir</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menyetujui request kurir berikut:</p>
                                                    <ul>
                                                        <li><strong>Request By:</strong> {{ $r->request_by }}</li>
                                                        <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}</li>
                                                        <li><strong>Jam:</strong> {{ $r->dari_jam }} - {{ $r->sampai_jam }}</li>
                                                        <li><strong>Tujuan:</strong> {{ $r->tujuan }}</li>
                                                        <li><strong>Keperluan:</strong> {{ $r->keperluan }}</li>
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

                                <!-- Reject Modal for Kurir -->
                                <div class="modal fade" id="rejectModalKurir{{ $r->id }}" tabindex="-1" aria-labelledby="rejectModalKurirLabel{{ $r->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('operasional.reject', $r->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="rejectModalKurirLabel{{ $r->id }}">Tolak Request Kurir</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda akan menolak request kurir berikut:</p>
                                                    <ul>
                                                        <li><strong>Request By:</strong> {{ $r->request_by }}</li>
                                                        <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}</li>
                                                        <li><strong>Tujuan:</strong> {{ $r->tujuan }}</li>
                                                        <li><strong>Keperluan:</strong> {{ $r->keperluan }}</li>
                                                    </ul>
                                                    
                                                    <div class="mb-3">
                                                        <label for="rejected_message_kurir{{ $r->id }}" class="form-label">Alasan Penolakan <span class="text-danger">*</span></label>
                                                        <textarea name="rejected_message" id="rejected_message_kurir{{ $r->id }}" class="form-control" rows="4" required placeholder="Masukkan alasan penolakan..."></textarea>
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

        <!-- Tabel Request Mobil -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Request Mobil</h5>
                <table id="mobilTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Unit</th>
                            <th>Divisi</th>
                            <th>Request By</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Tujuan</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mobilRequests as $r)
                        <tr>
                            <td>{{ $r->unit }}</td>
                            <td>{{ $r->divisi }}</td>
                            <td>{{ $r->request_by }}</td>
                            <td>{{ $r->jenis }}</td>
                            <td>{{ \Carbon\Carbon::parse($r->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $r->dari_jam }} - {{ $r->sampai_jam }}</td>
                            <td>{{ $r->tujuan }}</td>
                            <td>{{ $r->keperluan }}</td>
                            <td>
                                @if ($r->status === 'pending')
                                    <span class="badge bg-warning text-dark">
                                        Menunggu Persetujuan (Level {{ $r->current_approval_level ?? 1 }})
                                    </span>
                                @elseif ($r->status === 'approved')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif ($r->status === 'rejected')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($r->status) }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('operasional.edit', $r->id) }}" class="btn btn-warning btn-sm">
                                        <i class="las la-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('operasional.destroy', $r->id) }}"
                                       onclick="return confirm('Yakin ingin menghapus data ini?')"
                                       class="btn btn-danger btn-sm">
                                        <i class="las la-trash"></i> Hapus
                                    </a>
                                        
                                    @if($r->status === 'pending' && $r->canBeApprovedBy(auth()->user()))
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#approveModalMobil{{ $r->id }}">
                                            <i class="las la-check"></i> Setuju
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModalMobil{{ $r->id }}">
                                            <i class="las la-times"></i> Tolak
                                        </button>
                                    @endif
                                </div>

                                <!-- Approve Modal for Mobil -->
                                @if($r->status === 'pending' && $r->canBeApprovedBy(auth()->user()))
                                <div class="modal fade" id="approveModalMobil{{ $r->id }}" tabindex="-1" aria-labelledby="approveModalMobilLabel{{ $r->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('operasional.approve', $r->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="approveModalMobilLabel{{ $r->id }}">Setujui Request Mobil</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin ingin menyetujui request mobil berikut:</p>
                                                    <ul>
                                                        <li><strong>Request By:</strong> {{ $r->request_by }}</li>
                                                        <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}</li>
                                                        <li><strong>Jam:</strong> {{ $r->dari_jam }} - {{ $r->sampai_jam }}</li>
                                                        <li><strong>Tujuan:</strong> {{ $r->tujuan }}</li>
                                                        <li><strong>Keperluan:</strong> {{ $r->keperluan }}</li>
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

                                <!-- Reject Modal for Mobil -->
                                <div class="modal fade" id="rejectModalMobil{{ $r->id }}" tabindex="-1" aria-labelledby="rejectModalMobilLabel{{ $r->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('operasional.reject', $r->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="rejectModalMobilLabel{{ $r->id }}">Tolak Request Mobil</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda akan menolak request mobil berikut:</p>
                                                    <ul>
                                                        <li><strong>Request By:</strong> {{ $r->request_by }}</li>
                                                        <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($r->tanggal)->format('d M Y') }}</li>
                                                        <li><strong>Tujuan:</strong> {{ $r->tujuan }}</li>
                                                        <li><strong>Keperluan:</strong> {{ $r->keperluan }}</li>
                                                    </ul>
                                                    
                                                    <div class="mb-3">
                                                        <label for="rejected_message_mobil{{ $r->id }}" class="form-label">Alasan Penolakan <span class="text-danger">*</span></label>
                                                        <textarea name="rejected_message" id="rejected_message_mobil{{ $r->id }}" class="form-control" rows="4" required placeholder="Masukkan alasan penolakan..."></textarea>
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
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#kurirTable').DataTable({
            order: [[8, 'desc']], // Order by status column
            columnDefs: [
                { orderable: false, targets: [9] } // Disable sorting on action column
            ]
        });
        $('#mobilTable').DataTable({
            order: [[8, 'desc']], // Order by status column
            columnDefs: [
                { orderable: false, targets: [9] } // Disable sorting on action column
            ]
        });
    });
</script>
@endsection
