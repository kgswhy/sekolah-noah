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
        Schema::table('payrolls', function (Blueprint $table) {
            // Ubah tipe kolom amount menjadi decimal
            $table->decimal('amount', 12, 2)->change();
            
            // Tambahkan foreign key constraint jika belum ada
            if (!Schema::hasColumn('payrolls', 'employee_id')) {
                $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            }
            
            // Tambahkan index jika belum ada
            if (!Schema::hasIndex('payrolls', 'payrolls_employee_id_index')) {
                $table->index('employee_id');
            }
            if (!Schema::hasIndex('payrolls', 'payrolls_date_index')) {
                $table->index('date');
            }
            if (!Schema::hasIndex('payrolls', 'payrolls_status_index')) {
                $table->index('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payrolls', function (Blueprint $table) {
            // Kembalikan tipe kolom amount ke bigInteger
            $table->bigInteger('amount')->change();
            
            // Hapus foreign key constraint
            $table->dropForeign(['employee_id']);
            
            // Hapus index
            $table->dropIndex(['employee_id']);
            $table->dropIndex(['date']);
            $table->dropIndex(['status']);
        });
    }
};
