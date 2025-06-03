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
        Schema::table('request_atk', function (Blueprint $table) {
            $table->integer('current_approval_level')->default(1)->after('status');
            $table->string('department_type')->default('non-akademik')->after('current_approval_level');
            $table->string('final_status')->nullable()->after('department_type');
            $table->json('approval_history')->nullable()->after('final_status');
            $table->unsignedBigInteger('rejected_by')->nullable()->after('rejected_message');
            
            // Add foreign key for rejected_by
            $table->foreign('rejected_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request_atk', function (Blueprint $table) {
            $table->dropForeign(['rejected_by']);
            $table->dropColumn([
                'current_approval_level',
                'department_type', 
                'final_status',
                'approval_history',
                'rejected_by'
            ]);
        });
    }
};
