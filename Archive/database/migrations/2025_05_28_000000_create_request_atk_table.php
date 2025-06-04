<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('request_atk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('nama_lengkap');
            $table->string('nomor_induk_karyawan');
            $table->string('unit');
            $table->string('divisi');
            $table->string('status_karyawan');
            $table->string('jabatan');
            $table->json('nama_barang');
            $table->json('jumlah');
            $table->json('satuan');
            $table->json('keterangan');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('rejected_message')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('request_atk');
    }
}; 