@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah Aktiva Tetap</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item">Finance</li>
                <li class="breadcrumb-item"><a href="/finance/aktiva-tetap">Aktiva Tetap</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
            </div>

            <div class="mb-3">
                <label for="nomor_barang" class="form-label">Nomor Barang (Tagging)</label>
                <input type="text" class="form-control" id="nomor_barang" name="nomor_barang" required>
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required>
            </div>

            <div class="mb-3">
                <label for="kode_akun" class="form-label">Klasifikasi Akun (Nomor)</label>
                <input type="text" class="form-control" id="kode_akun" name="kode_akun" required>
            </div>

            <div class="mb-3">
                <label for="nama_akun" class="form-label">Klasifikasi Akun (Nama)</label>
                <input type="text" class="form-control" id="nama_akun" name="nama_akun" required>
            </div>

            <div class="mb-3">
                <label for="lokasi_unit" class="form-label">Lokasi (Unit)</label>
                <input type="text" class="form-control" id="lokasi_unit" name="lokasi_unit" required>
            </div>

            <div class="mb-3">
                <label for="lokasi_ruangan" class="form-label">Lokasi (Ruangan)</label>
                <input type="text" class="form-control" id="lokasi_ruangan" name="lokasi_ruangan" required>
            </div>

            <div class="mb-3">
                <label for="tgl_perolehan" class="form-label">Tanggal Perolehan / Pembelian</label>
                <input type="date" class="form-control" id="tgl_perolehan" name="tgl_perolehan" required>
            </div>

            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi Fisik</label>
                <select class="form-select" id="kondisi" name="kondisi" required>
                    <option selected disabled>Pilih Kondisi</option>
                    <option>Baik</option>
                    <option>Rusak Ringan</option>
                    <option>Rusak Berat</option>
                    <option>Hilang</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="penjelasan" class="form-label">Penjelasan</label>
                <textarea class="form-control" id="penjelasan" name="penjelasan" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/finance/aktiva-tetap" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
