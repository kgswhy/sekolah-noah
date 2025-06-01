@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Surat Tugas & Perjalanan Dinas</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item">Surat Tugas</li>
                    <li class="breadcrumb-item active" aria-current="page">Management Surat Tugas</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="ms-auto">
        <a href="{{ route('surat-tugas.create') }}" class="btn btn-primary">Ajukan Surat Tugas</a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
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
        
        @if(count($suratTugas) > 0)
            <table id="suratTugasTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pegawai</th>
                        <th>Judul Tugas</th>
                        <th>Lokasi</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suratTugas as $tugas)
                        <tr>
                            <td>{{ $tugas->id }}</td>
                            <td>{{ $tugas->employee->full_name ?? '-' }}</td>
                            <td>{{ $tugas->judul_tugas }}</td>
                            <td>{{ $tugas->lokasi_tugas }}</td>
                            <td>
                                @if($tugas->tanggal_selesai)
                                    {{ \Carbon\Carbon::parse($tugas->tanggal_mulai)->format('d-m-Y') }} s.d. {{ \Carbon\Carbon::parse($tugas->tanggal_selesai)->format('d-m-Y') }}
                                @else
                                    {{ \Carbon\Carbon::parse($tugas->tanggal_mulai)->format('d-m-Y') }}
                                @endif
                            </td>
                            <td>
                                @if ($tugas->status === 'pending')
                                    <span class="badge bg-warning">Menunggu</span>
                                @elseif ($tugas->status === 'approved')
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('surat-tugas.show', $tugas->id) }}" class="btn btn-info btn-sm">Detail</a>

                                @if ($tugas->status === 'pending')
                                    @if(Auth::user()->isApproverFor('surat-tugas'))
                                        <a href="#" class="btn btn-success btn-sm"
                                            onclick="event.preventDefault(); document.getElementById('approve-form-{{ $tugas->id }}').submit();">Setujui</a>
                                        <form id="approve-form-{{ $tugas->id }}" 
                                            action="{{ route('surat-tugas.approve', $tugas->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#rejectModal{{ $tugas->id }}">Tolak</a>

                                        <!-- Reject Modal -->
                                        <div class="modal fade" id="rejectModal{{ $tugas->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Alasan Penolakan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('surat-tugas.reject', $tugas->id) }}"
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

                                    @if (Auth::id() == $tugas->employee->user_id)
                                        <a href="{{ route('surat-tugas.edit', $tugas->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('surat-tugas.destroy', $tugas->id) }}" method="POST" style="display: inline-block">
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
                <h4>Belum ada data pengajuan surat tugas</h4>
                <p>Silakan klik tombol "Ajukan Surat Tugas" untuk membuat pengajuan baru</p>
                <a href="{{ route('surat-tugas.create') }}" class="btn btn-primary mt-2">Ajukan Surat Tugas</a>
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
        @if(count($suratTugas) > 0)
            $('#suratTugasTable').DataTable();
        @endif
    });
</script>
@endsection
