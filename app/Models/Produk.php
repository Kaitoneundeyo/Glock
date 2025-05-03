<?php

namespace App\Models;
use App\Models\Stok;
use App\Models\Category;
use App\Models\Harga;
use App\Models\GambarProduk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'kategori_id',
        'deskripsi',
        'tanggal_masuk'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function stok()
    {
        return $this->hasOne(Stok::class, 'produk_id');
    }

    public function harga()
    {
        return $this->hasOne(Harga::class);
    }

    public function gambarProduk() 
    {
        return $this->hasOne(GambarProduk::class);
    }

    public function gambarUtama()
    {
    return $this->hasOne(GambarProduk::class)->where('tipe', 'utama');
    }

    public function gambarCaraOlah()
    {
        return $this->hasOne(GambarProduk::class)->where('tipe', 'cara_olah');
    }

    public function gambarResep()
    {
        return $this->hasOne(GambarProduk::class)->where('tipe', 'resep');
    }
}
