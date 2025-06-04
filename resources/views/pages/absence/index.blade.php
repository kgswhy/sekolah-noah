@extends('layouts/master-dashboard')

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Data Absensi</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">HRD</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Absensi</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="ms-auto">
            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#importModal">
                <i class="fas fa-file-import me-1"></i> Import Data
            </button>
            <a href="{{ route('absence.template') }}" class="btn btn-success">
                <i class="fas fa-download me-1"></i> Download Template
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="absenceTable">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama Karyawan</th>
                                    <th>Tanggal</th>
                                    <th>Shift</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Status</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absences as $index => $absence)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $absence->schedule->employee->nik }}</td>
                                        <td>{{ $absence->schedule->employee->full_name }}</td>
                                        <td>{{ Carbon\Carbon::parse($absence->schedule->date)->format('d/m/Y') }}</td>
                                        <td>{{ $absence->schedule->shift->title }}</td>
                                        <td>{{ $absence->clock_in ? Carbon\Carbon::parse($absence->clock_in)->format('H:i:s') : '-' }}
                                        </td>
                                        <td>{{ $absence->clock_out ? Carbon\Carbon::parse($absence->clock_out)->format('H:i:s') : '-' }}
                                        </td>
                                        <td>
                                            @php
                                                $statusLabels = [
                                                    'present' => 'Hadir',
                                                    'late' => 'Terlambat',
                                                    'absent' => 'Tidak Hadir',
                                                ];
                                                $statusClass = match ($absence->status) {
                                                    'present' => 'success',
                                                    'late' => 'warning',
                                                    'absent' => 'danger',
                                                    default => 'secondary',
                                                };
                                            @endphp
                                            <span class="badge bg-{{ $statusClass }} px-3 py-2">
                                                {{ $statusLabels[$absence->status] ?? ucfirst($absence->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('absence.edit', $absence->id) }}"
                                                    class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Edit">
                                                    Edit
                                                </a>
                                                <form action="{{ route('absence.delete', $absence->id) }}" method="POST"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="tooltip" title="Hapus">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Import Modal -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">
                        <i class="fas fa-file-import me-2"></i>Import Data Absensi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('absence.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file" class="form-label">File Excel</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                                name="file" accept=".xls,.xlsx" required>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Format file harus .xls atau .xlsx.
                                <a href="{{ route('absence.template') }}" class="text-decoration-none">
                                    Download template
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload me-1"></i>Import
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#absenceTable').DataTable({
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                },
                dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
                    '<"row"<"col-sm-12"tr>>' +
                    '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Semua"]
                ],
                order: [
                    [3, 'desc']
                ], // Sort by date column by default
            });

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
@endpush
