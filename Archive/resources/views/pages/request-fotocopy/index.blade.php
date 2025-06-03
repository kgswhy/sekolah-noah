@extends('layouts.master-dashboard')

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Request Fotocopy</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="las la-home"></i></a></li>
                        <li class="breadcrumb-item">Request</li>
                        <li class="breadcrumb-item active" aria-current="page">Fotocopy</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar Request Fotocopy</h4>
                    <div class="card-tools">
                        <a href="{{ route('request-fotocopy.create') }}" class="btn btn-primary">
                            <i class="las la-plus"></i> Tambah Request
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Kegiatan</th>
                                    <th>Subject</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Progress Approval</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pengajuanFotocopy as $item)
                                    <tr>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td>{{ $item->nomor_induk_karyawan }}</td>
                                        <td>{{ $item->kegiatan }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->tanggal_penggunaan }}</td>
                                        <td>
                                            @if ($item->status == 'pending')
                                                <span class="badge bg-warning">Menunggu Approval</span>
                                            @elseif($item->status == 'approved')
                                                <span class="badge bg-success">Disetujui</span>
                                            @elseif($item->status == 'rejected')
                                                <span class="badge bg-danger">Ditolak</span>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $totalLevels = \App\Models\Approver::where('module', 'fotocopy')
                                                    ->where('department_type', $item->department_type)
                                                    ->where('active', true)
                                                    ->max('approval_level') ?: 1;
                                                $progress = ($item->status === 'approved') ? 100 : ($item->current_approval_level / $totalLevels) * 100;
                                            @endphp
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    Level {{ $item->status === 'approved' ? $totalLevels : $item->current_approval_level }} dari {{ $totalLevels }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                @if ($item->status == 'pending')
                                                    @php
                                                        $nextLevel = $item->current_approval_level + 1;
                                                        $canApprove = \App\Models\Approver::where('module', 'fotocopy')
                                                            ->where('department_type', $item->department_type)
                                                            ->where('active', true)
                                                            ->where('user_id', auth()->id())
                                                            ->where('approval_level', $nextLevel)
                                                            ->exists();
                                                    @endphp
                                                    @if ($canApprove)
                                                        <button type="button" class="btn btn-success btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#approveModal{{ $item->id }}">
                                                            <i class="las la-check"></i> Setujui
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#rejectModal{{ $item->id }}">
                                                            <i class="las la-times"></i> Tolak
                                                        </button>
                                                    @endif
                                                    <a href="{{ route('request-fotocopy.edit', $item->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="las la-edit"></i> Edit
                                                    </a>
                                                @endif
                                                @if ($item->status == 'rejected' && $item->rejected_message)
                                                    <button type="button" class="btn btn-info btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#rejectionDetailModal{{ $item->id }}">
                                                        <i class="las la-info-circle"></i> Detail Penolakan
                                                    </button>
                                                @endif
                                            </div>

                                            <!-- Approve Modal -->
                                            <div class="modal fade" id="approveModal{{ $item->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi Approval</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah Anda yakin ingin menyetujui pengajuan ini?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <form
                                                                action="{{ route('request-fotocopy.approve', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-success">Setujui</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reject Modal -->
                                            <div class="modal fade" id="rejectModal{{ $item->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Tolak Pengajuan</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form action="{{ route('request-fotocopy.reject', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Alasan Penolakan</label>
                                                                    <textarea name="rejected_message" class="form-control" rows="3" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Tolak</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Rejection Detail Modal -->
                                            @if ($item->status == 'rejected' && $item->rejected_message)
                                                <div class="modal fade" id="rejectionDetailModal{{ $item->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Detail Penolakan</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><strong>Alasan Penolakan:</strong></p>
                                                                <p>{{ $item->rejected_message }}</p>
                                                                <p><strong>Ditolak oleh:</strong>
                                                                    {{ $item->rejecter->name ?? 'N/A' }}</p>
                                                                <p><strong>Tanggal:</strong>
                                                                    {{ $item->rejected_at ? $item->rejected_at->format('d/m/Y H:i') : 'N/A' }}
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pengajuanTable').DataTable();
        });
    </script>
@endsection
