<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'jumlah_barang', 'nama_ruangan', 'nomor_ruangan'];

    public function pengecekan()
    {
        return $this->hasMany(PengecekanBarang::class);
    }
}