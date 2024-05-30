<?php

use App\Http\Controllers\Backdoor\Dashboard;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');
Route::resource('tracks', TrackController::class);
