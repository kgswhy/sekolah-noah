@extends('layouts.master-dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Request Fotocopy</h3>
                        @if (auth()->user()->isAdmin() || auth()->user()->isApprover())
                            <div class="card-tools">
                                <a href="{{ route('request-fotocopy.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Buat Request
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="request-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah Halaman</th>
                                        <th>Departemen</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($requests as $request)
                                        <tr>
                                            <td>{{ $request->id }}</td>
                                            <td>{{ $request->nama_lengkap }}</td>
                                            <td>{{ $request->nomor_induk_karyawan }}</td>
                                            <td>{{ $request->tanggal_penggunaan }}</td>
                                            <td>
                                                @php
                                                    $jumlahHalaman = is_string($request->jumlah_halaman) ? json_decode($request->jumlah_halaman) : $request->jumlah_halaman;
                                                    $jumlahDiperlukan = is_string($request->jumlah_diperlukan) ? json_decode($request->jumlah_diperlukan) : $request->jumlah_diperlukan;
                                                    $total = 0;
                                                    if ($jumlahHalaman && $jumlahDiperlukan) {
                                                        for($i = 0; $i < count($jumlahHalaman); $i++) {
                                                            $total += $jumlahHalaman[$i] * $jumlahDiperlukan[$i];
                                                        }
                                                    }
                                                @endphp
                                                {{ $total }} halaman
                                            </td>
                                            <td>{{ ucfirst($request->department_type) }}</td>
                                            <td>
                                                @if($request->status === 'pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($request->status === 'approved')
                                                    <span class="badge badge-success">Approved</span>
                                                @else
                                                    <span class="badge badge-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal{{ $request->id }}">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    
                                                    @if(Auth::user()->isAdmin() || Auth::user()->isApproverFor('fotocopy', $request->current_approval_level, $request->department_type))
                                                        @if($request->status === 'pending')
                                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#approveModal{{ $request->id }}">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#rejectModal{{ $request->id }}">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        @endif
                                                    @endif

                                                    @if(Auth::user()->employee && $request->employee_id === Auth::user()->employee->id)
                                                        @if($request->status === 'pending')
                                                            <a href="{{ route('request-fotocopy.edit', $request->id) }}" class="btn btn-warning btn-sm">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('request-fotocopy.destroy', $request->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus request ini?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                </div>

                                                <!-- Detail Modal -->
                                                <div class="modal fade" id="detailModal{{ $request->id }}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Detail Request Fotocopy</h5>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p><strong>Nama:</strong> {{ $request->nama_lengkap }}</p>
                                                                        <p><strong>NIK:</strong> {{ $request->nomor_induk_karyawan }}</p>
                                                                        <p><strong>Unit:</strong> {{ $request->unit }}</p>
                                                                        <p><strong>Divisi:</strong> {{ $request->divisi }}</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p><strong>Status Karyawan:</strong> {{ $request->status_karyawan }}</p>
                                                                        <p><strong>Jabatan:</strong> {{ $request->jabatan }}</p>
                                                                        <p><strong>Kegiatan:</strong> {{ $request->kegiatan }}</p>
                                                                        <p><strong>Subject:</strong> {{ $request->subject }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <div class="col-12">
                                                                        <h6>Detail Barang</h6>
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Nama Barang</th>
                                                                                    <th>Jumlah Halaman</th>
                                                                                    <th>Jumlah Diperlukan</th>
                                                                                    <th>Keterangan</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @php
                                                                                    $namaBarang = is_string($request->nama_barang) ? json_decode($request->nama_barang) : $request->nama_barang;
                                                                                    $jumlahHalaman = is_string($request->jumlah_halaman) ? json_decode($request->jumlah_halaman) : $request->jumlah_halaman;
                                                                                    $jumlahDiperlukan = is_string($request->jumlah_diperlukan) ? json_decode($request->jumlah_diperlukan) : $request->jumlah_diperlukan;
                                                                                    $keterangan = is_string($request->keterangan) ? json_decode($request->keterangan) : $request->keterangan;
                                                                                @endphp
                                                                                @if($namaBarang && is_array($namaBarang))
                                                                                    @for($i = 0; $i < count($namaBarang); $i++)
                                                                                        <tr>
                                                                                            <td>{{ $namaBarang[$i] ?? '-' }}</td>
                                                                                            <td>{{ $jumlahHalaman[$i] ?? '-' }}</td>
                                                                                            <td>{{ $jumlahDiperlukan[$i] ?? '-' }}</td>
                                                                                            <td>{{ $keterangan[$i] ?? '-' }}</td>
                                                                                        </tr>
                                                                                    @endfor
                                                                                @endif
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                @if($request->approval_history)
                                                                    <div class="row mt-3">
                                                                        <div class="col-12">
                                                                            <h6>Riwayat Approval</h6>
                                                                            <table class="table table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Level</th>
                                                                                        <th>Status</th>
                                                                                        <th>Oleh</th>
                                                                                        <th>Tanggal</th>
                                                                                        <th>Catatan</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @php
                                                                                        $approvalHistory = is_string($request->approval_history) 
                                                                                            ? json_decode($request->approval_history) 
                                                                                            : $request->approval_history;
                                                                                    @endphp
                                                                                    @if($approvalHistory && is_array($approvalHistory))
                                                                                        @foreach($approvalHistory as $history)
                                                                                            <tr>
                                                                                                <td>{{ $history->level ?? '-' }}</td>
                                                                                                <td>
                                                                                                    @if(($history->status ?? '') === 'approved')
                                                                                                        <span class="badge badge-success">Approved</span>
                                                                                                    @elseif(($history->status ?? '') === 'rejected')
                                                                                                        <span class="badge badge-danger">Rejected</span>
                                                                                                    @else
                                                                                                        <span class="badge badge-warning">Pending</span>
                                                                                                    @endif
                                                                                                </td>
                                                                                                <td>{{ $history->approver_name ?? '-' }}</td>
                                                                                                <td>{{ $history->timestamp ?? '-' }}</td>
                                                                                                <td>{{ $history->notes ?? '-' }}</td>
                                                                                            </tr>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Approve Modal -->
                                                <div class="modal fade" id="approveModal{{ $request->id }}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form action="{{ route('request-fotocopy.approve', $request->id) }}" method="POST">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Approve Request</h5>
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Catatan (Opsional)</label>
                                                                        <textarea name="notes" class="form-control" rows="3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-success">Approve</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Reject Modal -->
                                                <div class="modal fade" id="rejectModal{{ $request->id }}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form action="{{ route('request-fotocopy.reject', $request->id) }}" method="POST">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Reject Request</h5>
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Alasan Reject</label>
                                                                        <textarea name="rejected_message" class="form-control" rows="3" required></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-danger">Reject</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#request-table').DataTable({
                "responsive": true,
                "autoWidth": false,
                "order": [[0, "desc"]]
            });
        });
    </script>
@endpush
