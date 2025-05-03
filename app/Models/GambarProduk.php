<?php
namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarProduk extends Model
{
    use HasFactory;

    protected $table = 'gambar_produk';

    protected $fillable = [
        'produk_id',
        'tipe',
        'path',
    ];

    /**
     * Relasi ke model Produk
     * GambarProduk belongs to Produk
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
