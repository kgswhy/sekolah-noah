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
        Schema::table('permintaan_designs', function (Blueprint $table) {
            // Update status field to enum
            $table->enum('status', ['pending','approved','rejected'])->default('pending')->change();
            
            // Add approval fields
            $table->integer('current_approval_level')->default(1)->after('status');
            $table->string('department_type')->default('non-akademik')->after('current_approval_level');
            $table->string('final_status')->nullable()->after('department_type');
            $table->json('approval_history')->nullable()->after('final_status');
            $table->unsignedBigInteger('approved_by')->nullable()->after('approval_history');
            $table->timestamp('approved_at')->nullable()->after('approved_by');
            $table->text('rejected_message')->nullable()->after('approved_at');
            $table->unsignedBigInteger('rejected_by')->nullable()->after('rejected_message');
            $table->timestamp('rejected_at')->nullable()->after('rejected_by');
            
            // Add foreign keys
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('rejected_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permintaan_designs', function (Blueprint $table) {
            $table->dropForeign(['approved_by']);
            $table->dropForeign(['rejected_by']);
            $table->dropColumn([
                'current_approval_level',
                'department_type',
                'final_status',
                'approval_history',
                'approved_by',
                'approved_at',
                'rejected_message',
                'rejected_by',
                'rejected_at'
            ]);
            // Revert status to varchar
            $table->string('status')->default('Proses')->change();
        });
    }
};
