<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = [
        'nama', 'no_telp', 'alamat',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}

