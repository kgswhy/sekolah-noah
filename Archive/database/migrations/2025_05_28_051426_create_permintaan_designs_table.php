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
        Schema::create('permintaan_designs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->string('email');
            $table->string('unit');
            $table->string('divisi');
            $table->string('kategori');
            $table->string('kategori_lainnya')->nullable();
            $table->string('kegiatan');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_deadline');
            $table->string('dokumen_pendukung')->nullable();
            $table->string('status')->default('Proses');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_designs');
    }
};
