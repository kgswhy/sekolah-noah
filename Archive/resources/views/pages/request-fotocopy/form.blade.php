<div class="row">
    @php $data = isset($pengajuanFotocopy) ? $pengajuanFotocopy : null; @endphp

    <div class="col-md-6 mb-3">
        <label>Kegiatan</label>
        <input type="text" name="kegiatan" class="form-control @error('kegiatan') is-invalid @enderror" value="{{ old('kegiatan', $data->kegiatan ?? '') }}" required>
        @error('kegiatan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label>Subject</label>
        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject', $data->subject ?? '') }}" required>
        @error('subject')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label>Kelas</label>
        <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas', $data->kelas ?? '') }}" required>
        @error('kelas')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label>Tanggal Penggunaan</label>
        <input type="date" name="tanggal_penggunaan" class="form-control @error('tanggal_penggunaan') is-invalid @enderror" value="{{ old('tanggal_penggunaan', $data->tanggal_penggunaan ?? '') }}" required>
        @error('tanggal_penggunaan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Bagian input array --}}
    <div class="col-12 mb-3">
        <label>Nama Barang, Jumlah Halaman, Jumlah Diperlukan, Keterangan</label>
        <div id="items-container">
            @php
                $barangs = old('nama_barang', $data->nama_barang ?? []);
                $halamans = old('jumlah_halaman', $data->jumlah_halaman ?? []);
                $jumlahs = old('jumlah_diperlukan', $data->jumlah_diperlukan ?? []);
                $keterangans = old('keterangan', $data->keterangan ?? []);
            @endphp

            @for($i = 0; $i < max(1, count($barangs)); $i++)
                <div class="row mb-2 item-row">
                    <div class="col-md-3">
                        <input type="text" name="nama_barang[]" class="form-control @error('nama_barang.'.$i) is-invalid @enderror" placeholder="Nama Barang" value="{{ $barangs[$i] ?? '' }}" required>
                        @error('nama_barang.'.$i)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="jumlah_halaman[]" class="form-control @error('jumlah_halaman.'.$i) is-invalid @enderror" placeholder="Hal." value="{{ $halamans[$i] ?? '' }}" min="1" required>
                        @error('jumlah_halaman.'.$i)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="jumlah_diperlukan[]" class="form-control @error('jumlah_diperlukan.'.$i) is-invalid @enderror" placeholder="Jumlah" value="{{ $jumlahs[$i] ?? '' }}" min="1" required>
                        @error('jumlah_diperlukan.'.$i)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="keterangan[]" class="form-control @error('keterangan.'.$i) is-invalid @enderror" placeholder="Keterangan" value="{{ $keterangans[$i] ?? '' }}" required>
                        @error('keterangan.'.$i)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm remove-item">X</button>
                    </div>
                </div>
            @endfor
        </div>
        <button type="button" id="add-item" class="btn btn-sm btn-success">+ Tambah</button>
    </div>
</div>

<script>
    document.getElementById('add-item').addEventListener('click', function () {
        let container = document.getElementById('items-container');
        let row = document.createElement('div');
        row.className = 'row mb-2 item-row';
        row.innerHTML = `
            <div class="col-md-3">
                <input type="text" name="nama_barang[]" class="form-control" placeholder="Nama Barang" required>
            </div>
            <div class="col-md-2">
                <input type="number" name="jumlah_halaman[]" class="form-control" placeholder="Hal." min="1" required>
            </div>
            <div class="col-md-2">
                <input type="number" name="jumlah_diperlukan[]" class="form-control" placeholder="Jumlah" min="1" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="keterangan[]" class="form-control" placeholder="Keterangan" required>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger btn-sm remove-item">X</button>
            </div>
        `;
        container.appendChild(row);
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-item')) {
            e.target.closest('.item-row').remove();
        }
    });
</script>
