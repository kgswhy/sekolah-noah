<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentLoan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'equipment_name',
        'unit',
        'division',
        'loan_date',
        'return_date',
        'purpose',
        'status',
        'rejected_message',
        'approved_by',
        'rejected_by',
        'rejected_at'
    ];

    protected $casts = [
        'loan_date' => 'date',
        'return_date' => 'date',
        'rejected_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function rejecter()
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }
} 