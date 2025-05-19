<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_ins extends Model
{
    use HasFactory;

    protected $table = 'Stock_ins';

    protected $fillable = [
        'produk_id',
        'jumlah',
        'harga_beli',
        'tanggal_masuk',
        'expired_at',
        'no_invoice',
    ];

    public function ambilproduk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
