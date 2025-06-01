@extends('layouts/master-dashboard')

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Tambah Peminjaman Ruangan</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Peminjaman Ruangan</li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Peminjaman</li>
                    </ol>
                </nav>
            </div>
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
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan"
                        value="{{ old('nama_karyawan', $defaultData['nama_karyawan']) }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit"
                        value="{{ old('unit', $defaultData['unit']) }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="departemen" class="form-label">Divisi</label>
                    <input type="text" class="form-control" id="departemen" name="departemen"
                        value="{{ old('departemen', $defaultData['departemen']) }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                    <input type="date" class="form-control" id="tanggal_pengajuan"
                        name="tanggal_pengajuan" value="{{ old('tanggal_pengajuan', $defaultData['tanggal_pengajuan']) }}"
                        readonly required>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_diperlukan" class="form-label">Tanggal Diperlukan</label>
                    <input type="date" class="form-control" id="tanggal_diperlukan"
                        name="tanggal_diperlukan" value="{{ old('tanggal_diperlukan') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan</label>
                    <input type="text" class="form-control" id="waktu_pelaksanaan"
                        name="waktu_pelaksanaan" placeholder="Contoh: 09:00 - 12:00"
                        value="{{ old('waktu_pelaksanaan', $defaultData['waktu_pelaksanaan']) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan"
                        value="{{ old('nama_kegiatan', $defaultData['nama_kegiatan']) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tempat_kegiatan" class="form-label">Tempat Kegiatan</label>
                    <input type="text" class="form-control" id="tempat_kegiatan" name="tempat_kegiatan"
                        value="{{ old('tempat_kegiatan', $defaultData['tempat_kegiatan']) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ruangan" class="form-label">Pilih Ruangan</label>
                    <select multiple class="form-control" id="ruangan" name="ruangan[]" required>
                        @php
                            $selectedRooms = old('ruangan', $defaultData['ruangan']);
                        @endphp
                        <option value="Ruang A" {{ in_array('Ruang A', $selectedRooms) ? 'selected' : '' }}>Ruang A</option>
                        <option value="Ruang B" {{ in_array('Ruang B', $selectedRooms) ? 'selected' : '' }}>Ruang B</option>
                        <option value="Ruang C" {{ in_array('Ruang C', $selectedRooms) ? 'selected' : '' }}>Ruang C</option>
                        <option value="Ruang D" {{ in_array('Ruang D', $selectedRooms) ? 'selected' : '' }}>Ruang D</option>
                        <option value="Ruang Meeting" {{ in_array('Ruang Meeting', $selectedRooms) ? 'selected' : '' }}>Ruang Meeting</option>
                        <option value="Aula" {{ in_array('Aula', $selectedRooms) ? 'selected' : '' }}>Aula</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="jumlah" class="form-label">Jumlah Ruangan</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah[]"
                        min="1" value="{{ old('jumlah.0', $defaultData['jumlah'][0]) }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan[]" rows="1">{{ old('keterangan.0', $defaultData['keterangan'][0]) }}</textarea>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#ruangan').select2({
                placeholder: "Pilih ruangan",
                allowClear: true
            });
        });
    </script>
@endsection
