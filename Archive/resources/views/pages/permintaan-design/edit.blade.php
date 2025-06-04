@extends('layouts/master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Edit Permintaan Design</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                <li class="breadcrumb-item"><a href="/permintaan-design">Permintaan Design</a></li>
                <li class="breadcrumb-item active">Edit Permintaan</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('permintaan-design.update', $permintaan_design->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $permintaan_design->nama }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $permintaan_design->email }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Unit</label>
                    <input type="text" class="form-control" name="unit" value="{{ $permintaan_design->unit }}" readonly required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Divisi</label>
                    <input type="text" class="form-control" name="divisi" value="{{ $permintaan_design->divisi }}" readonly required>
                </div>
            </div>
            <div class="mb-3">
                <label>Kategori</label>
                <select class="form-control" name="kategori" id="kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option {{ $permintaan_design->kategori == 'Flyer' ? 'selected' : '' }}>Flyer</option>
                    <option {{ $permintaan_design->kategori == 'PDF' ? 'selected' : '' }}>PDF</option>
                    <option {{ $permintaan_design->kategori == 'Spanduk' ? 'selected' : '' }}>Spanduk</option>
                    <option {{ $permintaan_design->kategori == 'Brosur' ? 'selected' : '' }}>Brosur</option>
                    <option value="lainnya" {{ $permintaan_design->kategori == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                <input type="text" class="form-control mt-2 {{ $permintaan_design->kategori == 'lainnya' ? '' : 'd-none' }}" id="kategori_lainnya" name="kategori_lainnya" placeholder="Tulis kategori lainnya..." value="{{ $permintaan_design->kategori_lainnya }}">
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Tanggal Deadline</label>
                    <input type="date" class="form-control" name="tanggal_deadline" value="{{ $permintaan_design->tanggal_deadline }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Kegiatan</label>
                    <input type="text" class="form-control" name="kegiatan" value="{{ $permintaan_design->kegiatan }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="1" placeholder="Tuliskan detail permintaan design...">{{ $permintaan_design->deskripsi }}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label>Dokumen Pendukung</label>
                @if($permintaan_design->dokumen_pendukung)
                    <div class="mb-2">
                        <a href="{{ asset('storage/'.$permintaan_design->dokumen_pendukung) }}" target="_blank" class="btn btn-info btn-sm">Lihat Dokumen</a>
                    </div>
                @endif
                <input type="file" class="form-control" name="dokumen_pendukung">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah dokumen.</small>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('permintaan-design.index') }}" class="btn btn-secondary">Batal</a>
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