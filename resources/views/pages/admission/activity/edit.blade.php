@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Edit Kegiatan</h3>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admission.activity.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="{{ $activity->tanggal }}" required>
            </div>
            <div class="mb-3">
                <label>Kegiatan</label>
                <input type="text" class="form-control" name="kegiatan" value="{{ $activity->kegiatan }}" required>
            </div>
            <div class="mb-3">
                <label>Deskripsi Kegiatan</label>
                <textarea class="form-control" name="deskripsi_kegiatan" rows="4" required>{{ $activity->deskripsi_kegiatan }}</textarea>
            </div>
            <div class="mb-3">
                <label>Dokumen Pendukung</label>
                @if($activity->dokumen_pendukung)
                    <div class="mb-2">
                        <a href="{{ asset('storage/' . $activity->dokumen_pendukung) }}" target="_blank">Lihat Dokumen</a>
                    </div>
                @endif
                <input type="file" class="form-control" name="dokumen_pendukung">
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select class="form-select" name="status" required>
                    @foreach(['Dijadwalkan', 'Berlangsung', 'Selesai'] as $status)
                        <option value="{{ $status }}" {{ $activity->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="{{ $activity->keterangan }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admission.activity.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
