@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Form Pengajuan Dana Bank</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item">Keuangan</li>
                <li class="breadcrumb-item"><a href="/pengajuan-dana-bank">Pengajuan Dana Bank</a></li>
                <li class="breadcrumb-item active">Buat Pengajuan</li>
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
                <label class="form-label">Nomor Pengajuan Bank</label>
                <input type="text" class="form-control">
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Unit</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Divisi</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Jenis Biaya</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Kode</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Kegiatan</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Nomor Invoice</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Pengajuan</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Pencairan</label>
                    <input type="date" class="form-control">
                </div>
            </div>

            <!-- Pembebanan -->
            <div class="mb-3">
                <label class="form-label">Pembebanan Berdasarkan</label>
                <select class="form-control" id="pembebanan-select">
                    <option value="">-- Pilih --</option>
                    <option value="karyawan">Karyawan</option>
                    <option value="siswa">Siswa</option>
                    <option value="none">Tidak Ada</option>
                </select>
            </div>

            <div id="pembebanan-fields"></div>

            <!-- Rincian Pengajuan -->
            <div class="mb-3">
                <label class="form-label">Rincian Pengajuan</label>
                <button type="button" class="btn btn-sm btn-success mb-2" onclick="addItem()">+ Tambah Item</button>
                <table class="table table-bordered" id="item-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Jumlah</th>
                            <th>Sub</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="item-body">
                        <!-- Dynamic rows here -->
                    </tbody>
                </table>
            </div>

            <!-- Perhitungan -->
            <div class="row">
                <div class="col-md-12 mt-3">
                    <label>Total</label>
                    <input type="number" class="form-control" id="total" readonly>
                </div>
                <div class="col-md-12 mt-3">
                    <label>PPN (11%)</label>
                    <input type="number" class="form-control" id="ppn" readonly>
                </div>
                <div class="col-md-12 mt-3">
                    <label>Total + PPN</label>
                    <input type="number" class="form-control" id="total_ppn" readonly>
                </div>
                <div class="col-md-12 mt-3">
                    <label>DP</label>
                    <input type="number" class="form-control" id="dp" oninput="calculateTotals()">
                </div>
                <div class="col-md-12 mt-3">
                    <label>Total Setelah DP</label>
                    <input type="number" class="form-control" id="after_dp" readonly>
                </div>
            </div>

            <div class="mb-3 mt-4">
                <label>Lampiran Dokumen</label>
                <input type="file" class="form-control" multiple>
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-3">
                <label>Metode Pembayaran</label>
                <select class="form-control" id="metode-pembayaran">
                    <option value="">-- Pilih --</option>
                    <option value="cash">Cash (Cek)</option>
                    <option value="transfer">Transfer</option>
                    <option value="va">Virtual Account (VA)</option>
                </select>
            </div>

            <div id="bank-info"></div>

            <div class="mb-3 mt-3">
                <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                <a href="/pengajuan-dana-bank" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let itemIndex = 0;

    function addItem() {
        itemIndex++;
        const tbody = document.getElementById('item-body');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${itemIndex}</td>
            <td><input type="text" class="form-control" name="keterangan[]" required></td>
            <td><input type="text" class="form-control" name="satuan[]" required></td>
            <td><input type="number" class="form-control qty" name="jumlah[]" value="0" oninput="calculateRow(this)" required></td>
            <td><input type="number" class="form-control pricesub" name="sub[]" value="0" oninput="calculateRow(this)" required></td>
            <td><input type="number" class="form-control row-total" name="total[]" value="0" readonly></td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="deleteRow(this)">Hapus</button></td>
        `;
        tbody.appendChild(row);
    }

    function deleteRow(button) {
        button.closest('tr').remove();
        updateRowNumbers();
        calculateTotals();
    }

    function updateRowNumbers() {
        const rows = document.querySelectorAll('#item-body tr');
        itemIndex = 0;
        rows.forEach((row, index) => {
            itemIndex++;
            row.children[0].innerText = itemIndex;
        });
    }

    function calculateRow(input) {
        const row = input.closest('tr');
        const qty = row.querySelector('.qty').valueAsNumber || 0;
        const pricesub = row.querySelector('.pricesub').valueAsNumber || 0;
        const total = qty * pricesub;
        row.querySelector('.row-total').value = total;
        calculateTotals();
    }

    function calculateTotals() {
        let total = 0;
        document.querySelectorAll('.row-total').forEach(el => {
            total += parseFloat(el.value) || 0;
        });

        const ppn = total * 0.11;
        const totalPpn = total + ppn;
        const dp = parseFloat(document.getElementById('dp').value) || 0;
        const afterDp = totalPpn - dp;

        document.getElementById('total').value = total.toFixed(0);
        document.getElementById('ppn').value = ppn.toFixed(0);
        document.getElementById('total_ppn').value = totalPpn.toFixed(0);
        document.getElementById('after_dp').value = afterDp.toFixed(0);
    }

    document.getElementById('pembebanan-select').addEventListener('change', function () {
        const container = document.getElementById('pembebanan-fields');
        container.innerHTML = '';
        if (this.value === 'karyawan' || this.value === 'siswa') {
            ['PGTK', 'SD', 'SMP'].forEach(label => {
                container.innerHTML += `
                    <div class="mb-2">
                        <label>${label} (%)</label>
                        <input type="number" class="form-control" name="${this.value}_${label.toLowerCase()}">
                    </div>
                `;
            });
        }
    });

    document.getElementById('metode-pembayaran').addEventListener('change', function () {
        const container = document.getElementById('bank-info');
        container.innerHTML = '';
        if (this.value === 'transfer' || this.value === 'va') {
            container.innerHTML = `
                <div class="mb-2">
                    <label>Bank</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-2">
                    <label>No Rekening / No VA</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Nama Rekening</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Nominal VA Terakhir</label>
                    <input type="number" class="form-control">
                </div>
            `;
        }
    });
</script>
@endsection
