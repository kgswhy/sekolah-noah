<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->string('employee_number')->unique();
            $table->string('unit')->nullable();
            $table->string('division')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('position')->nullable();
            $table->string('gender')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('bpjs_ketenagakerjaan_number')->nullable();
            $table->string('bpjs_kesehatan_number')->nullable();
            $table->string('nik')->nullable();
            $table->string('kk_number')->nullable();
            $table->string('religion')->nullable();
            $table->string('last_education')->nullable();
            $table->text('ktp_address')->nullable();
            $table->text('domicile_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('npwp_number')->nullable();
            $table->string('school_email')->nullable();
            $table->string('other_email')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('employee_status')->default('aktif');
            $table->date('entry_date')->nullable();
            $table->date('exit_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}; 