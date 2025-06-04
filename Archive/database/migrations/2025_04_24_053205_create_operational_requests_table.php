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
        Schema::create('operational_requests', function (Blueprint $table) {
            $table->id();
            $table->string('unit');
            $table->string('divisi');
            $table->string('request_by');
            $table->enum('jenis', ['Kurir', 'Mobil']);
            $table->date('tanggal');
            $table->time('dari_jam');
            $table->time('sampai_jam');
            $table->string('tujuan');
            $table->text('keperluan');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operational_requests');
    }
};
