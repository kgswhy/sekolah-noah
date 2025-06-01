@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Buat Permintaan Design</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item"><a href="/permintaan-design">Permintaan Design</a></li>
                <li class="breadcrumb-item active">Form Permintaan</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="alert alert-warning">
            <strong>⚠️ Pengajuan dilakukan minimal satu minggu sebelum tanggal deadline.</strong>
        </div>
        <form action="{{ route('permintaan-design.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $defaultData['nama'] }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $defaultData['email'] }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Unit</label>
                    <input type="text" class="form-control" name="unit" value="{{ $defaultData['unit'] }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Divisi</label>
                    <input type="text" class="form-control" name="divisi" value="{{ $defaultData['divisi'] }}" readonly required>
                </div>
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <select class="form-control" name="kategori" id="kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option>Flyer</option>
                    <option>PDF</option>
                    <option>Spanduk</option>
                    <option>Brosur</option>
                    <option value="lainnya">Lainnya</option>
                </select>
                <input type="text" class="form-control mt-2 d-none" id="kategori_lainnya" name="kategori_lainnya" placeholder="Tulis kategori lainnya...">
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Tanggal Deadline</label>
                    <input type="date" class="form-control" name="tanggal_deadline" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Kegiatan</label>
                    <input type="text" class="form-control" name="kegiatan" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="1" placeholder="Tuliskan detail permintaan design..."></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label>Dokumen Pendukung</label>
                <input type="file" class="form-control" name="dokumen_pendukung">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Kirim Permintaan</button>
                <a href="{{ route('permintaan-design.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
  document.getElementById('kategori').addEventListener('change', function () {
      const inputLainnya = document.getElementById('kategori_lainnya');
      if (this.value === 'lainnya') {
          inputLainnya.classList.remove('d-none');
          inputLainnya.required = true;
      } else {
          inputLainnya.classList.add('d-none');
          inputLainnya.required = false;
      }
  });
</script>
@endpush
