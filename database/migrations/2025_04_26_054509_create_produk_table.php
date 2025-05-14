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
        $table->string('kode_produk')->unique(); // Barcode
        $table->string('nama_produk');
        $table->string('merk');
        $table->string('tipe')->nullable(); // Varian (opsional)
        $table->integer('berat')->nullable(); // Gram/ml (opsional)
        $table->foreignId('categories_id')->constrained();
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
