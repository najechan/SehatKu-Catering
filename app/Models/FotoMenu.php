<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class FotoMenu extends Model
{
    protected $table = 'foto_menu';

    protected $fillable = ['menu_id', 'path'];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

        protected function url(): Attribute
    {
        return Attribute::get(fn () => asset('storage/' . $this->path));
    }
}