@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Pengaturan Umum</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item">Pengaturan</li>
                    <li class="breadcrumb-item active" aria-current="page">Umum</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Pengaturan Aplikasi</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="app_name" class="form-label">Nama Aplikasi</label>
                        <input type="text" class="form-control" id="app_name" name="app_name" value="Sekolah Noah">
                    </div>
                    
                    <div class="mb-3">
                        <label for="app_description" class="form-label">Deskripsi Aplikasi</label>
                        <textarea class="form-control" id="app_description" name="app_description" rows="3">Aplikasi manajemen sekolah</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 