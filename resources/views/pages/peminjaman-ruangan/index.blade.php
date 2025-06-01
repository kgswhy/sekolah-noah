@extends('layouts/master-dashboard')

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Peminjaman Ruangan</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Peminjaman Ruangan</li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Peminjaman</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="ms-auto">
            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
                <i class="las la-plus"></i> Tambah Peminjaman
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="peminjamanTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Unit</th>
                                    <th>Departemen</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal Diperlukan</th>
                                    <th>Waktu</th>
                                    <th>Ruangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjamanRuangan as $index => $peminjaman)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $peminjaman->nama_karyawan }}</td>
                                        <td>{{ $peminjaman->unit }}</td>
                                        <td>{{ $peminjaman->departemen }}</td>
                                        <td>{{ $peminjaman->nama_kegiatan }}</td>
                                        <td>{{ date('d/m/Y', strtotime($peminjaman->tanggal_diperlukan)) }}</td>
                                        <td>{{ $peminjaman->waktu_pelaksanaan }}</td>
                                        <td>
                                            @foreach (json_decode($peminjaman->ruangan) as $ruangan)
                                                <span class="badge bg-info">{{ $ruangan }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Aktif</span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                
                                                <button type="button" class="btn btn-success btn-sm"
                                                            
                                                >Setuju
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                >
                                                Tolak
                                            </button>
                                                <a href="{{ route('peminjaman.show', $peminjaman->id) }}"
                                                    class="btn btn-sm btn-primary me-1">
                                                    Lihat Detail
                                                </a>
                                                
                                                <form action="{{ route('peminjaman.delete', $peminjaman->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        Hapus
                                                    </button>
                                                </form>

                                                
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
@endsection

@section('scripts')
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#peminjamanTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                },
                order: [
                    [0, 'desc']
                ]
            });
        });
    </script>
@endsection
