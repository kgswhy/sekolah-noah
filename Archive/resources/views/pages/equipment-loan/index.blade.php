@extends('layouts.master-dashboard')

@section('title', 'Peminjaman Peralatan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Peminjaman Peralatan</li>
                    </ol>
                </div>
                <h4 class="page-title">Peminjaman Peralatan</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ route('equipment-loan.create') }}" class="btn btn-primary mb-2">
                                <i class="mdi mdi-plus-circle me-2"></i> Buat Permintaan
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <div class="btn-group mb-2">
                                    <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Filter Status <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('equipment-loan.index') }}">Semua</a>
                                        <a class="dropdown-item" href="{{ route('equipment-loan.index', ['status' => 'pending']) }}">Pending</a>
                                        <a class="dropdown-item" href="{{ route('equipment-loan.index', ['status' => 'approved']) }}">Disetujui</a>
                                        <a class="dropdown-item" href="{{ route('equipment-loan.index', ['status' => 'rejected']) }}">Ditolak</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box" style="border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); padding: 24px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="mb-0">Peminjaman Peralatan</h4>
                            <a href="{{ route('equipment-loan.create') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Buat Permintaan</a>
                        </div>
                        <div class="table-responsive">
                            <table id="equipmentLoanTable" class="table table-striped align-middle" style="border-radius: 12px; overflow: hidden;">
                                <thead class="bg-light" style="background: #f8fafc;">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama Peralatan</th>
                                        <th>Unit</th>
                                        <th>Divisi</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($equipmentLoans as $loan)
                                        <tr style="transition: background 0.2s;">
                                            <td>{{ \Carbon\Carbon::parse($loan->created_at)->format('d/m/Y') }}</td>
                                            <td>{{ $loan->equipment_name }}</td>
                                            <td>{{ $loan->unit }}</td>
                                            <td>{{ $loan->division }}</td>
                                            <td>{{ \Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($loan->return_date)->format('d/m/Y') }}</td>
                                            <td>
                                                @if ($loan->status == 'pending')
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @elseif ($loan->status == 'approved')
                                                    <span class="badge bg-success">Disetujui</span>
                                                @else
                                                    <span class="badge bg-danger">Ditolak</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('equipment-loan.show', $loan->id) }}" class="btn btn-sm btn-outline-primary" title="Detail"><i class="mdi mdi-eye"></i></a>
                                                    @if ($loan->user_id == Auth::id() && $loan->status == 'pending')
                                                        <a href="{{ route('equipment-loan.edit', $loan->id) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="mdi mdi-pencil"></i></a>
                                                    @endif
                                                    @if ($loan->user_id == Auth::id())
                                                        <form action="{{ route('equipment-loan.destroy', $loan->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus permintaan ini?')"><i class="mdi mdi-delete"></i></button>
                                                        </form>
                                                    @endif
                                                    
                                                    <button type="button" class="btn btn-success btn-sm"
                                                            
                                                    >Setuju
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    >
                                                    Tolak
                                                </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted">Belum ada data peminjaman.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#equipmentLoanTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json'
            },
            pageLength: 10,
            order: [[0, 'desc']],
        });
        // Hover effect
        $('#equipmentLoanTable tbody').on('mouseenter', 'tr', function() {
            $(this).css('background', '#f1f5f9');
        }).on('mouseleave', 'tr', function() {
            $(this).css('background', '');
        });
    });
</script>
@endpush
