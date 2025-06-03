@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Daftar Pengajuan Dana</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item">Finance</li>
                <li class="breadcrumb-item active">Pengajuan Dana</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <a href="/pengajuan-dana-bank/create" class="btn btn-primary mb-3">+ Buat Pengajuan</a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="pengajuanTable">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nomor Pengajuan</th>
                        <th>Unit</th>
                        <th>Divisi</th>
                        <th>Jenis Biaya</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Posisi Approval</th>
                        <th>Download PDF</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp

                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>PJB-001</td>
                        <td>Unit A</td>
                        <td>Keuangan</td>
                        <td>Operasional</td>
                        <td>2025-05-10</td>
                        <td><span class="badge bg-warning text-dark">Menunggu Approval</span></td>
                        <td>Budi Nugroho</td>
                        <td><a href="#" class="btn btn-sm btn-success">Download</a></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Detail</a>
                        </td>
                    </tr>

                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>PJB-002</td>
                        <td>Unit B</td>
                        <td>SDM</td>
                        <td>Rekrutmen</td>
                        <td>2025-05-09</td>
                        <td><span class="badge bg-success">Disetujui</span></td>
                        <td>Andi Setiawan</td>
                        <td><a href="#" class="btn btn-sm btn-success">Download</a></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Detail</a>
                        </td>
                    </tr>

                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>PJB-003</td>
                        <td>Unit C</td>
                        <td>Operasional</td>
                        <td>Maintenance</td>
                        <td>2025-05-08</td>
                        <td><span class="badge bg-danger">Ditolak</span></td>
                        <td>Sari Sukawati</td>
                        <td><a href="#" class="btn btn-sm btn-success">Download</a></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
