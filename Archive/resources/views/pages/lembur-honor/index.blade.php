@extends('layouts/master-dashboard')

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Lembur dan Honor Kegiatan</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item active">Lembur dan Honor</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('lembur-honor.create') }}" class="btn btn-primary">Ajukan Lembur/Honor</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @if (count($lemburHonors) > 0)
                <table class="table table-bordered" id="lemburTable">
                    <thead>
                        <tr>
                            <th>Nama Pegawai</th>
                            <th>Nomor Induk</th>
                            <th>Unit</th>
                            <th>Divisi</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            <th>Kegiatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lemburHonors as $lemburHonor)
                            <tr>
                                <td>{{ $lemburHonor->employee->full_name ?? '-' }}</td>
                                <td>{{ $lemburHonor->employee->nik ?? '-' }}</td>
                                <td>{{ $lemburHonor->employee->unit ?? '-' }}</td>
                                <td>{{ $lemburHonor->employee->division ?? '-' }}</td>
                                <td>{{ $lemburHonor->jenis == 'lembur' ? 'Lembur' : 'Honor' }}</td>
                                <td>
                                    @if ($lemburHonor->tanggal_selesai)
                                        {{ \Carbon\Carbon::parse($lemburHonor->tanggal_mulai)->format('d-m-Y') }} s.d.
                                        {{ \Carbon\Carbon::parse($lemburHonor->tanggal_selesai)->format('d-m-Y') }}
                                    @else
                                        {{ \Carbon\Carbon::parse($lemburHonor->tanggal_mulai)->format('d-m-Y') }}
                                    @endif
                                </td>
                                
                                <td>{{ $lemburHonor->kegiatan }}</td>
                                <td>
                                    @if ($lemburHonor->status == 'pending')
                                        <span class="badge bg-warning">Menunggu</span>
                                    @elseif($lemburHonor->status == 'approved')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('lembur-honor.show', $lemburHonor->id) }}"
                                        class="btn btn-info btn-sm">Detail</a>

                                    @if ($lemburHonor->status == 'pending')
                                        @if (Auth::user()->isApproverFor('lembur'))
                                            <a href="#" class="btn btn-success btn-sm"
                                                onclick="event.preventDefault(); document.getElementById('approve-form-{{ $lemburHonor->id }}').submit();">Setujui</a>
                                            <form id="approve-form-{{ $lemburHonor->id }}"
                                                action="{{ route('lembur-honor.approve', $lemburHonor->id) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                            </form>

                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#rejectModal{{ $lemburHonor->id }}">Tolak</a>

                                            <!-- Reject Modal -->
                                            <div class="modal fade" id="rejectModal{{ $lemburHonor->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Alasan Penolakan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('lembur-honor.reject', $lemburHonor->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="rejected_message"
                                                                        class="form-label">Alasan</label>
                                                                    <textarea class="form-control" id="rejected_message" name="rejected_message" rows="3" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Tolak</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        @if (Auth::id() == $lemburHonor->employee->user_id)
                                            <a href="{{ route('lembur-honor.edit', $lemburHonor->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('lembur-honor.destroy', $lemburHonor->id) }}"
                                                method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center py-5">
                    <h4>Belum ada data pengajuan lembur/honor</h4>
                    <p>Silakan klik tombol "Ajukan Lembur/Honor" untuk membuat pengajuan baru</p>
                    <a href="{{ route('lembur-honor.create') }}" class="btn btn-primary mt-2">Ajukan Lembur/Honor</a>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            @if (count($lemburHonors) > 0)
                $('#lemburTable').DataTable();
            @endif
        });
    </script>
@endsection
