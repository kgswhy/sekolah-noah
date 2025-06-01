@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Siswa Diterima</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active">Siswa Diterima</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table id="acceptedTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tujuan Kelas</th>
                    <th>Asal Sekolah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registrations as $r)
                <tr>
                    <td>{{ $r->nama_siswa }}</td>
                    <td>{{ $r->tujuan_kelas }}</td>
                    <td>{{ $r->asal_sekolah }}</td>
                    <td>{{ $r->status }}</td>
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
        $('#acceptedTable').DataTable();
    });
</script>
@endsection
