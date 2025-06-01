@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Input Pembayaran Siswa</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item">Finance</li>
                <li class="breadcrumb-item active">Input Pembayaran</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form>
            <div class="mb-3">
                <label for="siswa" class="form-label">Pilih Siswa</label>
                <select id="siswa" class="form-select" onchange="isiDataSiswa()">
                    <option selected disabled>Pilih Siswa</option>
                    <option value="1" data-induk="20230123" data-kelas="10 IPA 1">Ahmad Fauzi</option>
                    <option value="2" data-induk="20230124" data-kelas="10 IPS 2">Siti Nurhaliza</option>
                    <option value="3" data-induk="20230125" data-kelas="11 IPA 2">Budi Hartono</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Induk Siswa</label>
                <input type="text" id="nomor_induk" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <input type="text" id="kelas" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="bulan_tahun" class="form-label">Bulan & Tahun</label>
                <input type="month" class="form-control" id="bulan_tahun" name="bulan_tahun" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
                <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran" required>
            </div>

            <div class="mb-3">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="number" class="form-control" id="nominal" name="nominal" required>
            </div>

            <div class="mb-3">
                <label for="denda" class="form-label">Denda</label>
                <input type="number" class="form-control" id="denda" name="denda" value="0">
            </div>

            <div class="mb-3">
                <label for="total_tagihan" class="form-label">Total Tagihan</label>
                <input type="number" class="form-control" id="total_tagihan" name="total_tagihan" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/finance/pembayaran-siswa" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function isiDataSiswa() {
        const select = document.getElementById("siswa");
        const selectedOption = select.options[select.selectedIndex];

        document.getElementById("nomor_induk").value = selectedOption.getAttribute("data-induk");
        document.getElementById("kelas").value = selectedOption.getAttribute("data-kelas");
    }
</script>
@endsection
