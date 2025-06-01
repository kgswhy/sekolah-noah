@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Request Kurir / Mobil Operasional</h3>
        <div class="d-inline-block align-items-center">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Operasional</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="ms-auto">
        <a href="{{ route('operasional.create') }}" class="btn btn-primary">Tambah Request</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Tabel Request Kurir -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Request Kurir</h5>
                <table id="kurirTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Unit</th>
                            <th>Divisi</th>
                            <th>Request By</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Tujuan</th>
                            <th>Keperluan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kurirRequests as $r)
                        <tr>
                            <td>{{ $r->unit }}</td>
                            <td>{{ $r->divisi }}</td>
                            <td>{{ $r->request_by }}</td>
                            <td>{{ $r->jenis }}</td>
                            <td>{{ $r->tanggal }}</td>
                            <td>{{ $r->dari_jam }} - {{ $r->sampai_jam }}</td>
                            <td>{{ $r->tujuan }}</td>
                            <td>{{ $r->keperluan }}</td>
                            <td>{{ $r->keterangan }}</td>
                            <td>
                                <a href="{{ route('operasional.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('operasional.destroy', $r->id) }}"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')"
                                   class="btn btn-danger btn-sm">Hapus</a>

                                   
                                   <button type="button" class="btn btn-success btn-sm"
                                                            
                                   >Setuju
                               </button>
                               <button type="button" class="btn btn-danger btn-sm"
                                   >
                                   Tolak
                               </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Request Mobil -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Request Mobil</h5>
                <table id="mobilTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Unit</th>
                            <th>Divisi</th>
                            <th>Request By</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Tujuan</th>
                            <th>Keperluan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mobilRequests as $r)
                        <tr>
                            <td>{{ $r->unit }}</td>
                            <td>{{ $r->divisi }}</td>
                            <td>{{ $r->request_by }}</td>
                            <td>{{ $r->jenis }}</td>
                            <td>{{ $r->tanggal }}</td>
                            <td>{{ $r->dari_jam }} - {{ $r->sampai_jam }}</td>
                            <td>{{ $r->tujuan }}</td>
                            <td>{{ $r->keperluan }}</td>
                            <td>{{ $r->keterangan }}</td>
                            <td>
                                <a href="{{ route('operasional.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('operasional.destroy', $r->id) }}"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')"
                                   class="btn btn-danger btn-sm">Hapus</a>
                                    
                                   <button type="button" class="btn btn-success btn-sm"
                                                            
                                   >Setuju
                               </button>
                               <button type="button" class="btn btn-danger btn-sm"
                                   >
                                   Tolak
                               </button>
                                   
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#kurirTable').DataTable();
        $('#mobilTable').DataTable();
    });
</script>
@endsection
