<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LemburHonor extends Model
{
    use HasFactory;

    protected $table = 'lembur_honor';
    protected $fillable = [
        'employee_id',
        'jenis', // 'lembur' atau 'honor'
        'tanggal_mulai',
        'tanggal_selesai',
        'waktu_mulai',
        'waktu_selesai',
        'durasi',
        'keterangan',
        'kegiatan',
        'lokasi',
        'dokumen_pendukung',
        'status',
        'approved_by',
        'rejected_message',
        'rejected_at',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'waktu_mulai' => 'datetime:H:i',
        'waktu_selesai' => 'datetime:H:i',
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