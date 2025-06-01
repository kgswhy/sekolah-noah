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
            // Make employee-related fields nullable since we'll use employee_id
            $table->string('nama_lengkap')->nullable()->change();
            $table->string('nomor_induk_karyawan')->nullable()->change();
            $table->string('unit')->nullable()->change();
            $table->string('divisi')->nullable()->change();
            $table->string('status_karyawan')->nullable()->change();
            $table->string('jabatan')->nullable()->change();

            // Add approval-related fields
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->after('jabatan');
            $table->integer('current_approval_level')->default(1)->after('status');
            $table->string('department_type')->default('non-akademik')->after('current_approval_level');
            $table->unsignedBigInteger('approved_by')->nullable()->after('department_type');
            $table->timestamp('approved_at')->nullable()->after('approved_by');
            $table->string('rejected_message')->nullable()->after('approved_at');
            $table->timestamp('rejected_at')->nullable()->after('rejected_message');
            $table->unsignedBigInteger('rejected_by')->nullable()->after('rejected_at');
            $table->string('final_status')->nullable()->after('rejected_by');
            $table->text('approval_history')->nullable()->after('final_status');

            // Add foreign key constraints
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('rejected_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan_fotocopy', function (Blueprint $table) {
            // Make employee-related fields required again
            $table->string('nama_lengkap')->nullable(false)->change();
            $table->string('nomor_induk_karyawan')->nullable(false)->change();
            $table->string('unit')->nullable(false)->change();
            $table->string('divisi')->nullable(false)->change();
            $table->string('status_karyawan')->nullable(false)->change();
            $table->string('jabatan')->nullable(false)->change();

            // Drop approval-related fields
            $table->dropForeign(['approved_by']);
            $table->dropForeign(['rejected_by']);
            $table->dropColumn([
                'status',
                'current_approval_level',
                'department_type',
                'approved_by',
                'approved_at',
                'rejected_message',
                'rejected_at',
                'rejected_by',
                'final_status',
                'approval_history'
            ]);
        });
    }
};
