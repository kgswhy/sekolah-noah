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
        Schema::create('peminjaman_ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');  // Nama karyawan diketik manual
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_diperlukan');
            $table->string('waktu_pelaksanaan');
            $table->string('unit');
            $table->string('departemen');
            $table->string('nama_kegiatan');
            $table->string('tempat_kegiatan');
            $table->json('ruangan');  // Menyimpan nama ruangan dalam format JSON
            $table->json('jumlah');    // Menyimpan jumlah ruangan dalam format JSON
            $table->json('keterangan'); // Menyimpan keterangan ruangan dalam format JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_ruangans');
    }
};
