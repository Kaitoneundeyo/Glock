<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Produk::insert([
            [
                'kode_produk'   => 'PRD001',
                'nama_produk'   => 'Sosis Keju',
                'merk'          => 'So Nice',
                'tipe'          => 'Cocktail',
                'berat'         => 250,
                'categories_id' => 1,
                'harga_beli'    => 27000,
                'harga_jual'    => 35000,
                'stok'          => 50,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'kode_produk'   => 'PRD002',
                'nama_produk'   => 'Nugget Bubble Crispy',
                'merk'          => 'Kanzler',
                'tipe'          => 'Dino',
                'berat'         => 500,
                'categories_id' => 1,
                'harga_beli'    => 250000,
                'harga_jual'    => 300000,
                'stok'          => 50,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'kode_produk'   => 'PRD003',
                'nama_produk'   => 'Chikua',
                'merk'          => 'Cedea',
                'tipe'          => 'Bulat',
                'berat'         => 500,
                'categories_id' => 2,
                'harga_beli'    => 30000,
                'harga_jual'    => 35000,
                'stok'          => 100,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
