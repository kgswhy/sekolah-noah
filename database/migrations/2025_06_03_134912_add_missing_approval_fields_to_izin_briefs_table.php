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
        Schema::table('izin_briefs', function (Blueprint $table) {
            // Update current_approval_level to default 1 instead of 0
            $table->integer('current_approval_level')->default(1)->change();
            
            // Add missing fields
            $table->string('department_type')->default('non-akademik')->after('final_status');
            $table->unsignedBigInteger('approved_by')->nullable()->after('approval_history');
            $table->timestamp('approved_at')->nullable()->after('approved_by');
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
        Schema::table('izin_briefs', function (Blueprint $table) {
            $table->dropForeign(['approved_by']);
            $table->dropForeign(['rejected_by']);
            $table->dropColumn([
                'department_type',
                'approved_by',
                'approved_at',
                'rejected_by',
                'rejected_at'
            ]);
            // Revert current_approval_level to default 0
            $table->integer('current_approval_level')->default(0)->change();
        });
    }
};
