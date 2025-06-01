@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah SOP</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/sops">SOP</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah SOP</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Card untuk Form Tambah SOP -->
        <div class="card">
            <div class="card-body">
                <form action="/sops/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul SOP</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload File SOP (PDF)</label>
                        <input type="file" class="form-control" id="file" name="file" accept="application/pdf" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan SOP</button>
                        <a href="/sops" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
