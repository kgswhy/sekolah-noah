@extends('layouts/master-dashboard')

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Detail Peminjaman Ruangan</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Peminjaman Ruangan</li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="ms-auto">
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                <i class="las la-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Informasi Peminjaman</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th width="35%">Nama Karyawan</th>
                        <td>{{ $peminjaman->nama_karyawan }}</td>
                    </tr>
                    <tr>
                        <th>Unit</th>
                        <td>{{ $peminjaman->unit }}</td>
                    </tr>
                    <tr>
                        <th>Departemen</th>
                        <td>{{ $peminjaman->departemen }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pengajuan</th>
                        <td>{{ $peminjaman->tanggal_pengajuan }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Diperlukan</th>
                        <td>{{ $peminjaman->tanggal_diperlukan }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Pelaksanaan</th>
                        <td>{{ $peminjaman->waktu_pelaksanaan }}</td>
                    </tr>
                    <tr>
                        <th>Nama Kegiatan</th>
                        <td>{{ $peminjaman->nama_kegiatan }}</td>
                    </tr>
                    <tr>
                        <th>Tempat Kegiatan</th>
                        <td>{{ $peminjaman->tempat_kegiatan }}</td>
                    </tr>
                    <tr>
                        <th>Ruangan</th>
                        <td>
                            <ul class="mb-0">
                                @foreach(json_decode($peminjaman->ruangan) as $i => $ruang)
                                    <li>
                                        <strong>{{ $ruang }}</strong>
                                        <br>
                                        Jumlah: {{ json_decode($peminjaman->jumlah)[$i] ?? '-' }}<br>
                                        Keterangan: {{ json_decode($peminjaman->keterangan)[$i] ?? '-' }}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 