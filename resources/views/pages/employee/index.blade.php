@extends('layouts/master-dashboard')

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Data Karyawan</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">HRD</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="ms-auto">
            <a href="/employee/create" class="btn btn-primary">Tambah Karyawan</a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Tabs -->
            <ul class="nav nav-tabs mb-3" id="employeeTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="aktif-tab" data-bs-toggle="tab" data-bs-target="#aktif"
                        type="button" role="tab">Karyawan Aktif</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nonaktif-tab" data-bs-toggle="tab" data-bs-target="#nonaktif"
                        type="button" role="tab">Karyawan Tidak Aktif</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="employeeTabsContent">
                <!-- Karyawan Aktif -->
                <div class="tab-pane fade show active" id="aktif" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <table id="aktifTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nomor Induk</th>
                                        <th>Nama Lengkap</th>
                                        <th>Unit</th>
                                        <th>Divisi</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees->where('employee_status', 'aktif') as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->employee_number }}</td>
                                            <td>{{ $employee->full_name }}</td>
                                            <td>{{ $employee->unit }}</td>
                                            <td>{{ $employee->division }}</td>
                                            <td>{{ $employee->position }}</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                            <td>{{ \Carbon\Carbon::parse($employee->entry_date)->format('d-m-Y') }}</td>
                                            <td>
                                                <a href="/employee/{{ $employee->id }}/salary-components"
                                                    class="btn btn-primary btn-sm">Komponen Gaji</a>
                                                <a href="/employee/edit/{{ $employee->id }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <a href="/employee/delete/{{ $employee->id }}"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data karyawan ini?');"
                                                    class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Karyawan Tidak Aktif -->
                <div class="tab-pane fade" id="nonaktif" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <table id="nonaktifTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nomor Induk</th>
                                        <th>Nama Lengkap</th>
                                        <th>Unit</th>
                                        <th>Divisi</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees->where('employee_status', 'tidak aktif') as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>{{ $employee->employee_number }}</td>
                                            <td>{{ $employee->full_name }}</td>
                                            <td>{{ $employee->unit }}</td>
                                            <td>{{ $employee->division }}</td>
                                            <td>{{ $employee->position }}</td>
                                            <td><span class="badge bg-secondary">Tidak Aktif</span></td>
                                            <td>{{ \Carbon\Carbon::parse($employee->entry_date)->format('d-m-Y') }}</td>
                                            <td>
                                                <a href="/employee/{{ $employee->id }}/salary-components"
                                                    class="btn btn-primary btn-sm">Komponen Gaji</a>
                                                <a href="/employee/edit/{{ $employee->id }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <a href="/employee/delete/{{ $employee->id }}"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data karyawan ini?');"
                                                    class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#aktifTable').DataTable();
            $('#nonaktifTable').DataTable();
        });
    </script>
@endsection
