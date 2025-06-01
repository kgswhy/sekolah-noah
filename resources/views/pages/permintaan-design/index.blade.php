@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Permintaan Design</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active">Permintaan Design</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="{{ route('permintaan-design.create') }}" class="btn btn-primary">Buat Permintaan</a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered" id="designTable">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Unit</th>
                    <th>Divisi</th>
                    <th>Tanggal Deadline</th>
                    <th>Kegiatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($designs as $item)
                <tr>
                    <td>{{ $item->kategori }}@if($item->kategori == 'lainnya' && $item->kategori_lainnya) ({{ $item->kategori_lainnya }})@endif</td>
                    <td>{{ $item->unit }}</td>
                    <td>{{ $item->divisi }}</td>
                    <td>{{ $item->tanggal_deadline }}</td>
                    <td>{{ $item->kegiatan }}</td>
                    <td><span class="badge bg-warning text-dark">{{ $item->status }}</span></td>
                    <td>
                        <a href="{{ route('permintaan-design.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('permintaan-design.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>

                        
                        <button type="button" class="btn btn-success btn-sm"
                                                            
                        >Setuju
                    </button>
                    <button type="button" class="btn btn-danger btn-sm"
                        >
                        Tolak
                    </button> 
                    </td>
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
        $('#designTable').DataTable();
    });
</script>
@endsection
