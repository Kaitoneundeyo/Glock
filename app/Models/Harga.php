<?php
namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    use HasFactory;

    protected $fillable = ['produk_id', 'harga', 'diskon'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
