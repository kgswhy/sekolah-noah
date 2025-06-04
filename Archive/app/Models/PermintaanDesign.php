<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanDesign extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'unit',
        'divisi',
        'kategori',
        'kategori_lainnya',
        'kegiatan',
        'deskripsi',
        'tanggal_deadline',
        'dokumen_pendukung',
        'status',
    ];
}
