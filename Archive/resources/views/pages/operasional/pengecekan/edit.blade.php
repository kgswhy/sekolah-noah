@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Edit Pengecekan Barang</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item" aria-current="page">Operasional</li>
                <li class="breadcrumb-item"><a href="{{ route('barang.index') }}">Barang</a></li>
                <li class="breadcrumb-item" aria-current="page">Pengecekan Barang</li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pengecekan.update', [$barang->id, $pengecekan->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pengecekan</label>
                        <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal', $pengecekan->tanggal) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi Barang</label>
                        <input type="text" class="form-control" name="kondisi" value="{{ old('kondisi', $pengecekan->kondisi) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Pengecekan</button>
                    <a href="{{ route('pengecekan.index', $barang->id) }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
