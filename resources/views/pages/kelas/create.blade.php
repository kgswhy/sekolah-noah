@extends('layouts.master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah Kelas</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ url('kelas') }}">Kelas</a></li>
                <li class="breadcrumb-item active">Tambah Kelas</li>
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
                <!-- Form to create a new Kelas -->
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="kelasName" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" id="kelasName" name="kelasName" required>
                    </div>
                    <div class="mb-3">
                        <label for="gedung" class="form-label">Gedung</label>
                        <input type="text" class="form-control" id="gedung" name="gedung" required>
                    </div>
                    <div class="mb-3">
                        <label for="ruangan" class="form-label">Ruangan</label>
                        <input type="text" class="form-control" id="ruangan" name="ruangan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Kelas</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
