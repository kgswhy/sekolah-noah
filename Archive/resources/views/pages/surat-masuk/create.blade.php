@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah Surat Masuk</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item"><a href="/surat-masuk">Surat Masuk</a></li>
                <li class="breadcrumb-item active">Form Input</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama Surat / Dokumen</label>
                    <input type="text" class="form-control" name="nama_surat" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tanggal Diterima</label>
                    <input type="date" class="form-control" name="tanggal_diterima" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Unit</label>
                    <input type="text" class="form-control" name="unit" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Divisi</label>
                    <input type="text" class="form-control" name="divisi" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Tujuan Surat</label>
                    <input type="text" class="form-control" name="tujuan" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Status Surat</label>
                    <select class="form-control" name="status" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Telah Diserahkan">Telah Diserahkan</option>
                    </select>
                </div>
                <div class="col-md-8 mb-3">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" rows="3" required></textarea>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/surat-masuk" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
