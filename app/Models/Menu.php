<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}