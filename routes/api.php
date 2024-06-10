<?php

use App\Http\Controllers\API\GenreAPI;
use App\Http\Controllers\API\TracksAPI;
use Illuminate\Support\Facades\Route;

$exclude_api = [ 'update', 'destroy', 'store' ];

Route::apiResource('tracks', TracksAPI::class)->except(...$exclude_api);
Route::get('tracks/{track}/genres', [ TracksAPI::class, 'genres' ]);
Route::get('tracks/{track}/listen', [ TracksAPI::class, 'listen' ]);

Route::apiResource('genre', GenreAPI::class)->except(...$exclude_api);
