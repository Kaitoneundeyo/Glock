<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock_ins; // atau model stock_ins kalau beda

class StokSeeder extends Seeder
{
    public function run()
    {
        // Contoh sederhana, sesuaikan dengan data kamu
       Stock_ins::insert([
        [
                'produk_id' => 1,
                'jumlah' => 50,
                'harga_beli' => 27000,
                'tanggal_masuk' => now(),
                'expired_at' => now()->addYear(),
                'no_invoice' => 'INV-001',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'produk_id' => 2,
                'jumlah' => 50,
                'harga_beli' => 25000,
                'tanggal_masuk' => now(),
                'expired_at' => now()->addMonths(6),
                'no_invoice' => 'INV-002',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
