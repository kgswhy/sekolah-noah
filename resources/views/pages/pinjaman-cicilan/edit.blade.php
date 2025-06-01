@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Edit Pengajuan Pinjaman</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('pinjaman.index') }}">Pinjaman & Cicilan</a></li>
                <li class="breadcrumb-item active">Edit Pengajuan</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Pengajuan Pinjaman</h5>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('pinjaman.update', $pinjaman->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3 row">
                <label class="col-form-label col-md-3">Nama Karyawan</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="{{ $pinjaman->employee->full_name }}" readonly>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label class="col-form-label col-md-3">Nomor Induk</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="{{ $pinjaman->employee->employee_number }}" readonly>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="jumlah_pinjaman" class="col-form-label col-md-3">Jumlah Pinjaman</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" id="jumlah_pinjaman" name="jumlah_pinjaman" value="{{ old('jumlah_pinjaman', $pinjaman->jumlah_pinjaman) }}" required>
                    </div>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="tujuan_pinjaman" class="col-form-label col-md-3">Tujuan Pinjaman</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="tujuan_pinjaman" name="tujuan_pinjaman" value="{{ old('tujuan_pinjaman', $pinjaman->tujuan_pinjaman) }}" required>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="jangka_waktu" class="col-form-label col-md-3">Jangka Waktu (bulan)</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="jangka_waktu" name="jangka_waktu" min="1" max="36" value="{{ old('jangka_waktu', $pinjaman->jangka_waktu) }}" required>
                    <small class="text-muted">Maksimal 36 bulan (3 tahun)</small>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="tanggal_pengajuan" class="col-form-label col-md-3">Tanggal Pengajuan</label>
                <div class="col-md-9">
                    <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" value="{{ old('tanggal_pengajuan', $pinjaman->tanggal_pengajuan) }}" required>
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="dokumen_pendukung" class="col-form-label col-md-3">Dokumen Pendukung</label>
                <div class="col-md-9">
                    <input type="file" class="form-control" id="dokumen_pendukung" name="dokumen_pendukung">
                    <small class="text-muted">Format: PDF, JPG, JPEG, PNG (Maks: 2MB)</small>
                    
                    @if($pinjaman->dokumen_pendukung)
                    <div class="mt-2">
                        <a href="{{ route('pinjaman.preview', $pinjaman->id) }}" target="_blank" class="btn btn-sm btn-light">
                            <i class="fas fa-file-alt"></i> Lihat Dokumen Saat Ini
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="col-md-9 offset-md-3">
                    <div id="cicilan_preview" class="alert alert-info">
                        <h6 class="alert-heading">Simulasi Cicilan:</h6>
                        <div>Jumlah Pinjaman: <span id="preview_pinjaman">Rp {{ number_format($pinjaman->jumlah_pinjaman, 0, ',', '.') }}</span></div>
                        <div>Jangka Waktu: <span id="preview_waktu">{{ $pinjaman->jangka_waktu }}</span> bulan</div>
                        <div>Cicilan per Bulan: <span id="preview_cicilan">Rp {{ number_format($pinjaman->cicilan_per_bulan, 0, ',', '.') }}</span></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary">Update Pinjaman</button>
                    <a href="{{ route('pinjaman.index') }}" class="btn btn-secondary ms-2">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const jumlahInput = document.getElementById('jumlah_pinjaman');
        const jangkaInput = document.getElementById('jangka_waktu');
        const previewDiv = document.getElementById('cicilan_preview');
        const previewPinjaman = document.getElementById('preview_pinjaman');
        const previewWaktu = document.getElementById('preview_waktu');
        const previewCicilan = document.getElementById('preview_cicilan');
        
        function updatePreview() {
            const jumlah = parseFloat(jumlahInput.value) || 0;
            const jangka = parseFloat(jangkaInput.value) || 0;
            
            if (jumlah > 0 && jangka > 0) {
                const cicilan = jumlah / jangka;
                
                previewPinjaman.textContent = 'Rp ' + jumlah.toLocaleString('id-ID');
                previewWaktu.textContent = jangka;
                previewCicilan.textContent = 'Rp ' + cicilan.toLocaleString('id-ID', {maximumFractionDigits: 2});
            }
        }
        
        jumlahInput.addEventListener('input', updatePreview);
        jangkaInput.addEventListener('input', updatePreview);
    });
</script>
@endsection 