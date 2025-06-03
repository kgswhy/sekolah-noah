@extends('layouts/master-dashboard')

@section('header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Edit Siswa</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Siswa</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Siswa</li>
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
                    <form action="/students/edit/{{ $student->id }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Nama Lengkap -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $student->full_name) }}" required>
                                </div>
                            </div>

                            <!-- Nomor Induk Sekolah -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="school_id">Nomor Induk Sekolah</label>
                                    <input type="text" class="form-control" id="school_id" name="school_id" value="{{ old('school_id', $student->school_id) }}" required>
                                </div>
                            </div>

                            <!-- Nomor Induk Sekolah Nasional -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="national_school_id">Nomor Induk Sekolah Nasional</label>
                                    <input type="text" class="form-control" id="national_school_id" name="national_school_id" value="{{ old('national_school_id', $student->national_school_id) }}" required>
                                </div>
                            </div>

                            <!-- Nama Panggilan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nickname">Nama Panggilan</label>
                                    <input type="text" class="form-control" id="nickname" name="nickname" value="{{ old('nickname', $student->nickname) }}" required>
                                </div>
                            </div>

                            <!-- Kelas -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="class">Kelas</label>
                                    <input type="text" class="form-control" id="class" name="class" value="{{ old('class', $student->class) }}" required>
                                </div>
                            </div>

                            <!-- Tempat Lahir -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="place_of_birth">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{ old('place_of_birth', $student->place_of_birth) }}" required>
                                </div>
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_of_birth">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}" required>
                                </div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="male" {{ old('gender', $student->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="female" {{ old('gender', $student->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Agama -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="religion">Agama</label>
                                    <input type="text" class="form-control" id="religion" name="religion" value="{{ old('religion', $student->religion) }}" required>
                                </div>
                            </div>

                            <!-- Kewarganegaraan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nationality">Kewarganegaraan</label>
                                    <input type="text" class="form-control" id="nationality" name="nationality" value="{{ old('nationality', $student->nationality) }}" required>
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $student->address) }}" required>
                                </div>
                            </div>

                            <!-- Kota -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Kota</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $student->city) }}" required>
                                </div>
                            </div>

                            <!-- Kode Pos -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postal_code">Kode Pos</label>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', $student->postal_code) }}" required>
                                </div>
                            </div>

                            <!-- Tinggal Dengan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="living_with">Tinggal Dengan</label>
                                    <input type="text" class="form-control" id="living_with" name="living_with" value="{{ old('living_with', $student->living_with) }}" required>
                                </div>
                            </div>

                            <!-- Apakah ada saudara di sekolah -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="has_siblings_at_school">Apakah memiliki saudara di sekolah?</label>
                                    <select class="form-control" id="has_siblings_at_school" name="has_siblings_at_school" required>
                                        <option value="1" {{ old('has_siblings_at_school', $student->has_siblings_at_school) == 1 ? 'selected' : '' }}>Ya</option>
                                        <option value="0" {{ old('has_siblings_at_school', $student->has_siblings_at_school) == 0 ? 'selected' : '' }}>Tidak</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <!-- Data Sekolah Sebelumnya -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="previous_school_name">Nama Sekolah Sebelumnya</label>
                                    <input type="text" class="form-control" id="previous_school_name" name="previous_school_name" value="{{ old('previous_school_name', $student->previous_school_name) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="previous_school_class">Kelas di Sekolah Sebelumnya</label>
                                    <input type="text" class="form-control" id="previous_school_class" name="previous_school_class" value="{{ old('previous_school_class', $student->previous_school_class) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="previous_school_address">Alamat Sekolah Sebelumnya</label>
                                    <input type="text" class="form-control" id="previous_school_address" name="previous_school_address" value="{{ old('previous_school_address', $student->previous_school_address) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="previous_school_phone">Nomor Telepon Sekolah Sebelumnya</label>
                                    <input type="text" class="form-control" id="previous_school_phone" name="previous_school_phone" value="{{ old('previous_school_phone', $student->previous_school_phone) }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <!-- Informasi Ayah -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_name">Nama Ayah</label>
                                    <input type="text" class="form-control" id="father_name" name="father_name" value="{{ old('father_name', $student->father_name) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_email">Email Ayah</label>
                                    <input type="email" class="form-control" id="father_email" name="father_email" value="{{ old('father_email', $student->father_email) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_phone">Nomor HP Ayah</label>
                                    <input type="text" class="form-control" id="father_phone" name="father_phone" value="{{ old('father_phone', $student->father_phone) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_nationality">Kewarganegaraan Ayah</label>
                                    <input type="text" class="form-control" id="father_nationality" name="father_nationality" value="{{ old('father_nationality', $student->father_nationality) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_id_card_number">Nomor KTP Ayah</label>
                                    <input type="text" class="form-control" id="father_id_card_number" name="father_id_card_number" value="{{ old('father_id_card_number', $student->father_id_card_number) }}" required>
                                </div>
                            </div>

                            <!-- Pekerjaan Ayah -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_job">Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" id="father_job" name="father_job" value="{{ old('father_job', $student->father_job) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_company">Perusahaan Ayah</label>
                                    <input type="text" class="form-control" id="father_company" name="father_company" value="{{ old('father_company', $student->father_company) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_position">Jabatan Ayah</label>
                                    <input type="text" class="form-control" id="father_position" name="father_position" value="{{ old('father_position', $student->father_position) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_office_phone">Nomor Telepon Kantor Ayah</label>
                                    <input type="text" class="form-control" id="father_office_phone" name="father_office_phone" value="{{ old('father_office_phone', $student->father_office_phone) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_office_address">Alamat Kantor Ayah</label>
                                    <input type="text" class="form-control" id="father_office_address" name="father_office_address" value="{{ old('father_office_address', $student->father_office_address) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_monthly_income">Pendapatan Bulanan Ayah</label>
                                    <input type="number" class="form-control" id="father_monthly_income" name="father_monthly_income" step="0.01" value="{{ old('father_monthly_income', $student->father_monthly_income) }}">
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <!-- Informasi Ibu -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_name">Nama Ibu</label>
                                    <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ old('mother_name', $student->mother_name) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_email">Email Ibu</label>
                                    <input type="email" class="form-control" id="mother_email" name="mother_email" value="{{ old('mother_email', $student->mother_email) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_phone">Nomor HP Ibu</label>
                                    <input type="text" class="form-control" id="mother_phone" name="mother_phone" value="{{ old('mother_phone', $student->mother_phone) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_nationality">Kewarganegaraan Ibu</label>
                                    <input type="text" class="form-control" id="mother_nationality" name="mother_nationality" value="{{ old('mother_nationality', $student->mother_nationality) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_id_card_number">Nomor KTP Ibu</label>
                                    <input type="text" class="form-control" id="mother_id_card_number" name="mother_id_card_number" value="{{ old('mother_id_card_number', $student->mother_id_card_number) }}" required>
                                </div>
                            </div>

                            <!-- Pekerjaan Ibu -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_job">Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" id="mother_job" name="mother_job" value="{{ old('mother_job', $student->mother_job) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_company">Perusahaan Ibu</label>
                                    <input type="text" class="form-control" id="mother_company" name="mother_company" value="{{ old('mother_company', $student->mother_company) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_position">Jabatan Ibu</label>
                                    <input type="text" class="form-control" id="mother_position" name="mother_position" value="{{ old('mother_position', $student->mother_position) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_office_phone">Nomor Telepon Kantor Ibu</label>
                                    <input type="text" class="form-control" id="mother_office_phone" name="mother_office_phone" value="{{ old('mother_office_phone', $student->mother_office_phone) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_office_address">Alamat Kantor Ibu</label>
                                    <input type="text" class="form-control" id="mother_office_address" name="mother_office_address" value="{{ old('mother_office_address', $student->mother_office_address) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_monthly_income">Pendapatan Bulanan Ibu</label>
                                    <input type="number" class="form-control" id="mother_monthly_income" name="mother_monthly_income" step="0.01" value="{{ old('mother_monthly_income', $student->mother_monthly_income) }}">
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <!-- Informasi Wali -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_name">Nama Wali</label>
                                    <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="{{ old('guardian_name', $student->guardian_name) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_email">Alamat E-mail Wali</label>
                                    <input type="email" class="form-control" id="guardian_email" name="guardian_email" value="{{ old('guardian_email', $student->guardian_email) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_phone">Nomor HP Wali</label>
                                    <input type="text" class="form-control" id="guardian_phone" name="guardian_phone" value="{{ old('guardian_phone', $student->guardian_phone) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_nationality">Kewarganegaraan Wali</label>
                                    <input type="text" class="form-control" id="guardian_nationality" name="guardian_nationality" value="{{ old('guardian_nationality', $student->guardian_nationality) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_id_card_number">Nomor KTP/Paspor Wali</label>
                                    <input type="text" class="form-control" id="guardian_id_card_number" name="guardian_id_card_number" value="{{ old('guardian_id_card_number', $student->guardian_id_card_number) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_kitas_number">Nomor KITAS (Untuk WNA)</label>
                                    <input type="text" class="form-control" id="guardian_kitas_number" name="guardian_kitas_number" value="{{ old('guardian_kitas_number', $student->guardian_kitas_number) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_relationship">Hubungan Wali dengan Siswa</label>
                                    <input type="text" class="form-control" id="guardian_relationship" name="guardian_relationship" value="{{ old('guardian_relationship', $student->guardian_relationship) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_job">Pekerjaan Wali</label>
                                    <input type="text" class="form-control" id="guardian_job" name="guardian_job" value="{{ old('guardian_job', $student->guardian_job) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_company">Perusahaan Wali</label>
                                    <input type="text" class="form-control" id="guardian_company" name="guardian_company" value="{{ old('guardian_company', $student->guardian_company) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_position">Jabatan Wali</label>
                                    <input type="text" class="form-control" id="guardian_position" name="guardian_position" value="{{ old('guardian_position', $student->guardian_position) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_office_phone">No. Telepon Kantor Wali</label>
                                    <input type="text" class="form-control" id="guardian_office_phone" name="guardian_office_phone" value="{{ old('guardian_office_phone', $student->guardian_office_phone) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_office_address">Alamat Kantor Wali</label>
                                    <input type="text" class="form-control" id="guardian_office_address" name="guardian_office_address" value="{{ old('guardian_office_address', $student->guardian_office_address) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_monthly_income">Pendapatan Bulanan Wali</label>
                                    <input type="number" class="form-control" id="guardian_monthly_income" name="guardian_monthly_income" step="0.01" value="{{ old('guardian_monthly_income', $student->guardian_monthly_income) }}">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
