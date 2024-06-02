<?php

use App\Http\Controllers\Backdoor\Dashboard;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\TrackController;
use App\Livewire\Backdoor\Genres;
use App\Livewire\Backdoor\Playlists;
use App\Livewire\Backdoor\Sources;
use App\Livewire\Backdoor\Tracks;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');

// TRACK
Route::get('tracks', Tracks::class)->name('tracks.index');
Route::resource('tracks', TrackController::class)
    ->except('show', 'index');

// PLAYLIST
Route::get('playlists', Playlists::class)->name('playlists.index');
Route::resource('playlists', PlaylistController::class)
    ->except('index');

// GENRES
Route::get('genres', Genres::class)->name('genres.index');
Route::resource('genres', GenreController::class)
    ->except('index');

// SOURCES
Route::get('sources', Sources::class)->name('sources.index');
Route::resource('sources', SourceController::class)
    ->except('index');
