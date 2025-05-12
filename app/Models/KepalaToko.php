<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepalaToko extends Model
{
    protected $fillable = [
        'user_id', 'nama_toko', 'alamat', 'no_telp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

