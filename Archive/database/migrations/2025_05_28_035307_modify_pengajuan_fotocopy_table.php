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
        Schema::table('pengajuan_fotocopy', function (Blueprint $table) {
            // Make other fields nullable since they'll be filled from employee data
            $table->string('nama_lengkap')->nullable()->change();
            $table->string('nomor_induk_karyawan')->nullable()->change();
            $table->string('unit')->nullable()->change();
            $table->string('divisi')->nullable()->change();
            $table->string('status_karyawan')->nullable()->change();
            $table->string('jabatan')->nullable()->change();

            // Add approval fields
            $table->string('status')->default('pending')->after('keterangan');
            $table->tinyInteger('current_approval_level')->default(0)->after('status');
            $table->unsignedBigInteger('approved_by')->nullable()->after('current_approval_level');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            $table->string('rejected_message')->nullable()->after('approved_by');
            $table->timestamp('rejected_at')->nullable()->after('rejected_message');
            $table->unsignedBigInteger('rejected_by')->nullable()->after('rejected_at');
            $table->foreign('rejected_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan_fotocopy', function (Blueprint $table) {
            // Make fields required again
            $table->string('nama_lengkap')->nullable(false)->change();
            $table->string('nomor_induk_karyawan')->nullable(false)->change();
            $table->string('unit')->nullable(false)->change();
            $table->string('divisi')->nullable(false)->change();
            $table->string('status_karyawan')->nullable(false)->change();
            $table->string('jabatan')->nullable(false)->change();

            // Remove approval fields
            $table->dropColumn('status');
            $table->dropColumn('current_approval_level');
            $table->dropForeign(['approved_by']);
            $table->dropColumn('approved_by');
            $table->dropColumn('rejected_message');
            $table->dropColumn('rejected_at');
            $table->dropForeign(['rejected_by']);
            $table->dropColumn('rejected_by');
        });
    }
};
