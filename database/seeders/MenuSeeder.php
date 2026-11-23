<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // DATA CONTOH. Ganti dengan data gizi asli milik UMKM sebelum demo.
        $data = [
            ['Ayam panggang quinoa', 'tinggi-protein', 32000, 380, 32, 38, 9,
                'Dada ayam panggang dengan quinoa dan sayuran kukus, dibumbui rempah tanpa tambahan gula.'],
            ['Salad tuna alpukat', 'rendah-kalori', 28000, 320, 28, 14, 18,
                'Tuna, alpukat, dan sayuran segar dengan dressing lemon.'],
            ['Oatmeal buah berry', 'vegetarian', 22000, 290, 9, 48, 7,
                'Oatmeal dengan campuran buah berry dan sedikit madu.'],
            ['Nasi merah ayam kukus', 'tinggi-protein', 30000, 450, 35, 55, 9,
                'Nasi merah dengan ayam kukus dan tumis sayur.'],
            ['Smoothie bowl hijau', 'vegetarian', 26000, 260, 7, 45, 6,
                'Smoothie bayam dan pisang dengan topping granola dan buah.'],
            ['Tahu tempe panggang', 'vegetarian', 20000, 340, 22, 30, 15,
                'Tahu dan tempe panggang dengan sambal tanpa minyak berlebih.'],
            ['Sup ayam sayur', 'rendah-kalori', 24000, 280, 26, 20, 10,
                'Sup ayam bening dengan wortel, kentang, dan brokoli.'],
            ['Shrimp egg tortilla', 'tinggi-protein', 25000, 360, 28, 32, 13,
                'Tortilla gandum isi udang, telur, dan sayuran.'],
        ];

        foreach ($data as [$nama, $slugKategori, $harga, $kalori, $p, $k, $l, $deskripsi]) {
            Menu::updateOrCreate(
                ['nama' => $nama],
                [
                    'kategori_id' => Kategori::where('slug', $slugKategori)->value('id'),
                    'deskripsi' => $deskripsi,
                    'harga' => $harga,
                    'kalori' => $kalori,
                    'protein' => $p,
                    'karbohidrat' => $k,
                    'lemak' => $l,
                    'is_active' => true,
                ]
            );
        }
    }
}