@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah Regulasi</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/regulasi">Regulasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Regulasi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Card untuk Form Tambah Regulasi -->
        <div class="card">
            <div class="card-body">
                <form action="/regulasi/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Regulasi</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload PDF Regulasi</label>
                        <input type="file" class="form-control" id="file" name="file" accept="application/pdf" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan Regulasi</button>
                        <a href="/regulasi" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
