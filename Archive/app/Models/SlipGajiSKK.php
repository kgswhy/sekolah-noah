<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlipGajiSKK extends Model
{
    use HasFactory;
    
    protected $table = 'slip_gaji_skk';
    
    protected $fillable = [
        'employee_id',
        'jenis_permintaan', // Slip Gaji or Surat Keterangan Kerja
        'keterangan',
        'bulan_tahun',
        'dokumen_pendukung',
        'status',
        'rejected_message',
    ];
    
    /**
     * Get the employee that owns the request.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
} 