@extends('layouts.master-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Permintaan ATK</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('request-atk.update', $requestAtk->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{ $employee->full_name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Induk Karyawan</label>
                                    <input type="text" class="form-control" value="{{ $employee->nik }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Unit</label>
                                    <input type="text" class="form-control" value="{{ $employee->unit }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Divisi</label>
                                    <input type="text" class="form-control" value="{{ $employee->division }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status Karyawan</label>
                                    <input type="text" class="form-control" value="{{ $employee->employee_status }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" class="form-control" value="{{ $employee->position }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Detail Barang</label>
                                    <div id="barang-container">
                                        @php
                                            $namaBarang = $requestAtk->nama_barang ?? [];
                                            $jumlah = $requestAtk->jumlah ?? [];
                                            $satuan = $requestAtk->satuan ?? [];
                                            $keterangan = $requestAtk->keterangan ?? [];
                                            $count = count($namaBarang);
                                        @endphp
                                        @for($i = 0; $i < $count; $i++)
                                        <div class="row mb-3 barang-item">
                                            <div class="col-md-3">
                                                <input type="text" name="nama_barang[]" class="form-control" placeholder="Nama Barang" value="{{ $namaBarang[$i] ?? '' }}" required>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" value="{{ $jumlah[$i] ?? '' }}" required min="1">
                                            </div>
                                            <div class="col-md-3">
                                                <select name="satuan[]" class="form-control" required>
                                                    <option value="">Pilih Satuan</option>
                                                    <option value="pcs" {{ ($satuan[$i] ?? '') == 'pcs' ? 'selected' : '' }}>PCS</option>
                                                    <option value="box" {{ ($satuan[$i] ?? '') == 'box' ? 'selected' : '' }}>Box</option>
                                                    <option value="pack" {{ ($satuan[$i] ?? '') == 'pack' ? 'selected' : '' }}>Pack</option>
                                                    <option value="rim" {{ ($satuan[$i] ?? '') == 'rim' ? 'selected' : '' }}>Rim</option>
                                                    <option value="buah" {{ ($satuan[$i] ?? '') == 'buah' ? 'selected' : '' }}>Buah</option>
                                                    <option value="set" {{ ($satuan[$i] ?? '') == 'set' ? 'selected' : '' }}>Set</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="keterangan[]" class="form-control" placeholder="Keterangan" value="{{ $keterangan[$i] ?? '' }}" required>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-danger btn-sm hapus-barang">
                                                   hapus
                                                </button>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm mt-2" id="tambah-barang">
                                        <i class="bi bi-plus-circle"></i> Tambah Barang
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('request-atk.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Add new barang item
        $('#tambah-barang').click(function() {
            var newItem = `
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
                        <button type="button" class="btn btn-danger btn-sm hapus-barang">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            $('#barang-container').append(newItem);
        });

        // Remove barang item
        $(document).on('click', '.hapus-barang', function() {
            if ($('.barang-item').length > 1) {
                $(this).closest('.barang-item').remove();
            } else {
                alert('Minimal harus ada satu barang');
            }
        });
    });
</script>
@endpush
@endsection 