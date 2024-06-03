<?php

use App\Http\Controllers\API\GenreAPI;
use App\Http\Controllers\API\TracksAPI;
use Illuminate\Support\Facades\Route;

Route::apiResource('tracks', TracksAPI::class);
Route::apiResource('genre', GenreAPI::class)->except('index');
