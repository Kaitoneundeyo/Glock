<?php

namespace App\Models;
use App\Models\Stok;
use App\Models\Category;
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
        'harga',
        'diskon'
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

    
}
