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
        Schema::create('klaim_berobats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_berobat');
            $table->string('nama_pasien');
            $table->string('hubungan');  // Diri Sendiri, Suami/Istri, Anak
            $table->text('diagnosa');
            $table->string('nama_dokter');
            $table->string('nama_rs');   // Rumah Sakit/Klinik
            $table->decimal('biaya', 12, 2);
            $table->string('bukti_pembayaran');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('rejected_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klaim_berobats');
    }
}; 