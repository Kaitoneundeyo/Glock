<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'transaksi_id', 'metode', 'jumlah_bayar', 'kembalian',
        'midtrans_transaction_id', 'status_midtrans', 'midtrans_response',
    ];

    protected $casts = [
        'midtrans_response' => 'array',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
