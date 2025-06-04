@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Edit Pendaftaran</h3>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admission.update', $registration->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Nama Siswa</label>
                        <input type="text" class="form-control" name="nama_siswa" value="{{ $registration->nama_siswa }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Tujuan Kelas</label>
                        <input type="text" class="form-control" name="tujuan_kelas" value="{{ $registration->tujuan_kelas }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Asal Sekolah</label>
                        <input type="text" class="form-control" name="asal_sekolah" value="{{ $registration->asal_sekolah }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select class="form-select" name="status" required>
                            @foreach(['Proses', 'Diterima', 'Ditolak'] as $status)
                                <option value="{{ $status }}" {{ $registration->status == $status ? 'selected' : '' }}>{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach(['pembayaran', 'observasi', 'pengumuman', 'id_card'] as $field)
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" name="{{ $field }}" id="{{ $field }}" {{ $registration->$field ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $field }}">{{ ucfirst($field) }}</label>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admission.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
