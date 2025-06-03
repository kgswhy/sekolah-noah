<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'keterangan',
        'dokumen',
        'telepon',
        'status',
        'rejected_message',
        'current_approval_level',
        'department_type',
        'approved_by',
        'rejected_by',
        'approved_at',
        'rejected_at',
        'final_status',
        'approval_history'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
        'approval_history' => 'array'
    ];

    // Define the relationship with the Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Define the relationship with the User model for approver
    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // Define the relationship with the User model for rejector
    public function rejector()
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }
}
