@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Kegiatan Admission</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item active">Kegiatan</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="{{ route('admission.activity.create') }}" class="btn btn-primary">Tambah Kegiatan</a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table id="activityTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Kegiatan</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $a)
                <tr>
                    <td>{{ $a->tanggal }}</td>
                    <td>{{ $a->kegiatan }}</td>
                    <td>{{ $a->status }}</td>
                    <td>{{ $a->keterangan }}</td>
                    <td>
                        @if($a->dokumen_pendukung)
                            <a href="{{ asset('storage/' . $a->dokumen_pendukung) }}" target="_blank">Lihat Dokumen</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admission.activity.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('admission.activity.destroy', $a->id) }}"
                            onclick="return confirm('Yakin ingin menghapus kegiatan ini?')"
                            class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#activityTable').DataTable();
    });
</script>
@endsection
