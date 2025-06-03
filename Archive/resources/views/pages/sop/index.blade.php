@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Management SOP</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item" aria-current="page">SOP</li>
                    <li class="breadcrumb-item active" aria-current="page">Management SOP</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="ms-auto">
        <a href="/sop/create" class="btn btn-primary">Tambah SOP</a>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Card untuk Tabel SOP -->
        <div class="card">
            <div class="card-body">
                <table id="sopTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>SOP Pengajuan Cuti</td>
                            <td>
                                <a href="/sop/detail/1" class="btn btn-info btn-sm">Detail</a>
                                <a href="/sop/edit/1" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/sop/delete/1" onclick="return confirm('Apakah anda yakin ingin menghapus SOP ini?');" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- DataTables CSS & JS CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#sopTable').DataTable();
    });
</script>
@endsection
