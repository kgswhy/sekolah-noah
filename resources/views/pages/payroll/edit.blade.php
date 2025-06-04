@extends('layouts.master-dashboard')

@section('content-header')
<div class="d-flex align-items-center">
    <div class="me-auto">
        <h3 class="page-title">Edit Slip Gaji</h3>
    </div>
    <div>
        <a href="{{ route('payroll.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5>Informasi Karyawan</h5>
                        <table class="table table-borderless">
                            <tr>
                                <td width="150">NIK</td>
                                <td>: {{ $salarySlip->employee->employee_number }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $salarySlip->employee->full_name }}</td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>: {{ $salarySlip->employee->position }}</td>
                            </tr>
                            <tr>
                                <td>Divisi</td>
                                <td>: {{ $salarySlip->employee->division }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h5>Informasi Slip Gaji</h5>
                        <table class="table table-borderless">
                            <tr>
                                <td width="150">Periode</td>
                                <td>: {{ $salarySlip->date->format('F Y') }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>: <span class="badge bg-{{ $salarySlip->status === 'paid' ? 'success' : 'warning' }}">
                                    {{ $salarySlip->status === 'paid' ? 'Dibayar' : 'Belum Dibayar' }}
                                </span></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <form action="{{ route('payroll.update', $salarySlip) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Komponen Gaji</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Komponen</th>
                                        <th width="200">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($salarySlip->components as $component)
                                        <tr>
                                            <td>
                                                {{ $component->title }}
                                                @if($component->description)
                                                    <br>
                                                    <small class="text-muted">{{ $component->description }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <span class="input-group-text">Rp</span>
                                                    <input type="number" 
                                                           name="components[{{ $component->id }}][amount]" 
                                                           value="{{ $component->amount }}"
                                                           class="form-control text-end"
                                                           required>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <th class="text-end">Rp {{ number_format($salarySlip->amount) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="notes" class="form-label">Catatan</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3">{{ $salarySlip->notes }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('payroll.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 