<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_fotocopy', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('nomor_induk_karyawan')->nullable();
            $table->string('unit')->nullable();
            $table->string('divisi')->nullable();
            $table->string('status_karyawan')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('kegiatan');
            $table->string('subject');
            $table->string('kelas');
            $table->date('tanggal_penggunaan');
            $table->json('nama_barang');
            $table->json('jumlah_halaman');
            $table->json('jumlah_diperlukan');
            $table->json('keterangan');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->integer('current_approval_level')->default(1);
            $table->string('department_type')->default('non-akademik');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->string('rejected_message')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->unsignedBigInteger('rejected_by')->nullable();
            $table->string('final_status')->nullable();
            $table->json('approval_history')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('set null');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('rejected_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_fotocopy');
    }
};
