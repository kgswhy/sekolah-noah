@extends('layouts/master-dashboard')

@section('header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Data Siswa</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Administrasi</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Add Student Button in Header -->
        <div>
            <a href="/students/create" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table mb-0" id="studentTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Nomor Induk Sekolah Nasional</th>
                                    <th scope="col">Nomor Induk Sekolah</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <th scope="row">{{ $student->id }}</th>
                                        <td>{{ $student->full_name }}</td>
                                        <td>{{ $student->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        <td>{{ $student->national_school_id }}</td>
                                        <td>{{ $student->school_id }}</td>
                                        <td>{{ $student->class }}</td>
                                        <td>
                                            <!-- View Button -->
                                            <a href="/students/show/{{ $student->id }}" class="btn btn-info btn-sm">View</a>
                                            <!-- Edit Button -->
                                            <a href="/students/edit/{{ $student->id }}" class="btn btn-warning btn-sm">Edit</a>
                                            <!-- Delete Button -->
                                            <form action="/students/delete/{{ $student->id }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@endsection

@section('scripts')
    <!-- DataTables CDN -->
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#studentTable').DataTable({
                // Optional: You can add configurations here for DataTable like pagination, sorting, etc.
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true
            });
        });
    </script>
@endsection
