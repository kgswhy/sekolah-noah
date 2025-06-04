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
        Schema::table('salary_components', function (Blueprint $table) {
            // Ubah tipe kolom amount menjadi decimal
            $table->decimal('amount', 12, 2)->change();
            
            // Tambahkan index untuk pencarian cepat
            if (!Schema::hasIndex('salary_components', 'salary_components_employee_id_index')) {
                $table->index('employee_id');
            }
            if (!Schema::hasIndex('salary_components', 'salary_components_title_index')) {
                $table->index('title');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salary_components', function (Blueprint $table) {
            // Kembalikan tipe kolom amount ke bigInteger
            $table->bigInteger('amount')->change();
            
            // Hapus index
            $table->dropIndex(['employee_id']);
            $table->dropIndex(['title']);
        });
    }
};
