<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamanCicilan extends Model
{
    use HasFactory;

    protected $table = 'pinjaman_cicilan';
    protected $fillable = [
        'employee_id',
        'jumlah_pinjaman',
        'tujuan_pinjaman',
        'jangka_waktu',
        'cicilan_per_bulan',
        'tanggal_pengajuan',
        'dokumen_pendukung',
        'status',
        'approved_by',
        'rejected_message',
        'rejected_at',
        'created_at',
        'updated_at'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
} 