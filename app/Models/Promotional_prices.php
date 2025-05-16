<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotional_prices extends Model
{
    use HasFactory;

    protected $table = 'promotional_prices';

    protected $fillable = [
        'produk_id',
        'harga_promosi',
        'mulai_promo',
        'akhir_promo',
        'created_by',
    ];

    /**
     * Relasi ke produk yang dipromosikan
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    /**
     * Relasi ke user yang membuat promo (super admin / marketing)
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
