<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinBrief extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'employee_id',
        'tanggal',
        'waktu',
        'keperluan',
        'dokumen',
        'status',
        'rejected_message',
    ];
    
    /**
     * Get the employee that owns the brief leave request.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
