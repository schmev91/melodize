<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('albums', function () {
    return view('admin.albums');
})->name('albums');

Route::get('artists', function () {
    return view('admin.artists');
})->name('artists');

Route::get('tracks', function () {
    return view('admin.tracks');
})->name('tracks');
