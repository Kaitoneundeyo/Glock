<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPenjualanHarian extends Model
{
    protected $fillable = [
        'tanggal', 'jumlah_transaksi', 'total_penjualan', 'total_keuntungan',
    ];
}
