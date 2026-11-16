<?php

use Illuminate\Support\Facades\Route;

// Rute ditambah bertahap per commit.
Route::get('/', fn () => 'SehatKu Catering')->name('beranda');
