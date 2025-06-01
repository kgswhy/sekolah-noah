<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestAtk extends Model
{
    protected $table = "request_atk";

    protected $fillable = [
        'nama_lengkap',
        'nomor_induk_karyawan',
        'unit',
        'divisi',
        'status_karyawan',
        'jabatan',
        'nama_barang',
        'jumlah',
        'satuan',
        'keterangan',
        'status',
        'approved_by',
        'approved_at',
        'rejected_message',
        'rejected_by',
        'rejected_at',
        'current_approval_level',
        'final_status',
        'approval_history',
        'department_type'
    ];
    
    protected $casts = [
        'nama_barang' => 'array',
        'jumlah' => 'array',
        'satuan' => 'array',
        'keterangan' => 'array',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
        'approval_history' => 'array'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function rejectedBy()
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }
} 