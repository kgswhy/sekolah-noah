@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Surat Masuk</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active">Surat Masuk</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="/surat-masuk/create" class="btn btn-primary">Tambah Surat</a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered" id="suratTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Surat / Dokumen</th>
                    <th>Tanggal Diterima</th>
                    <th>Unit</th>
                    <th>Divisi</th>
                    <th>Tujuan Surat</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Surat Undangan Rapat</td>
                    <td>2025-05-07</td>
                    <td>Kantor Pusat</td>
                    <td>HRD</td>
                    <td>Direktur Utama</td>
                    <td>Telah Diserahkan</td>
                    <td>Telah disimpan di dalam loker ruangan A</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</a>
                    </td>
                </tr>
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
        $('#suratTable').DataTable();
    });
</script>
@endsection
