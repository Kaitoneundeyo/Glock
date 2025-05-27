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
        'stok',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function stokMasukItems()
    {
        return $this->hasMany(Stok_masuk_item::class);
    }

    public function harga()
    {
        return $this->hasOne(HargaProduk::class);
    }
}
