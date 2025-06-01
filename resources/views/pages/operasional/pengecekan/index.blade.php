@extends('layouts.master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Pengecekan Barang: {{ $barang->nama_barang }}</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Barang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengecekan</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="ms-auto">
        <a href="{{ route('pengecekan.create', $barang->id) }}" class="btn btn-primary">Tambah Pengecekan</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="pengecekanTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengecekan as $item)
                        <tr>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->kondisi }}</td>
                            <td>
                                <a href="{{ route('pengecekan.edit', [$barang->id, $item->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('pengecekan.destroy', [$barang->id, $item->id]) }}" onclick="return confirm('Yakin ingin menghapus pengecekan ini?')" class="btn btn-danger btn-sm">Hapus</a>
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
        $('#pengecekanTable').DataTable();
    });
</script>
@endsection
