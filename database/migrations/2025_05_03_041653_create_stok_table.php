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
        Schema::create('stok', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->date('tanggal_masuk');
            $table->date('tanggal_kedaluwarsa')->nullable();
            $table->integer('jumlah_masuk');
            $table->integer('jumlah_terjual')->default(0);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};
