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
        // surat_tugas already has all required approval fields
        // Just update approval_history to JSON if needed
        Schema::table('surat_tugas', function (Blueprint $table) {
            $table->json('approval_history')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surat_tugas', function (Blueprint $table) {
            $table->text('approval_history')->nullable()->change();
        });
    }
};
