<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk')->unique();
            $table->string('nama_produk');
            $table->string('merk')->nullable();
            $table->string('tipe')->nullable();
            $table->decimal('berat', 10, 2)->nullable(); // Berat dalam gram atau kg
            $table->unsignedBigInteger('categories_id');
            $table->decimal('harga_beli', 15, 2); // Harga beli dari supplier
            $table->decimal('harga_jual', 15, 2); // Harga normal (default)
            $table->integer('stok')->default(0);
            $table->timestamps();
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
