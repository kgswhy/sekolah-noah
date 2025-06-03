<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cutis', function (Blueprint $table) {
            $table->integer('current_approval_level')->default(0)->after('status');
            $table->string('final_status')->nullable()->after('current_approval_level');
            $table->text('approval_history')->nullable()->after('final_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cutis', function (Blueprint $table) {
            $table->dropColumn([
                'current_approval_level',
                'final_status',
                'approval_history'
            ]);
        });
    }
}; 