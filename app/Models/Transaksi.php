<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'user_id', 'pelanggan_id', 'kode_transaksi', 'tanggal_transaksi',
        'total_harga', 'total_keuntungan', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function details()
    {
        return $this->hasMany(TransaksiDetail::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}

