@extends('layouts.master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah Permintaan ATK</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active">Tambah Permintaan</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('request-atk.store') }}" method="POST">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{ $employee->full_name }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Nomor Induk Karyawan</label>
                    <input type="text" name="nomor_induk_karyawan" class="form-control" value="{{ $employee->nik }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Unit</label>
                    <input type="text" name="unit" class="form-control" value="{{ $employee->unit }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Divisi</label>
                    <input type="text" name="divisi" class="form-control" value="{{ $employee->division }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Status Karyawan</label>
                    <input type="text" name="status_karyawan" class="form-control" value="{{ $employee->employee_status }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ $employee->position }}" readonly required>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label>Detail Barang</label>
                        <div id="barang-container">
                            <div class="row mb-3 barang-item">
                                <div class="col-md-3">
                                    <input type="text" name="nama_barang[]" class="form-control" placeholder="Nama Barang" required>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required min="1">
                                </div>
                                <div class="col-md-3">
                                    <select name="satuan[]" class="form-control" required>
                                        <option value="">Pilih Satuan</option>
                                        <option value="pcs">PCS</option>
                                        <option value="box">Box</option>
                                        <option value="pack">Pack</option>
                                        <option value="rim">Rim</option>
                                        <option value="buah">Buah</option>
                                        <option value="set">Set</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="keterangan[]" class="form-control" placeholder="Keterangan" required>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger btn-sm hapus-barang">hapus</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm mt-2" id="tambah-barang">
                            <i class="bi bi-plus-circle"></i> Tambah Barang
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('request-atk.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Add new barang item
        $('#tambah-barang').on('click', function() {
            let row = `
                <div class="row mb-3 barang-item">
                    <div class="col-md-3">
                        <input type="text" name="nama_barang[]" class="form-control" placeholder="Nama Barang" required>
                    </div>
                    <div class="col-md-3">
                        <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" required min="1">
                    </div>
                    <div class="col-md-3">
                        <select name="satuan[]" class="form-control" required>
                            <option value="">Pilih Satuan</option>
                            <option value="pcs">PCS</option>
                            <option value="box">Box</option>
                            <option value="pack">Pack</option>
                            <option value="rim">Rim</option>
                            <option value="buah">Buah</option>
                            <option value="set">Set</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="keterangan[]" class="form-control" placeholder="Keterangan" required>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm hapus-barang">hapus</button>
                    </div>
                </div>
            `;
            $('#barang-container').append(row);
        });

        // Remove barang item
        $(document).on('click', '.hapus-barang', function() {
            $(this).closest('.barang-item').remove();
        });
    });
</script>
@endpush