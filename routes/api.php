<?php

use App\Http\Controllers\API\TracksAPI;
use Illuminate\Support\Facades\Route;

Route::apiResource('tracks', TracksAPI::class);
