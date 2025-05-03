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
            $table->string('nama_produk');
            $table->foreignId('categories_id')->constrained('categories')->onDelete('cascade');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 10, 2)->nullable(); // diisi oleh superadmin
            $table->decimal('diskon', 5, 2)->default(0); // persen (opsional)
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
