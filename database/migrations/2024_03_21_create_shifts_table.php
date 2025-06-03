<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('shifts')) {
            Schema::create('shifts', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->time('start_time');
                $table->time('end_time');
                $table->timestamps();
            });
        } else {
            // Modify existing table if needed
            Schema::table('shifts', function (Blueprint $table) {
                if (!Schema::hasColumn('shifts', 'title')) {
                    $table->string('title');
                }
                if (!Schema::hasColumn('shifts', 'start_time')) {
                    $table->time('start_time');
                }
                if (!Schema::hasColumn('shifts', 'end_time')) {
                    $table->time('end_time');
                }
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('shifts');
    }
}; 