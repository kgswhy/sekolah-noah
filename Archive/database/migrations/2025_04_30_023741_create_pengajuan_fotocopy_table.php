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
        Schema::create('pengajuan_fotocopy', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('nama_lengkap');
            $table->string('nomor_induk_karyawan');
            $table->string('unit');
            $table->string('divisi');
            $table->string('status_karyawan');
            $table->string('jabatan');
            $table->string('kegiatan');
            $table->string('subject');
            $table->string('kelas');
            $table->date('tanggal_penggunaan');
            $table->json('nama_barang');
            $table->json('jumlah_halaman');
            $table->json('jumlah_diperlukan');
            $table->json('keterangan');
            $table->timestamps();
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
