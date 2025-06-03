@extends('layouts/master-dashboard')

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Pengaturan Approval</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                        <li class="breadcrumb-item">Pengaturan</li>
                        <li class="breadcrumb-item active" aria-current="page">Approval</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h4>Pengaturan Approval</h4>
                    <p>Pada halaman ini, Anda dapat mengatur user mana saja yang dapat melakukan approval untuk berbagai
                        jenis pengajuan:</p>
                    <ul>
                        <li><strong>Cuti/Izin/Sakit</strong> - Pengajuan tidak masuk kerja</li>
                        <li><strong>Izin Meninggalkan Pekerjaan (Brief)</strong> - Pengajuan izin keluar sebentar</li>
                        <li><strong>Klaim Berobat</strong> - Pengajuan penggantian biaya berobat</li>
                        <li><strong>Slip Gaji / SKK</strong> - Permintaan slip gaji atau surat keterangan kerja</li>
                        <li><strong>Pinjaman dan Cicilan</strong> - Pengajuan pinjaman</li>
                        <li><strong>Lembur dan Honor</strong> - Pengajuan lembur atau honor kegiatan</li>
                        <li><strong>Surat Tugas</strong> - Pengajuan surat tugas dan perjalanan dinas</li>
                        <li><strong>Request Fotocopy</strong> - Pengajuan fotocopy dokumen</li>
                    </ul>
                    <p>User yang dipilih sebagai approver akan memiliki hak untuk menyetujui atau menolak pengajuan.</p>
                </div>
            </div>
        </div>

        <!-- Form to add new approver -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tambah Approver</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('approval.store') }}" method="POST">
                        @csrf

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Pilih User</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="">-- Pilih User --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="module" class="form-label">Jenis Approval</label>
                            <select class="form-select" id="module" name="module" required>
                                <option value="cuti">Cuti/Izin/Sakit</option>
                                <option value="brief-absen">Izin Meninggalkan Pekerjaan (Brief)</option>
                                <option value="klaim-berobat">Klaim Berobat</option>
                                <option value="slip-gaji">Slip Gaji / SKK</option>
                                <option value="pinjaman-cicilan">Pinjaman dan Cicilan</option>
                                <option value="lembur">Lembur dan Honor</option>
                                <option value="surat-tugas">Surat Tugas</option>
                                <option value="fotocopy">Request Fotocopy</option>
                                <option value="request-atk">Pengajuan ATK</option>
                                <option value="fixing-request">Permintaan Perbaikan Barang</option>
                                <option value="equipment-loan">Peminjaman Barang</option>
                                <option value="peminjaman">Peminjaman Ruangan</option>
                                <option value="permintaan-design">Permintaan Design</option>
                                <option value="kurir-mobil">Permintaan Kurir dan Mobil</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="approval_level" class="form-label">Level Approval</label>
                            <select class="form-select" id="approval_level" name="approval_level" required>
                                <option value="1">Level 1 (Pertama)</option>
                                <option value="2">Level 2 (Kedua)</option>
                                <option value="3">Level 3 (Terakhir)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="department_type" class="form-label">Tipe Departemen</label>
                            <select class="form-select" id="department_type" name="department_type" required>
                                <option value="akademik">Akademik</option>
                                <option value="non-akademik">Non-Akademik</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="Opsional">
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Approver</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- List of current approvers -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Daftar Approver</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="filter_module" class="form-label">Filter Jenis Approval</label>
                            <select class="form-select" id="filter_module" onchange="filterTable()">
                                <option value="">Semua Jenis</option>
                                <option value="cuti">Cuti/Izin/Sakit</option>
                                <option value="brief-absen">Izin Meninggalkan Pekerjaan (Brief)</option>
                                <option value="klaim-berobat">Klaim Berobat</option>
                                <option value="slip-gaji">Slip Gaji / SKK</option>
                                <option value="pinjaman-cicilan">Pinjaman dan Cicilan</option>
                                <option value="lembur">Lembur dan Honor</option>
                                <option value="surat-tugas">Surat Tugas</option>
                                <option value="request-fotocopy">Request Fotocopy</option>
                                <option value="request-atk">Pengajuan ATK</option>
                                <option value="fixing-request">Permintaan Perbaikan Barang</option>
                                <option value="equipment-loan">Peminjaman Barang</option>
                                <option value="peminjaman">Peminjaman Ruangan</option>
                                <option value="permintaan-design">Permintaan Design</option>
                                <option value="kurir-mobil">Permintaan Kurir dan Mobil</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="filter_department" class="form-label">Filter Tipe Departemen</label>
                            <select class="form-select" id="filter_department" onchange="filterTable()">
                                <option value="">Semua Tipe</option>
                                <option value="akademik">Akademik</option>
                                <option value="non-akademik">Non-Akademik</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="approversTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jenis Approval</th>
                                    <th>Level</th>
                                    <th>Departemen</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($approvers as $approver)
                                    <tr data-module="{{ $approver->module }}"
                                        data-department="{{ $approver->department_type }}">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-2">
                                                    <span class="avatar-initial rounded-circle bg-primary">
                                                        {{ substr($approver->user->name, 0, 1) }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">{{ $approver->user->name }}</h6>
                                                    <small class="text-muted">{{ $approver->description ?: '-' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $approver->user->email }}</td>
                                        <td>
                                            <span class="badge bg-info">
                                                @switch($approver->module)
                                                    @case('cuti')
                                                        Cuti/Izin/Sakit
                                                    @break

                                                    @case('brief-absen')
                                                        Izin Meninggalkan Pekerjaan
                                                    @break

                                                    @case('klaim-berobat')
                                                        Klaim Berobat
                                                    @break

                                                    @case('slip-gaji')
                                                        Slip Gaji / SKK
                                                    @break

                                                    @case('pinjaman-cicilan')
                                                        Pinjaman dan Cicilan
                                                    @break

                                                    @case('lembur')
                                                        Lembur dan Honor
                                                    @break

                                                    @case('surat-tugas')
                                                        Surat Tugas
                                                    @break

                                                    @case('fotocopy')
                                                        Request Fotocopy
                                                    @break

                                                    @case('request-atk')
                                                        Pengajuan ATK
                                                    @break

                                                    @case('fixing-request')
                                                        Permintaan Perbaikan Barang
                                                    @break
                                                    
                                                    @case('equipment-loan')
                                                        Peminjaman Barang
                                                    @break

                                                    @case('peminjaman')
                                                        Peminjaman Ruangan
                                                    @break


                                                    @default
                                                        {{ $approver->module }}
                                                @endswitch
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">Level {{ $approver->approval_level }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $approver->department_type === 'akademik' ? 'bg-success' : 'bg-warning' }}">
                                                {{ ucfirst($approver->department_type) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($approver->active)
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-danger">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('approval.toggle', $approver->id) }}"
                                                    class="btn btn-sm {{ $approver->active ? 'btn-warning' : 'btn-success' }}"
                                                    title="{{ $approver->active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                    <i class="fa {{ $approver->active ? 'fa-ban' : 'fa-check' }}"></i>
                                                </a>
                                                <form action="{{ route('approval.destroy', $approver->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Yakin ingin menghapus approver ini?')"
                                                        title="Hapus">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4">
                                                <div class="text-muted">
                                                    <i class="fa fa-users fs-2"></i>
                                                    <p class="mt-2">Belum ada approver yang ditambahkan</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @section('scripts')
            <script>
                function filterTable() {
                    const moduleFilter = document.getElementById('filter_module').value.toLowerCase();
                    const departmentFilter = document.getElementById('filter_department').value.toLowerCase();
                    const table = document.getElementById('approversTable');
                    const rows = table.getElementsByTagName('tr');

                    // Start from index 1 to skip the header row
                    for (let i = 1; i < rows.length; i++) {
                        const row = rows[i];
                        const moduleValue = row.getAttribute('data-module');
                        const departmentValue = row.getAttribute('data-department');

                        // If no filters are selected or both filters match, show the row
                        if ((!moduleFilter || moduleValue === moduleFilter) &&
                            (!departmentFilter || departmentValue === departmentFilter)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                }
            </script>
        @endsection
