@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Pembayaran Siswa - Tuition Fee</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item">Finance</li>
                <li class="breadcrumb-item active">Pembayaran Siswa</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <a href="/finance/pembayaran-siswa/create" class="btn btn-primary">Input Pembayaran</a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered" id="paymentTable">
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Nomor Induk</th>
                    <th>Kelas</th>
                    <th>Bulan & Tahun</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Nominal</th>
                    <th>Denda</th>
                    <th>Total Tagihan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ahmad Fauzi</td>
                    <td>20230123</td>
                    <td>10 IPA 1</td>
                    <td>April 2025</td>
                    <td>10-04-2025</td>
                    <td>500,000</td>
                    <td>0</td>
                    <td>500,000</td>
                </tr>
                <tr>
                    <td>Siti Nurhaliza</td>
                    <td>20230124</td>
                    <td>10 IPS 2</td>
                    <td>April 2025</td>
                    <td>12-04-2025</td>
                    <td>500,000</td>
                    <td>20,000</td>
                    <td>520,000</td>
                </tr>
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
        $('#paymentTable').DataTable();
    });
</script>
@endsection
