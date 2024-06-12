<?php

use App\Http\Controllers\Backdoor\Dashboard;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SourceController;
use App\Livewire\Backdoor\GenresTable;
use App\Livewire\Backdoor\Playlists;
use App\Livewire\Backdoor\Sources;
use App\Livewire\Backdoor\TracksTable;
use App\Livewire\Backdoor\UsersTable;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');

// USER
Route::get('users', UsersTable::class)->name('users.index');
Route::apiResource('users', TracksTable::class)
    ->except('index', 'show');

// TRACK
Route::get('tracks', TracksTable::class)->name('tracks.index');
Route::apiResource('tracks', TracksTable::class)
    ->except('index', 'show');

// PLAYLIST
Route::get('playlists', Playlists::class)->name('playlists.index');
Route::resource('playlists', PlaylistController::class)
    ->except('index');

// GENRES
Route::get('genres', GenresTable::class)->name('genres.index');
Route::apiResource('genres', GenresTable::class)->except('index', 'show');

// SOURCES
Route::get('sources', Sources::class)->name('sources.index');
Route::resource('sources', SourceController::class)
    ->except('index');
