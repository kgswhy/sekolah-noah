@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Edit Request Kurir / Mobil</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item">Operasional</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
@php
    $employee = Auth::user()->employee ?? null;
    $unit = $employee?->unit ?? old('unit', $request->unit);
    $division = $employee?->division ?? old('divisi', $request->divisi);
    $requestBy = Auth::user()->name ?? old('request_by', $request->request_by);
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('operasional.update', $request->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Unit</label>
                        <input type="text" name="unit" class="form-control" value="{{ $unit }}"
                            {{ $employee?->unit ? 'readonly' : 'required' }}>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Divisi</label>
                        <input type="text" name="divisi" class="form-control" value="{{ $division }}"
                            {{ $employee?->division ? 'readonly' : 'required' }}>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Request By</label>
                        <input type="text" name="request_by" class="form-control" value="{{ $requestBy }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis</label>
                        <select name="jenis" class="form-select" required>
                            <option value="Kurir" {{ old('jenis', $request->jenis) == 'Kurir' ? 'selected' : '' }}>Kurir</option>
                            <option value="Mobil" {{ old('jenis', $request->jenis) == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $request->tanggal) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dari Jam</label>
                        <input type="time" name="dari_jam" class="form-control" value="{{ old('dari_jam', $request->dari_jam) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sampai Jam</label>
                        <input type="time" name="sampai_jam" class="form-control" value="{{ old('sampai_jam', $request->sampai_jam) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tujuan</label>
                        <input type="text" name="tujuan" class="form-control" value="{{ old('tujuan', $request->tujuan) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keperluan</label>
                        <textarea name="keperluan" class="form-control" required>{{ old('keperluan', $request->keperluan) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control">{{ old('keterangan', $request->keterangan) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('operasional.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
