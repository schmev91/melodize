<?php

use App\Http\Controllers\Backdoor\Dashboard;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\TrackController;
use App\Livewire\Backdoor\Genres;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');
Route::resource('tracks', TrackController::class)
    ->except('show');
Route::resource('playlists', PlaylistController::class);

Route::get('genres', Genres::class)->name('genres.index');
Route::resource('genres', GenreController::class)
    ->except('index');

Route::resource('sources', SourceController::class);
