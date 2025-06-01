@extends('layouts.master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Pengumuman</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active">Pengumuman</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="/pengumuman/create" class="btn btn-primary">+ Tambah Pengumuman</a>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kepada</th>
                            <th>Pengumuman</th>
                            <th>Lampiran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Daftar Pengumuman Dummy -->
                        <tr>
                            <td>Pengumuman 1</td>
                            <td>Semua Karyawan</td>
                            <td>Pengumuman tentang kegiatan baru</td>
                            <td><a href="#" class="btn btn-info btn-sm">Lihat Lampiran</a></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Pengumuman 2</td>
                            <td>Divisi A</td>
                            <td>Informasi penting untuk divisi A</td>
                            <td><a href="#" class="btn btn-info btn-sm">Lihat Lampiran</a></td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
