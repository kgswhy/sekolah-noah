<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanFotocopy extends Model
{
    protected $table = "pengajuan_fotocopy";

    protected $fillable = [
        'employee_id',
        'nama_lengkap',
        'nomor_induk_karyawan',
        'unit',
        'divisi',
        'status_karyawan',
        'jabatan',
        'kegiatan',
        'subject',
        'kelas',
        'tanggal_penggunaan',
        'nama_barang',
        'jumlah_halaman',
        'jumlah_diperlukan',
        'keterangan',
        'status',
        'current_approval_level',
        'approved_by',
        'rejected_message',
        'rejected_at',
        'rejected_by'
    ];
    
    protected $casts = [
        'nama_barang' => 'array',
        'jumlah_halaman' => 'array',
        'jumlah_diperlukan' => 'array',
        'keterangan' => 'array',
        'rejected_at' => 'datetime'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
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
