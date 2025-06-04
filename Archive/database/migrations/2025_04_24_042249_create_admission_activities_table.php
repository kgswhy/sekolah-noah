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
        Schema::create('admission_activities', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('kegiatan');
            $table->text('deskripsi_kegiatan');
            $table->string('dokumen_pendukung')->nullable();
            $table->enum('status', ['Dijadwalkan', 'Berlangsung', 'Selesai'])->default('Dijadwalkan');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_activities');
    }
};
