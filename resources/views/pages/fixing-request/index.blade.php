@extends('layouts/master-dashboard')

@section('header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Permintaan Perbaikan</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">IT</li>
                        <li class="breadcrumb-item active" aria-current="page">Permintaan Perbaikan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div>
            <a href="{{ route('fixing-request.create') }}" class="btn btn-primary">
                <i class="mdi mdi-plus"></i> Buat Request
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="fixingRequestsTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Kategori</th>
                                    <th>User</th>
                                    <th>Unit</th>
                                    <th>Divisi</th>
                                    <th>Rincian Kerusakan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($fixingRequests as $request)
                                    <tr>
                                        <td>{{ $request->created_at->format('d-m-Y H:i') }}</td>
                                        <td>{{ $request->device_category }}</td>
                                        <td>{{ $request->user->employee->full_name }}</td>
                                        <td>{{ $request->unit }}</td>
                                        <td>{{ $request->division }}</td>
                                        <td>{{ Str::limit($request->damage_details, 50) }}</td>
                                        <td>
                                            @if($request->status == 'pending')
                                                <span class="badge bg-warning">Menunggu</span>
                                            @elseif($request->status == 'approved')
                                                <span class="badge bg-success">Disetujui</span>
                                            @else
                                                <span class="badge bg-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('fixing-request.show', $request->id) }}" class="btn btn-info btn-sm">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                               
                                                <button type="button" class="btn btn-success btn-sm"
                                                            
                                                >Setuju
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                >
                                                Tolak
                                            </button>
                                            </div>

                                            <!-- Reject Modal -->
                                            <div class="modal fade" id="rejectModal{{ $request->id }}" tabindex="-1" aria-labelledby="rejectModalLabel{{ $request->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('fixing-request.reject', $request->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="rejectModalLabel{{ $request->id }}">Tolak Request</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="rejection_message">Alasan Penolakan</label>
                                                                    <textarea class="form-control" id="rejection_message" name="rejection_message" rows="3" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Tolak Request</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#fixingRequestsTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json'
                },
                order: [[0, 'desc']], // Sort by date column (first column) in descending order
                pageLength: 10,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]]
            });
        });
    </script>
@endsection