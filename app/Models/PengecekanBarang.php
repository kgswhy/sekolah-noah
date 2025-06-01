<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengecekanBarang extends Model
{
    use HasFactory;

    protected $table = 'pengecekan_barang';

    protected $fillable = ['barang_id', 'tanggal', 'kondisi'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}

