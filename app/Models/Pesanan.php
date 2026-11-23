<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pesanan extends Model
{
    public const MENUNGGU_PEMBAYARAN = 'menunggu_pembayaran';
    public const DIPROSES = 'diproses';
    public const DIANTAR = 'diantar';
    public const SELESAI = 'selesai';
    public const DIBATALKAN = 'dibatalkan';

    public const DAFTAR_STATUS = [
        self::MENUNGGU_PEMBAYARAN => 'Menunggu pembayaran',
        self::DIPROSES => 'Diproses',
        self::DIANTAR => 'Diantar',
        self::SELESAI => 'Selesai',
        self::DIBATALKAN => 'Dibatalkan',
    ];

    /** Status yang dihitung di rekap dapur per tanggal antar. */
    public const STATUS_UNTUK_REKAP = [self::DIPROSES, self::DIANTAR, self::SELESAI];

    protected $table = 'pesanan';

    protected $fillable = [
        'kode_pesanan', 'nama_pemesan', 'no_hp', 'alamat', 'tanggal_antar',
        'total_harga', 'total_kalori', 'status', 'bukti_bayar',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_antar' => 'date',
            'total_harga' => 'integer',
            'total_kalori' => 'integer',
        ];
    }

    public function detail(): HasMany
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }

    public function getLabelStatusAttribute(): string
    {
        return self::DAFTAR_STATUS[$this->status] ?? $this->status;
    }
}