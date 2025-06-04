@extends('layouts.master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah Pengumuman</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item"><a href="/pengumuman">Pengumuman</a></li>
                <li class="breadcrumb-item active">Tambah Pengumuman</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Pengumuman</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="kepada" class="form-label">Kepada</label>
                        <input type="text" class="form-control" id="kepada" name="kepada" required>
                    </div>
                    <div class="mb-3">
                        <label for="pengumuman" class="form-label">Pengumuman</label>
                        <textarea class="form-control" id="pengumuman" name="pengumuman" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="lampiran" class="form-label">Lampiran</label>
                        <input type="file" class="form-control" id="lampiran" name="lampiran">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan Pengumuman</button>
                        <a href="/pengumuman" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('pengumuman');
</script>
@endsection