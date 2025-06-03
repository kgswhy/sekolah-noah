<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('schedules')) {
            Schema::create('schedules', function (Blueprint $table) {
                $table->id();
                $table->foreignId('employee_id')->constrained()->onDelete('cascade');
                $table->foreignId('shift_id')->constrained()->onDelete('cascade');
                $table->date('date');
                $table->timestamps();
            });
        } else {
            // Modify existing table if needed
            Schema::table('schedules', function (Blueprint $table) {
                if (!Schema::hasColumn('schedules', 'employee_id')) {
                    $table->foreignId('employee_id')->constrained()->onDelete('cascade');
                }
                if (!Schema::hasColumn('schedules', 'shift_id')) {
                    $table->foreignId('shift_id')->constrained()->onDelete('cascade');
                }
                if (!Schema::hasColumn('schedules', 'date')) {
                    $table->date('date');
                }
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}; 