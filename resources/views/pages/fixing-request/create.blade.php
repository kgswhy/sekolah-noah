@extends('layouts/master-dashboard')

@section('header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Permintaan Perbaikan</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('fixing-request.index') }}"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">IT</li>
                        <li class="breadcrumb-item active" aria-current="page">Permintaan Perbaikan</li>
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

                    <form action="{{ route('fixing-request.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Kategori Perangkat IT -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="device_category">Kategori Perangkat</label>
                                    <select class="form-control @error('device_category') is-invalid @enderror" id="device_category" name="device_category" required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="Laptop" {{ old('device_category') == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                                        <option value="PC" {{ old('device_category') == 'PC' ? 'selected' : '' }}>PC</option>
                                        <option value="Printer" {{ old('device_category') == 'Printer' ? 'selected' : '' }}>Printer</option>
                                        <option value="Monitor" {{ old('device_category') == 'Monitor' ? 'selected' : '' }}>Monitor</option>
                                        <option value="Other" {{ old('device_category') == 'Other' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                    @error('device_category')
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
                                    <label for="unit">Unit</label>
                                    <input type="text" class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit" value="{{ old('unit', Auth::user()->employee->unit) }}" required>
                                    @error('unit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Divisi -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="division">Divisi</label>
                                    <input type="text" class="form-control @error('division') is-invalid @enderror" id="division" name="division" value="{{ old('division', Auth::user()->employee->division) }}" required>
                                    @error('division')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Rincian Kerusakan -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="damage_details">Rincian Kerusakan</label>
                                    <textarea class="form-control @error('damage_details') is-invalid @enderror" id="damage_details" name="damage_details" rows="4" required>{{ old('damage_details') }}</textarea>
                                    @error('damage_details')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Dokumen Pendukung -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="supporting_document">Dokumen Pendukung</label>
                                    <input type="file" class="form-control @error('supporting_document') is-invalid @enderror" id="supporting_document" name="supporting_document">
                                    <small class="form-text text-muted">Format yang didukung: JPG, JPEG, PNG, PDF, DOC, DOCX</small>
                                    @error('supporting_document')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Kirim Request</button>
                                <a href="{{ route('fixing-request.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
