@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Detail SOP</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="/sops">SOP</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail SOP</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="ms-auto">
        <a href="/sops/edit/1" class="btn btn-warning">Edit SOP</a>
        <a href="/sops" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Card untuk Detail SOP -->
        <div class="card">
            <div class="card-body">
                <!-- Data Dummy SOP -->
                <h5><strong>ID:</strong> 1</h5>
                <h5><strong>Judul:</strong> SOP Pengajuan Cuti</h5>
                <h5><strong>Isi SOP:</strong></h5>
                <embed src="https://bpm.uai.ac.id/wp-content/uploads/2022/03/Pedoman-Pembuatan-Standar-Operasional-Prosedur-SOP-2019.pdf" width="100%" height="600px">
            </div>
        </div>
    </div>
</div>

@endsection
