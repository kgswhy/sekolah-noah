<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlaimBerobat extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'employee_id',
        'tanggal_berobat',
        'nama_pasien',
        'hubungan',
        'diagnosa',
        'nama_dokter',
        'nama_rs',
        'biaya',
        'bukti_pembayaran',
        'status',
        'rejected_message',
    ];
    
    /**
     * Get the employee that owns the medical claim request.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
} 