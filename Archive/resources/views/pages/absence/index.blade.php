@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Data Absensi</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item" aria-current="page">HRD</li>
                    <li class="breadcrumb-item active" aria-current="page">Data Absensi</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="ms-auto">
        <a href="{{ asset('templates/absence_import_template.xlsx') }}" class="btn btn-success ms-2" download>Download Template Import</a>
        <!-- Import Absensi Button -->
        <a href="javascript:void(0)" id="importAbsensiButton" class="btn btn-primary">Import Absensi</a>
        
        <!-- Form for uploading file (hidden) -->
        <form id="importAbsensiForm" action="/absence/import" method="POST" enctype="multipart/form-data" style="display:none;">
            @csrf
            <input type="file" name="file" id="importFileInput" accept=".xls, .xlsx" onchange="this.form.submit()">
        </form>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Card untuk Tabel Data Absensi -->
        <div class="card">
            <div class="card-body">
                <table id="attendanceTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Shift</th>
                            <th>Karyawan</th>
                            <th>Clock In</th>
                            <th>Clock Out</th>
                            <th>Keterlambatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data Absensi akan ditambahkan disini -->
                        @foreach($absences as $absence)
                            <tr>
                                <td>{{ $absence->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($absence->schedule->date)->format('d-m-Y') }}</td>
                                <td>{{ $absence->schedule->shift->title }}</td>
                                <td>{{ $absence->schedule->employee->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($absence->clock_in)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($absence->clock_out)->format('H:i') }}</td>
                                <td>
                                    Tidak Terlambat
                                </td>
                                <td>
                                    <a href="/absence/edit/{{ $absence->id }}" class="btn btn-warning btn-sm">Edit Data</a>
                                    <a href="/absence/delete/{{ $absence->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data absensi ini?');" class="btn btn-danger btn-sm">Hapus Data</a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- Tambahkan data lainnya sesuai kebutuhan -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#attendanceTable').DataTable();
        
        // When clicking the "Import Absensi" button, trigger the file input click
        $('#importAbsensiButton').click(function() {
            $('#importFileInput').click();
        });
    });
</script>
@endsection
