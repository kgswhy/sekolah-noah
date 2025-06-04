<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('request_atk', function (Blueprint $table) {
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->timestamp('approved_at')->nullable();
            $table->text('rejected_message')->nullable();
            $table->foreignId('rejected_by')->nullable()->constrained('users');
            $table->timestamp('rejected_at')->nullable();
            $table->integer('current_approval_level')->default(1);
            $table->string('final_status')->nullable();
            $table->text('approval_history')->nullable();
            $table->string('department_type')->default('non-akademik');
        });
    }

    public function down()
    {
        Schema::table('request_atk', function (Blueprint $table) {
            $table->dropForeign(['approved_by']);
            $table->dropForeign(['rejected_by']);
            $table->dropColumn([
                'approved_by',
                'approved_at',
                'rejected_message',
                'rejected_by',
                'rejected_at',
                'current_approval_level',
                'final_status',
                'approval_history',
                'department_type'
            ]);
        });
    }
}; 