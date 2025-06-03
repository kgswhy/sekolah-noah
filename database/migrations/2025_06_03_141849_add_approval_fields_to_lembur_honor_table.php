<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('lembur_honor', function (Blueprint $table) {
            // Update current_approval_level to default 1 (already exists but needs default update)
            $table->integer('current_approval_level')->default(1)->change();
            
            // Update approval_history to JSON format (currently text)
            $table->json('approval_history')->nullable()->change();
            
            // Add only missing field
            $table->timestamp('approved_at')->nullable()->after('approved_by');
            
            // Add foreign key if not exists
            if (!Schema::hasColumn('lembur_honor', 'approved_by') || 
                empty(DB::select("SHOW CREATE TABLE lembur_honor")[0]->{'Create Table'} ?? '')) {
                $table->foreign('approved_by')->references('id')->on('users')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lembur_honor', function (Blueprint $table) {
            $table->dropColumn(['approved_at']);
            $table->integer('current_approval_level')->default(0)->change();
            $table->text('approval_history')->nullable()->change();
        });
    }
};
