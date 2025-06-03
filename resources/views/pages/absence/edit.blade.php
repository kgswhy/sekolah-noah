@extends('layouts/master-dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Absensi</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('absence.update', $absence->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" class="form-control" value="{{ $absence->schedule->employee->nik }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Nama Karyawan</label>
                            <input type="text" class="form-control" value="{{ $absence->schedule->employee->full_name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="text" class="form-control" value="{{ $absence->schedule->date }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Shift</label>
                            <input type="text" class="form-control" value="{{ $absence->schedule->shift->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Jam Masuk</label>
                            <input type="datetime-local" class="form-control @error('clock_in') is-invalid @enderror" 
                                name="clock_in" value="{{ $absence->clock_in ? Carbon\Carbon::parse($absence->clock_in)->format('Y-m-d\TH:i:s') : '' }}">
                            @error('clock_in')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jam Keluar</label>
                            <input type="datetime-local" class="form-control @error('clock_out') is-invalid @enderror" 
                                name="clock_out" value="{{ $absence->clock_out ? Carbon\Carbon::parse($absence->clock_out)->format('Y-m-d\TH:i:s') : '' }}">
                            @error('clock_out')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="present" {{ $absence->status == 'present' ? 'selected' : '' }}>Hadir</option>
                                <option value="late" {{ $absence->status == 'late' ? 'selected' : '' }}>Terlambat</option>
                                <option value="absent" {{ $absence->status == 'absent' ? 'selected' : '' }}>Tidak Hadir</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('absence.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 