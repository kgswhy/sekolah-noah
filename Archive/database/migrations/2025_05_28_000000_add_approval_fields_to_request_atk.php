<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('request_atk', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->bigInteger('approved_by')->unsigned()->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->text('rejected_message')->nullable();
            $table->bigInteger('rejected_by')->unsigned()->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->integer('current_approval_level')->default(1);
            $table->string('final_status')->nullable();
            $table->text('approval_history')->nullable();
            $table->string('department_type')->default('non-akademik');

            $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('rejected_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('request_atk', function (Blueprint $table) {
            $table->dropForeign(['approved_by']);
            $table->dropForeign(['rejected_by']);
            $table->dropColumn([
                'status',
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