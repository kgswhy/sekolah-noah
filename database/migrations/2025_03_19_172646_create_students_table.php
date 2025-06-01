<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('full_name'); // Nama Siswa Berdasarkan Akta Kelahiran
            $table->string('school_id'); // Nomor Induk Sekolah
            $table->string('national_school_id'); // Nomor Induk Sekolah Nasional
            $table->string('nickname'); // Nama panggilan
            $table->string('class'); // Kelas
            $table->string('place_of_birth'); // Tempat Lahir
            $table->date('date_of_birth'); // Tanggal Lahir
            $table->enum('gender', ['male', 'female']); // Jenis Kelamin
            $table->string('religion'); // Agama
            $table->string('nationality'); // Kewarganegaraan
            $table->string('address'); // Alamat Tinggal
            $table->string('city'); // Kota
            $table->string('postal_code'); // Kode Pos
            $table->string('living_with'); // Siswa Tinggal dengan
            $table->boolean('has_siblings_at_school'); // Apakah calon siswa mempunyai kakak atau adik yang bersekolah di SEKOLAH NOAH

            // Previous School Data
            $table->string('previous_school_name')->nullable(); // Nama Sekolah Terdahulu
            $table->string('previous_school_class')->nullable(); // Kelas di Sekolah Terdahulu
            $table->string('previous_school_address')->nullable(); // Alamat Sekolah Terdahulu
            $table->string('previous_school_phone')->nullable(); // Nomor Telepon Sekolah Terdahulu

            // Father's Information
            $table->string('father_name'); // Nama Ayah
            $table->string('father_email'); // Alamat E-mail Ayah
            $table->string('father_phone'); // Nomor HP Ayah
            $table->string('father_nationality'); // Kewarganegaraan Ayah
            $table->string('father_id_card_number'); // Nomor KTP atau Paspor Ayah
            $table->string('father_kitas_number')->nullable(); // Nomor KITAS (Untuk WNA)

            // Father's Work Information
            $table->string('father_job'); // Pekerjaan Ayah
            $table->string('father_company'); // Perusahaan Ayah
            $table->string('father_position'); // Jabatan Ayah
            $table->string('father_office_phone'); // No. Telepon Kantor Ayah
            $table->string('father_office_address'); // Alamat Kantor Ayah
            $table->decimal('father_monthly_income', 10, 2); // Informasi pendapatan per-bulan Ayah

            // Mother's Information
            $table->string('mother_name'); // Nama Ibu
            $table->string('mother_email'); // Alamat E-mail Ibu
            $table->string('mother_phone'); // Nomor HP Ibu
            $table->string('mother_nationality'); // Kewarganegaraan Ibu
            $table->string('mother_id_card_number'); // Nomor KTP atau Paspor Ibu
            $table->string('mother_kitas_number')->nullable(); // Nomor KITAS (Untuk WNA)

            // Mother's Work Information
            $table->string('mother_job'); // Pekerjaan Ibu
            $table->string('mother_company'); // Perusahaan Ibu
            $table->string('mother_position'); // Jabatan Ibu
            $table->string('mother_office_phone'); // No. Telepon Kantor Ibu
            $table->string('mother_office_address'); // Alamat Kantor Ibu
            $table->decimal('mother_monthly_income', 10, 2); // Informasi pendapatan per-bulan Ibu

            // Guardian's Information
            $table->string('guardian_name')->nullable(); // Nama Wali
            $table->string('guardian_email')->nullable(); // Alamat E-mail Wali
            $table->string('guardian_phone')->nullable(); // Nomor HP Wali
            $table->string('guardian_nationality')->nullable(); // Kewarganegaraan Wali
            $table->string('guardian_id_card_number')->nullable(); // Nomor KTP atau Paspor Wali
            $table->string('guardian_kitas_number')->nullable(); // Nomor KITAS (Untuk WNA)

            // Guardian's Work Information
            $table->string('guardian_job')->nullable(); // Pekerjaan Wali
            $table->string('guardian_company')->nullable(); // Perusahaan Wali
            $table->string('guardian_position')->nullable(); // Jabatan Wali
            $table->string('guardian_office_phone')->nullable(); // No. Telepon Kantor Wali
            $table->string('guardian_office_address')->nullable(); // Alamat Kantor Wali
            $table->decimal('guardian_monthly_income', 10, 2)->nullable(); // Informasi pendapatan per-bulan Wali

            $table->timestamps(); // Automatically generated timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
