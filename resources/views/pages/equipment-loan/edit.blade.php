@extends('layouts/master-dashboard')

@section('header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Edit Peminjaman Peralatan</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('equipment-loan.index') }}"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Peminjaman</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Permintaan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('equipment-loan.update', $equipmentLoan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Nama Peralatan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="equipment_name">Nama Peralatan <span class="text-danger">*</span></label>
                                    <select class="form-control @error('equipment_name') is-invalid @enderror" id="equipment_name" name="equipment_name" required>
                                        <option value="">Pilih Peralatan</option>
                                        <option value="Laptop" {{ old('equipment_name', $equipmentLoan->equipment_name) == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                                        <option value="Projector" {{ old('equipment_name', $equipmentLoan->equipment_name) == 'Projector' ? 'selected' : '' }}>Projector</option>
                                        <option value="Camera" {{ old('equipment_name', $equipmentLoan->equipment_name) == 'Camera' ? 'selected' : '' }}>Camera</option>
                                        <option value="Speaker" {{ old('equipment_name', $equipmentLoan->equipment_name) == 'Speaker' ? 'selected' : '' }}>Speaker</option>
                                        <option value="Microphone" {{ old('equipment_name', $equipmentLoan->equipment_name) == 'Microphone' ? 'selected' : '' }}>Microphone</option>
                                    </select>
                                    @error('equipment_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Nama User -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_name">Nama User</label>
                                    <input type="text" class="form-control" id="user_name" value="{{ Auth::user()->employee->full_name }}" readonly>
                                </div>
                            </div>

                            <!-- Unit -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="unit">Unit <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="unit" name="unit" value="{{ old('unit', $equipmentLoan->unit) }}" readonly>
                                </div>
                            </div>

                            <!-- Divisi -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="division">Divisi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="division" name="division" value="{{ old('division', $equipmentLoan->division) }}" readonly>
                                </div>
                            </div>

                            <!-- Tanggal Pinjam -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="loan_date">Tanggal Pinjam <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('loan_date') is-invalid @enderror" id="loan_date" name="loan_date" value="{{ old('loan_date', $equipmentLoan->loan_date) }}" required>
                                    @error('loan_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tanggal Kembali -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="return_date">Tanggal Kembali <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('return_date') is-invalid @enderror" id="return_date" name="return_date" value="{{ old('return_date', $equipmentLoan->return_date) }}" required>
                                    @error('return_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tujuan Peminjaman -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="purpose">Tujuan Peminjaman <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('purpose') is-invalid @enderror" id="purpose" name="purpose" rows="4" required>{{ old('purpose', $equipmentLoan->purpose) }}</textarea>
                                    @error('purpose')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Update Permintaan</button>
                                <a href="{{ route('equipment-loan.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set minimum date for loan_date to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('loan_date').min = today;

            // Update return_date minimum when loan_date changes
            document.getElementById('loan_date').addEventListener('change', function() {
                document.getElementById('return_date').min = this.value;
            });
        });
    </script>
@endpush 