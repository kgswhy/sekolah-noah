@extends('layouts.master-dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Permintaan ATK</h3>
                        <div class="card-tools">
                            <a href="{{ route('request-atk.create') }}" class="btn btn-primary btn-sm">
                                Tambah Permintaan
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Unit</th>
                                        <th>Divisi</th>
                                        <th>Status Karyawan</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($requests as $request)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $request->nama_lengkap }}</td>
                                            <td>{{ $request->unit }}</td>
                                            <td>{{ $request->divisi }}</td>
                                            <td>{{ $request->status_karyawan }}</td>
                                            <td>{{ $request->jabatan }}</td>
                                            <td>
                                                @switch($request->status)
                                                    @case('pending')
                                                        <span class="badge bg-warning">Menunggu Approval</span>
                                                    @break

                                                    @case('approved')
                                                        <span class="badge bg-success">Disetujui</span>
                                                    @break

                                                    @case('rejected')
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @break
                                                @endswitch
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('request-atk.show', $request->id) }}"
                                                        class="btn btn-info btn-sm">
                                                        Detail
                                                    </a>

                                                    @if ($request->status === 'pending' && auth()->user()->role_id === 1)
                                                        <button type="button" class="btn btn-success btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#approveModal{{ $request->id }}">
                                                            Setuju
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#rejectModal{{ $request->id }}">
                                                            Tolak
                                                        </button>
                                                    @endif
                                                </div>

                                                <!-- Approve Modal -->
                                                <div class="modal fade" id="approveModal{{ $request->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route('request-atk.approve', $request->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Setujui Permintaan ATK</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Apakah Anda yakin ingin menyetujui permintaan ATK
                                                                        ini?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Setujui</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Reject Modal -->
                                                <div class="modal fade" id="rejectModal{{ $request->id }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route('request-atk.reject', $request->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Tolak Permintaan ATK</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="rejected_message"
                                                                            class="form-label">Alasan Penolakan</label>
                                                                        <textarea class="form-control" id="rejected_message" name="rejected_message" required></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Tolak</button>
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
        </div>
    @endsection
