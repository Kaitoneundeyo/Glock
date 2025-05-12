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
            Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // kasir
            $table->foreignId('pelanggan_id')->nullable()->constrained('pelanggan'); // opsional
            $table->string('kode_transaksi')->unique();
            $table->dateTime('tanggal_transaksi');
            $table->decimal('total_harga', 15, 2);
            $table->decimal('total_keuntungan', 15, 2);
            $table->enum('status', ['selesai', 'batal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
