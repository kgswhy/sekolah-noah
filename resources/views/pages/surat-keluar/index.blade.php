@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Surat Keluar</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active">Surat Keluar</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="/surat-keluar/create" class="btn btn-primary">Tambah Surat Keluar</a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered" id="suratKeluarTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Unit</th>
                    <th>Divisi</th>
                    <th>Pembuat Surat</th>
                    <th>Jenis Surat</th>
                    <th>Perihal</th>
                    <th>Tembusan</th>
                    <th>Dokumen</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>001/SN-PGKG/02/05/II/2025</td>
                    <td>PGTK</td>
                    <td>Administrasi</td>
                    <td>Akademik</td>
                    <td>Surat Tugas</td>
                    <td>Penugasan Guru ke Kegiatan</td>
                    <td>Wakil Direktur, Kepala Sekolah SD</td>
                    <td><a href="#" class="btn btn-sm btn-info">Lihat</a></td>
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
        $('#suratKeluarTable').DataTable();
    });
</script>
@endsection
