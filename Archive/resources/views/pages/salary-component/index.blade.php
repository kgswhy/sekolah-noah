<!-- resources/views/pages/salary-component/index.blade.php -->

@extends('layouts.master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Komponen Gaji: {{ $employee->name }}</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item" aria-current="page">HRD</li>
                    <li class="breadcrumb-item" aria-current="page"><a href="/employee">Data Karyawan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Komponen Gaji</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="ms-auto">
    <a href="{{ route('salary-components.create', $employee->id) }}" class="btn btn-primary">Tambah Komponen Gaji</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach($salaryComponents as $component)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $component->title }}</td>
                                <td>{{ $component->description }}</td>
                                <td>Rp {{ number_format($component->amount) }}</td>
                                <td>
                                    <a href="{{ route('salary-components.edit', [$employee->id, $component->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('salary-components.destroy', [$employee->id, $component->id]) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total Gaji</strong></td>
                            <td><strong>Rp {{ number_format($salaryComponents->sum('amount')) }}</strong></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
