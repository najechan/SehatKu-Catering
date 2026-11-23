<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Rendah kalori', 'Tinggi protein', 'Vegetarian'] as $nama) {
            Kategori::updateOrCreate(
                ['slug' => Str::slug($nama)],
                ['nama' => $nama]
            );
        }
    }
}