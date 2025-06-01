@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($requestFotocopy) ? 'Edit' : 'Buat' }} Request Fotocopy</h3>
                </div>
                <div class="card-body">
                    <form action="{{ isset($requestFotocopy) ? route('request-fotocopy.update', $requestFotocopy->id) : route('request-fotocopy.store') }}" method="POST">
                        @csrf
                        @if(isset($requestFotocopy))
                            @method('PUT')
                        @endif

                        <div class="row">
                            @php $data = isset($requestFotocopy) ? $requestFotocopy : null; @endphp

                            <div class="col-md-6 mb-3">
                                <label>Kegiatan</label>
                                <input type="text" name="kegiatan" class="form-control @error('kegiatan') is-invalid @enderror" value="{{ old('kegiatan', $data->kegiatan ?? '') }}" required>
                                @error('kegiatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Subject</label>
                                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject', $data->subject ?? '') }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Kelas</label>
                                <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas', $data->kelas ?? '') }}" required>
                                @error('kelas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Tanggal Penggunaan</label>
                                <input type="date" name="tanggal_penggunaan" class="form-control @error('tanggal_penggunaan') is-invalid @enderror" value="{{ old('tanggal_penggunaan', $data->tanggal_penggunaan ?? '') }}" required>
                                @error('tanggal_penggunaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <h5>Detail Barang</h5>
                                <button type="button" class="btn btn-primary btn-sm mb-2" id="add-item">+ Tambah Item</button>
                            </div>
                        </div>

                        <div id="items-container">
                            <div class="row mb-2 item-row">
                                <div class="col-md-3">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama_barang[]" class="form-control @error('nama_barang.0') is-invalid @enderror" value="{{ old('nama_barang.0', isset($data) ? json_decode($data->nama_barang)[0] : '') }}" required>
                                    @error('nama_barang.0')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label>Jumlah Halaman</label>
                                    <input type="number" name="jumlah_halaman[]" class="form-control @error('jumlah_halaman.0') is-invalid @enderror" value="{{ old('jumlah_halaman.0', isset($data) ? json_decode($data->jumlah_halaman)[0] : '') }}" required min="1">
                                    @error('jumlah_halaman.0')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label>Jumlah Diperlukan</label>
                                    <input type="number" name="jumlah_diperlukan[]" class="form-control @error('jumlah_diperlukan.0') is-invalid @enderror" value="{{ old('jumlah_diperlukan.0', isset($data) ? json_decode($data->jumlah_diperlukan)[0] : '') }}" required min="1">
                                    @error('jumlah_diperlukan.0')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan[]" class="form-control @error('keterangan.0') is-invalid @enderror" value="{{ old('keterangan.0', isset($data) ? json_decode($data->keterangan)[0] : '') }}" required>
                                    @error('keterangan.0')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-1">
                                    <label>&nbsp;</label>
                                    <button type="button" class="btn btn-danger btn-sm remove-item">X</button>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('request-fotocopy.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('add-item').addEventListener('click', function () {
        let container = document.getElementById('items-container');
        let row = document.createElement('div');
        row.className = 'row mb-2 item-row';
        row.innerHTML = `
            <div class="col-md-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang[]" class="form-control" required>
            </div>
            <div class="col-md-2">
                <label>Jumlah Halaman</label>
                <input type="number" name="jumlah_halaman[]" class="form-control" min="1" required>
            </div>
            <div class="col-md-2">
                <label>Jumlah Diperlukan</label>
                <input type="number" name="jumlah_diperlukan[]" class="form-control" min="1" required>
            </div>
            <div class="col-md-4">
                <label>Keterangan</label>
                <input type="text" name="keterangan[]" class="form-control" required>
            </div>
            <div class="col-md-1">
                <label>&nbsp;</label>
                <button type="button" class="btn btn-danger btn-sm remove-item">X</button>
            </div>
        `;
        container.appendChild(row);
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-item')) {
            e.target.closest('.item-row').remove();
        }
    });
</script>
@endpush
@endsection
