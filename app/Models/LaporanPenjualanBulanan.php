<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPenjualanBulanan extends Model
{
    protected $fillable = [
        'bulan', 'jumlah_transaksi', 'total_penjualan', 'total_keuntungan',
    ];
}
