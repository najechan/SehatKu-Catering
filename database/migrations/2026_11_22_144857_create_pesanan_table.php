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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pesanan', 20)->unique();
            $table->string('nama_pemesan', 100);
            $table->string('no_hp', 20);
            $table->text('alamat');
            $table->date('tanggal_antar')->index();
            $table->unsignedInteger('total_harga');
            $table->unsignedInteger('total_kalori');
            $table->string('status', 20)->default('menunggu_pembayaran')->index();
            $table->string('bukti_bayar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
