@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Pendaftaran Siswa</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pendaftaran</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="ms-auto">
        <a href="{{ route('admission.create') }}" class="btn btn-primary">Tambah Pendaftaran</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="regTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tujuan Kelas</th>
                            <th>Asal Sekolah</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th>Observasi</th>
                            <th>Pengumuman</th>
                            <th>ID Card</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $r)
                        <tr>
                            <td>{{ $r->nama_siswa }}</td>
                            <td>{{ $r->tujuan_kelas }}</td>
                            <td>{{ $r->asal_sekolah }}</td>
                            <td>{{ $r->status }}</td>
                            <td>{{ $r->pembayaran ? '✔️' : '❌' }}</td>
                            <td>{{ $r->observasi ? '✔️' : '❌' }}</td>
                            <td>{{ $r->pengumuman ? '✔️' : '❌' }}</td>
                            <td>{{ $r->id_card ? '✔️' : '❌' }}</td>
                            <td>
                                <a href="{{ route('admission.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('admission.destroy', $r->id) }}"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    class="btn btn-danger btn-sm">Hapus</a>
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
        $('#regTable').DataTable();
    });
</script>
@endsection
