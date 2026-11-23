<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Menu extends Model
{
    protected $table = 'menu';

    protected $fillable = [
        'kategori_id', 'nama', 'deskripsi', 'harga', 'kalori',
        'protein', 'karbohidrat', 'lemak', 'foto_utama', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'integer',
            'kalori' => 'integer',
            'protein' => 'decimal:1',
            'karbohidrat' => 'decimal:1',
            'lemak' => 'decimal:1',
            'is_active' => 'boolean',
        ];
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function foto(): HasMany
    {
        return $this->hasMany(FotoMenu::class, 'menu_id');
    }

    public function detailPesanan(): HasMany
    {
        return $this->hasMany(DetailPesanan::class, 'menu_id');
    }

    public function scopeAktif(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

        /** URL foto utama; memakai placeholder jika belum ada foto. */
    protected function fotoUrl(): Attribute
    {
        return Attribute::get(fn () => $this->foto_utama
            ? asset('storage/' . $this->foto_utama)
            : asset('images/menu-placeholder.svg'));
    }

    /** Kalori hasil hitung makro (4/4/9), dipakai untuk peringatan di form admin. */
    protected function kaloriMakro(): Attribute
    {
        return Attribute::get(fn () => (int) round(
            $this->protein * 4 + $this->karbohidrat * 4 + $this->lemak * 9
        ));
    }
}