@extends('layouts.master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Kelas</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active">Kelas</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="{{ url('kelas/create') }}" class="btn btn-primary">+ Tambah Kelas</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!-- Table for Kelas -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kelas</th>
                            <th>Gedung</th>
                            <th>Ruangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dummy data for Kelas -->
                        <tr>
                            <td>1</td>
                            <td>Kelas A</td>
                            <td>Gedung 1</td>
                            <td>Ruangan 101</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kelas B</td>
                            <td>Gedung 2</td>
                            <td>Ruangan 102</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kelas C</td>
                            <td>Gedung 3</td>
                            <td>Ruangan 103</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
