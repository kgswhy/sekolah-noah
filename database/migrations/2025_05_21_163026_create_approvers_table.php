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
        Schema::create('approvers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('module')->default('cuti'); // For future expansion to other modules
            $table->string('description')->nullable();
            $table->boolean('active')->default(true);
            $table->tinyInteger('approval_level')->default(1); // Level 1, 2, or 3
            $table->string('department_type')->default('non-akademik');
            $table->timestamps();

            // Ensure one user can only be approver for a module at a specific level
            $table->unique(['user_id', 'module', 'approval_level', 'department_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvers');
    }
};
