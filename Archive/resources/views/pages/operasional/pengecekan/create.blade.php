@extends('layouts.master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah Pengecekan Barang: {{ $barang->nama_barang }}</h3>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pengecekan.store', $barang->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Pengecekan</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi Barang</label>
                        <input type="text" class="form-control" name="kondisi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pengecekan.index', $barang->id) }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
