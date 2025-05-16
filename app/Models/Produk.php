<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'merk',
        'tipe',
        'berat',
        'categories_id',
        'harga_beli',
        'harga_jual',
        'stok',
    ];

    // Relasi ke kategori (jika kamu punya model Kategori)
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

}
