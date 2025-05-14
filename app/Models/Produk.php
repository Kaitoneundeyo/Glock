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
    ];

    // Relasi ke kategori (jika kamu punya model Kategori)
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    // Relasi ke stok
    public function stok()
    {
        return $this->hasMany(Stok::class, 'produk_id');
    }

    // Optional: Hitung total stok tersedia (masuk - keluar)
    public function getStokTersediaAttribute()
    {
        return $this->stok()->sum('jumlah');
    }
}
