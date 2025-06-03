@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Tambah Surat Keluar</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item"><a href="/surat-keluar">Surat Keluar</a></li>
                <li class="breadcrumb-item active">Form Input</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nomor Surat</label>
                            <input type="text" class="form-control" name="nomor_surat" placeholder="Contoh: 001/SN-PGKG/02/05/II/2025" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Unit</label>
                            <input type="text" class="form-control" name="unit" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Divisi</label>
                            <input type="text" class="form-control" name="divisi" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Pembuat Surat</label>
                            <select class="form-control" name="pembuat_surat" required>
                                <option value="">-- Pilih --</option>
                                <option value="01">Direktur / Wadirek</option>
                                <option value="02">Akademik</option>
                                <option value="03">HRD</option>
                                <option value="04">Finance</option>
                                <option value="05">Administrasi</option>
                                <option value="06">IT</option>
                                <option value="07">Operasional</option>
                                <option value="08">Admission</option>
                                <option value="09">PSG</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Jenis Surat</label>
                            <select class="form-control" name="jenis_surat" required>
                                <option value="">-- Pilih --</option>
                                <option value="01">Surat Permohonan</option>
                                <option value="02">Surat Undangan</option>
                                <option value="03">Pemberitahuan / Pengumuman / Ucapan</option>
                                <option value="04">Keterangan / Rekomendasi / Pernyataan / Berita Acara</option>
                                <option value="05">Surat Tugas / Keputusan</option>
                                <option value="06">Surat Kerjasama</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Perihal Surat</label>
                            <input type="text" class="form-control" name="perihal_surat" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Tembusan</label>
                            <select class="form-control" name="tembusan[]">
                                <option>Wakil Direktur</option>
                                <option>Kepala Sekolah PGTK</option>
                                <option>Kepala Sekolah SD</option>
                                <option>Kepala Sekolah SMP</option>
                                <option>SPV Administrasi</option>
                                <option>SPV Finance</option>
                                <option>SPV IT</option>
                                <option>SPV Operasional</option>
                                <option>SPV HRD</option>
                                <option>SPV Admission</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Dokumen Surat (Upload PDF)</label>
                            <input type="file" class="form-control" name="dokumen_surat" accept=".pdf" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="/surat-keluar" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-info mb-4">
            <div class="card-header bg-info text-white">
                <strong>📘 Pedoman Penomoran Surat Keluar</strong>
            </div>
            <div class="card-body">
                <p><strong>Format Nomor Surat:</strong></p>
                <p><code>001/SN-[KODE UNIT]/[KODE PEMBUAT]/[KODE JENIS]/[ROMAWI BULAN]/[TAHUN]</code></p>

                <p><strong>Contoh Format per Unit:</strong></p>
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item">PGTK: <code>001/SN-PGKG/02/05/II/2025</code></li>
                    <li class="list-group-item">SD: <code>001/SN-EL/02/05/II/2025</code></li>
                    <li class="list-group-item">SMP: <code>001/SN-MS/02/05/II/2025</code></li>
                    <li class="list-group-item">HRD: <code>001/SN/03/01/II/2025</code></li>
                    <li class="list-group-item">Finance: <code>001/SN/04/01/II/2025</code></li>
                    <li class="list-group-item">Multi Unit: <code>001/SN/09/01/II/2025</code> <em>(Gunakan unit level tertinggi)</em></li>
                </ul>

                <p><strong>Kode Pembuat Surat:</strong></p>
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item">01 – Direktur / Wakil Direktur</li>
                    <li class="list-group-item">02 – Akademik</li>
                    <li class="list-group-item">03 – HRD</li>
                    <li class="list-group-item">04 – Finance</li>
                    <li class="list-group-item">05 – Administrasi</li>
                    <li class="list-group-item">06 – IT</li>
                    <li class="list-group-item">07 – Operasional</li>
                    <li class="list-group-item">08 – Admission</li>
                    <li class="list-group-item">09 – PSG</li>
                </ul>

                <p><strong>Kode Jenis Surat:</strong></p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">01 – Surat Permohonan</li>
                    <li class="list-group-item">02 – Surat Undangan</li>
                    <li class="list-group-item">03 – Surat Pemberitahuan / Pengumuman / Ucapan</li>
                    <li class="list-group-item">04 – Surat Keterangan / Rekomendasi / Pernyataan / Berita Acara</li>
                    <li class="list-group-item">05 – Surat Tugas / Keputusan</li>
                    <li class="list-group-item">06 – Surat Kerjasama</li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection
