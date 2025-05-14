<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stok';

    protected $fillable = [
        'produk_id',
        'tanggal_masuk',
        'tanggal_kedaluarsa',
        'jumlah_masuk',
        'jumlah_terjual',
        'harga_beli',
        'harga_jual',
    ];

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
