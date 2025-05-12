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
        Schema::create('laporan_penjualan_bulanan', function (Blueprint $table) {
        $table->id();
        $table->string('bulan', 7); // format: YYYY-MM (contoh 2025-05)
        $table->integer('jumlah_transaksi');
        $table->decimal('total_penjualan', 15, 2);
        $table->decimal('total_keuntungan', 15, 2);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penjualan_bulanan');
    }
};
