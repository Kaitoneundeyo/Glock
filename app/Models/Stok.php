<?php
namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stok';

    protected $fillable = [
        'produk_id',
        'jumlah',
        'user_id'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function adminGudang()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
