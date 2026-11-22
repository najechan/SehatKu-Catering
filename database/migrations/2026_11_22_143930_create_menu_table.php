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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori')->restrictOnDelete();
            $table->string('nama', 150);
            $table->text('deskripsi')->nullable();
            $table->unsignedInteger('harga');
            $table->unsignedSmallInteger('kalori');
            $table->decimal('protein', 5, 1)->default(0);
            $table->decimal('karbohidrat', 5, 1)->default(0);
            $table->decimal('lemak', 5, 1)->default(0);
            $table->string('foto_utama')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
