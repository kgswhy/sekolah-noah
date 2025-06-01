<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugas extends Model
{
    use HasFactory;

    protected $table = 'surat_tugas';

    protected $fillable = [
        'employee_id',
        'nomor_surat',
        'judul_tugas',
        'deskripsi_tugas',
        'tujuan_tugas',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi_tugas',
        'keterangan',
        'dokumen_pendukung',
        'status',
        'approved_by',
        'rejected_message',
        'rejected_at',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'rejected_at' => 'datetime',
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
