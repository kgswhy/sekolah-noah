@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah Kegiatan</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active">Tambah Kegiatan</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admission.activity.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required>
            </div>
            <div class="mb-3">
                <label>Kegiatan</label>
                <input type="text" class="form-control" name="kegiatan" required>
            </div>
            <div class="mb-3">
                <label>Deskripsi Kegiatan</label>
                <textarea class="form-control" name="deskripsi_kegiatan" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label>Dokumen Pendukung</label>
                <input type="file" class="form-control" name="dokumen_pendukung">
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select class="form-select" name="status" required>
                    <option value="Dijadwalkan">Dijadwalkan</option>
                    <option value="Berlangsung">Berlangsung</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admission.activity.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
