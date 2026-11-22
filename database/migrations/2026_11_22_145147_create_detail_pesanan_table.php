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
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pesanan_id')->constrained('pesanan')->cascadeOnDelete();
            $table->foreignId('menu_id')->constrained('menu')->restrictOnDelete();
            $table->unsignedSmallInteger('jumlah');
            $table->unsignedInteger('harga_satuan');   // snapshot harga saat pesan
            $table->unsignedSmallInteger('kalori_satuan'); // snapshot kalori saat pesan
            $table->unsignedInteger('subtotal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pesanan');
    }
};
