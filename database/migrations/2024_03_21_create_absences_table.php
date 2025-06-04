<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('absences')) {
            Schema::create('absences', function (Blueprint $table) {
                $table->id();
                $table->foreignId('schedule_id')->constrained()->onDelete('cascade');
                $table->datetime('clock_in');
                $table->datetime('clock_out')->nullable();
                $table->string('status')->default('present');
                $table->timestamps();
            });
        } else {
            // Modify existing table if needed
            Schema::table('absences', function (Blueprint $table) {
                if (!Schema::hasColumn('absences', 'clock_in')) {
                    $table->datetime('clock_in');
                }
                if (!Schema::hasColumn('absences', 'clock_out')) {
                    $table->datetime('clock_out')->nullable();
                }
                if (!Schema::hasColumn('absences', 'status')) {
                    $table->string('status')->default('present');
                }
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('absences');
    }
}; 