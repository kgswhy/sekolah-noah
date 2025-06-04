@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Asset & Inventaris</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item">Finance</li>
                <li class="breadcrumb-item active">Aktiva Tetap</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="/finance/aktiva-tetap/create" class="btn btn-primary">Tambah Data</a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered" id="assetTable">
            <thead>
                <tr>
                    <th rowspan="2">Deskripsi</th>
                    <th rowspan="2">Nomor Barang</th>
                    <th rowspan="2">Jumlah</th>
                    <th colspan="2" style="text-align: center;">Klasifikasi Akun</th> <!-- Menggabungkan header Klasifikasi Akun -->
                    <th colspan="2" style="text-align: center;">Lokasi</th>
                    <th rowspan="2">Tgl Perolehan</th>
                    <th rowspan="2">Kondisi Fisik</th>
                    <th rowspan="2">Penjelasan</th>
                    <th rowspan="2">Action</th>
                </tr>
                <tr>
                    <th>No</th> <!-- Klasifikasi Akun (No) -->
                    <th>Nama</th> <!-- Klasifikasi Akun (Nama) -->
                    <th>Unit</th>
                    <th>Ruangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Kursi Kantor</td>
                    <td>AST-2023001</td>
                    <td>10</td>
                    <td>1510</td>
                    <td>Peralatan Kantor</td>
                    <td>Kantor Pusat</td>
                    <td>Ruang Direktur</td>
                    <td>2023-03-15</td>
                    <td>Baik</td>
                    <td>Kondisi normal, digunakan setiap hari</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm mb-1">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>Komputer</td>
                    <td>AST-2023002</td>
                    <td>5</td>
                    <td>1520</td>
                    <td>Peralatan IT</td>
                    <td>Lab Komputer</td>
                    <td>Meja Utama</td>
                    <td>2022-11-10</td>
                    <td>Rusak Ringan</td>
                    <td>Satu unit bermasalah pada layar</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm mb-1">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>Proyektor</td>
                    <td>AST-2023003</td>
                    <td>2</td>
                    <td>1530</td>
                    <td>Elektronik</td>
                    <td>Ruang Meeting</td>
                    <td>Depan</td>
                    <td>2021-08-21</td>
                    <td>Hilang</td>
                    <td>Belum ditemukan sejak peminjaman terakhir</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm mb-1">Edit</a>
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
        $('#assetTable').DataTable();
    });
</script>
@endsection
