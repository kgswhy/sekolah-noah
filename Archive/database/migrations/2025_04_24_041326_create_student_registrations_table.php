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
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa');
            $table->string('tujuan_kelas');
            $table->string('asal_sekolah');
            $table->enum('status', ['Proses', 'Diterima', 'Ditolak'])->default('Proses');
            $table->boolean('pembayaran')->default(false);
            $table->boolean('observasi')->default(false);
            $table->boolean('pengumuman')->default(false);
            $table->boolean('id_card')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_registrations');
    }
};
