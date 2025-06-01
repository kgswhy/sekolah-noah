@extends('layouts/master-dashboard')

@section('header')
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h3 class="page-title">Tambah Siswa</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item" aria-current="page">Siswa</li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Siswa</li>
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
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Nama Lengkap -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                                </div>
                            </div>

                            <!-- Nomor Induk Sekolah -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="school_id">Nomor Induk Sekolah</label>
                                    <input type="text" class="form-control" id="school_id" name="school_id" required>
                                </div>
                            </div>

                            <!-- Nomor Induk Sekolah Nasional -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="national_school_id">Nomor Induk Sekolah Nasional</label>
                                    <input type="text" class="form-control" id="national_school_id" name="national_school_id" required>
                                </div>
                            </div>

                            <!-- Nama Panggilan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nickname">Nama Panggilan</label>
                                    <input type="text" class="form-control" id="nickname" name="nickname" required>
                                </div>
                            </div>

                            <!-- Kelas -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="class">Kelas</label>
                                    <input type="text" class="form-control" id="class" name="class" required>
                                </div>
                            </div>

                            <!-- Tempat Lahir -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="place_of_birth">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" required>
                                </div>
                            </div>

                            <!-- Tanggal Lahir -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_of_birth">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                </div>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="male">Laki-laki</option>
                                        <option value="female">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Agama -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="religion">Agama</label>
                                    <input type="text" class="form-control" id="religion" name="religion" required>
                                </div>
                            </div>

                            <!-- Kewarganegaraan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nationality">Kewarganegaraan</label>
                                    <input type="text" class="form-control" id="nationality" name="nationality" required>
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                            </div>

                            <!-- Kota -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Kota</label>
                                    <input type="text" class="form-control" id="city" name="city" required>
                                </div>
                            </div>

                            <!-- Kode Pos -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postal_code">Kode Pos</label>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                                </div>
                            </div>

                            <!-- Tinggal Dengan -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="living_with">Tinggal Dengan</label>
                                    <input type="text" class="form-control" id="living_with" name="living_with" required>
                                </div>
                            </div>

                            <!-- Apakah ada saudara di sekolah -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="has_siblings_at_school">Apakah memiliki saudara di sekolah?</label>
                                    <select class="form-control" id="has_siblings_at_school" name="has_siblings_at_school" required>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
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
                                    <input type="text" class="form-control" id="previous_school_name" name="previous_school_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="previous_school_class">Kelas di Sekolah Sebelumnya</label>
                                    <input type="text" class="form-control" id="previous_school_class" name="previous_school_class">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="previous_school_address">Alamat Sekolah Sebelumnya</label>
                                    <input type="text" class="form-control" id="previous_school_address" name="previous_school_address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="previous_school_phone">Nomor Telepon Sekolah Sebelumnya</label>
                                    <input type="text" class="form-control" id="previous_school_phone" name="previous_school_phone">
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">

                            <!-- Informasi Ayah -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_name">Nama Ayah</label>
                                    <input type="text" class="form-control" id="father_name" name="father_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_email">Email Ayah</label>
                                    <input type="email" class="form-control" id="father_email" name="father_email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_phone">Nomor HP Ayah</label>
                                    <input type="text" class="form-control" id="father_phone" name="father_phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_nationality">Kewarganegaraan Ayah</label>
                                    <input type="text" class="form-control" id="father_nationality" name="father_nationality" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_id_card_number">Nomor KTP Ayah</label>
                                    <input type="text" class="form-control" id="father_id_card_number" name="father_id_card_number" required>
                                </div>
                            </div>

                            <!-- Pekerjaan Ayah -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_job">Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" id="father_job" name="father_job">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_company">Perusahaan Ayah</label>
                                    <input type="text" class="form-control" id="father_company" name="father_company">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_position">Jabatan Ayah</label>
                                    <input type="text" class="form-control" id="father_position" name="father_position">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_office_phone">Nomor Telepon Kantor Ayah</label>
                                    <input type="text" class="form-control" id="father_office_phone" name="father_office_phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_office_address">Alamat Kantor Ayah</label>
                                    <input type="text" class="form-control" id="father_office_address" name="father_office_address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="father_monthly_income">Pendapatan Bulanan Ayah</label>
                                    <input type="number" class="form-control" id="father_monthly_income" name="father_monthly_income" step="0.01">
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">

                            <!-- Informasi Ibu -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_name">Nama Ibu</label>
                                    <input type="text" class="form-control" id="mother_name" name="mother_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_email">Email Ibu</label>
                                    <input type="email" class="form-control" id="mother_email" name="mother_email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_phone">Nomor HP Ibu</label>
                                    <input type="text" class="form-control" id="mother_phone" name="mother_phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_nationality">Kewarganegaraan Ibu</label>
                                    <input type="text" class="form-control" id="mother_nationality" name="mother_nationality" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_id_card_number">Nomor KTP Ibu</label>
                                    <input type="text" class="form-control" id="mother_id_card_number" name="mother_id_card_number" required>
                                </div>
                            </div>

                            <!-- Pekerjaan Ibu -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_job">Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" id="mother_job" name="mother_job">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_company">Perusahaan Ibu</label>
                                    <input type="text" class="form-control" id="mother_company" name="mother_company">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_position">Jabatan Ibu</label>
                                    <input type="text" class="form-control" id="mother_position" name="mother_position">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_office_phone">Nomor Telepon Kantor Ibu</label>
                                    <input type="text" class="form-control" id="mother_office_phone" name="mother_office_phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_office_address">Alamat Kantor Ibu</label>
                                    <input type="text" class="form-control" id="mother_office_address" name="mother_office_address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mother_monthly_income">Pendapatan Bulanan Ibu</label>
                                    <input type="number" class="form-control" id="mother_monthly_income" name="mother_monthly_income" step="0.01">
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">

                            <!-- Informasi Wali -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_name">Nama Wali</label>
                                    <input type="text" class="form-control" id="guardian_name" name="guardian_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_email">Alamat E-mail Wali</label>
                                    <input type="email" class="form-control" id="guardian_email" name="guardian_email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_phone">Nomor HP Wali</label>
                                    <input type="text" class="form-control" id="guardian_phone" name="guardian_phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_nationality">Kewarganegaraan Wali</label>
                                    <input type="text" class="form-control" id="guardian_nationality" name="guardian_nationality">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_id_card_number">Nomor KTP/Paspor Wali</label>
                                    <input type="text" class="form-control" id="guardian_id_card_number" name="guardian_id_card_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_kitas_number">Nomor KITAS (Untuk WNA)</label>
                                    <input type="text" class="form-control" id="guardian_kitas_number" name="guardian_kitas_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_relationship">Hubungan Wali dengan Siswa</label>
                                    <input type="text" class="form-control" id="guardian_relationship" name="guardian_relationship">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_job">Pekerjaan Wali</label>
                                    <input type="text" class="form-control" id="guardian_job" name="guardian_job">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_company">Perusahaan Wali</label>
                                    <input type="text" class="form-control" id="guardian_company" name="guardian_company">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_position">Jabatan Wali</label>
                                    <input type="text" class="form-control" id="guardian_position" name="guardian_position">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_office_phone">No. Telepon Kantor Wali</label>
                                    <input type="text" class="form-control" id="guardian_office_phone" name="guardian_office_phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_office_address">Alamat Kantor Wali</label>
                                    <input type="text" class="form-control" id="guardian_office_address" name="guardian_office_address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="guardian_monthly_income">Pendapatan Bulanan Wali</label>
                                    <input type="number" class="form-control" id="guardian_monthly_income" name="guardian_monthly_income" step="0.01">
                                </div>
                            </div>


                            <!-- Submit Button -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
