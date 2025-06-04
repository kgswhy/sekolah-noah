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
        Schema::table('payroll_components', function (Blueprint $table) {
            // Ubah tipe kolom amount menjadi decimal
            $table->decimal('amount', 12, 2)->change();
            
            // Tambahkan foreign key constraint jika belum ada
            if (!Schema::hasColumn('payroll_components', 'payroll_id')) {
                $table->foreignId('payroll_id')->constrained('payrolls')->onDelete('cascade');
            }
            
            // Tambahkan index jika belum ada
            if (!Schema::hasIndex('payroll_components', 'payroll_components_payroll_id_index')) {
                $table->index('payroll_id');
            }
            if (!Schema::hasIndex('payroll_components', 'payroll_components_title_index')) {
                $table->index('title');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payroll_components', function (Blueprint $table) {
            // Kembalikan tipe kolom amount ke bigInteger
            $table->bigInteger('amount')->change();
            
            // Hapus foreign key constraint
            $table->dropForeign(['payroll_id']);
            
            // Hapus index
            $table->dropIndex(['payroll_id']);
            $table->dropIndex(['title']);
        });
    }
};
