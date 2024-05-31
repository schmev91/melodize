<?php

use App\Http\Controllers\Backdoor\Dashboard;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');
Route::resource('tracks', TrackController::class)
->except('show');
Route::resource('playlists', PlaylistController::class);
Route::resource('genres', GenreController::class);
Route::resource('sources', SourceController::class);
