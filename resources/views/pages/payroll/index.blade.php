@extends('layouts.master-dashboard')

@section('title', 'Daftar Slip Gaji')

@section('content')
<div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5 class="mb-0">Payroll Slip Gaji</h5>
            <form action="{{ route('payroll.generate') }}" method="POST" class="d-inline ms-auto">
                @csrf
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin generate payroll untuk semua karyawan aktif?')">
                    Generate Payroll
                </button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Divisi</th>
                            <th>Periode</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($salarySlips as $slip)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $slip->employee->employee_number }}</td>
                            <td>{{ $slip->employee->full_name }}</td>
                            <td>{{ $slip->employee->position }}</td>
                            <td>{{ $slip->employee->division }}</td>
                            <td>{{ $slip->date->format('F Y') }}</td>
                            <td class="text-end fw-bold">
                                Rp {{ number_format($slip->components->sum('amount'), 0, ',', '.') }}
                            </td>
                            <td>
                                <span class="badge bg-{{ $slip->status === 'paid' ? 'success' : 'warning' }}">
                                    {{ $slip->status === 'paid' ? 'Dibayar' : 'Belum Dibayar' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('payroll.edit', $slip) }}" class="btn btn-sm btn-info">
                                        Edit
                                    </a>
                                    @if($slip->status === 'paid')
                                        <a href="{{ route('payroll.download', $slip) }}" class="btn btn-sm btn-secondary">
                                            Download
                                        </a>
                                    @endif
                                    <form action="{{ route('payroll.update-status', $slip) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="{{ $slip->status === 'paid' ? 'unpaid' : 'paid' }}">
                                        <button type="submit" class="btn btn-sm {{ $slip->status === 'paid' ? 'btn-warning' : 'btn-success' }}"
                                            onclick="return confirm('Apakah Anda yakin ingin {{ $slip->status === 'paid' ? 'membatalkan' : 'menandai' }} pembayaran slip gaji ini?')">
                                            {{ $slip->status === 'paid' ? 'Batalkan Pembayaran' : 'Tandai Dibayar' }}
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
