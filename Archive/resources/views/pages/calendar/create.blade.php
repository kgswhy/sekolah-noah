@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah Kegiatan Kalender</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item"><a href="/dashboard/calendar">Kalender</a></li>
                <li class="breadcrumb-item active">Tambah Kegiatan</li>
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
                <label for="eventName" class="form-label">Nama Kegiatan</label>
                <input type="text" class="form-control" id="eventName" name="eventName" required>
            </div>
            <div class="mb-3">
                <label for="startDate" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="startDate" name="startDate" required>
            </div>
            <div class="mb-3">
                <label for="endDate" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control" id="endDate" name="endDate" required>
            </div>
            <div class="mb-3">
                <label for="responsiblePerson" class="form-label">Penanggung Jawab</label>
                <input type="text" class="form-control" id="responsiblePerson" name="responsiblePerson" required>
            </div>
            <div class="mb-3">
                <label for="remarks" class="form-label">Keterangan</label>
                <textarea class="form-control" id="remarks" name="remarks" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="planned">Planned</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan Kegiatan</button>
                <a href="/dashboard/calendar" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

@endsection
