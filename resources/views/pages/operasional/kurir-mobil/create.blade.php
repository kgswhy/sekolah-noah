@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah Request Kurir / Mobil</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item">Operasional</li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
@php
    $employee = Auth::user()->employee ?? null;
    $unit = $employee?->unit ?? old('unit');
    $division = $employee?->division ?? old('divisi');
    $requestBy = Auth::user()->name ?? old('request_by');
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('operasional.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Unit</label>
                        <input type="text" name="unit" class="form-control" value="{{ $unit }}"
                            {{ $unit ? 'readonly' : 'required' }}>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Divisi</label>
                        <input type="text" name="divisi" class="form-control" value="{{ $division }}"
                            {{ $division ? 'readonly' : 'required' }}>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Request By</label>
                        <input type="text" name="request_by" class="form-control" value="{{ $requestBy }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis</label>
                        <select name="jenis" class="form-select" required>
                            <option value="Kurir">Kurir</option>
                            <option value="Mobil">Mobil</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dari Jam</label>
                        <input type="time" name="dari_jam" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sampai Jam</label>
                        <input type="time" name="sampai_jam" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tujuan</label>
                        <input type="text" name="tujuan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keperluan</label>
                        <textarea name="keperluan" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('operasional.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
