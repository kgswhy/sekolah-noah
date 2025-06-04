<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutisTable extends Migration
{
    public function up()
    {
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');  // Link to the Employee model
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('alasan');
            $table->text('keterangan')->nullable();
            $table->string('dokumen')->nullable();  // Store file path for the supporting document
            $table->string('telepon');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('rejected_message')->nullable();
            $table->timestamps();

            // Define foreign key constraint for employee_id (link to employees table)
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cutis');
    }
}
