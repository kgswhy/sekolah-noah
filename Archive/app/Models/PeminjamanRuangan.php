<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanRuangan extends Model
{
    use HasFactory;

    protected $table = "peminjaman_ruangan";

    protected $fillable = [
        'nama_karyawan',
        'tanggal_pengajuan',
        'tanggal_diperlukan',
        'waktu_pelaksanaan',
        'unit',
        'departemen',
        'nama_kegiatan',
        'tempat_kegiatan',
        'ruangan',
        'jumlah',
        'keterangan'
    ];

    // Casting 'ruangan', 'jumlah', dan 'keterangan' ke format array
    protected $casts = [
        'ruangan' => 'array',
        'jumlah' => 'array',
        'keterangan' => 'array',
    ];
}
