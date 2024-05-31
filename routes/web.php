<?php

use App\Http\Controllers\Site\Home;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

$client_routes = [
    'library',
    'about',
 ];

Route::group([ 'as' => 'client.' ], function () use ($client_routes) {
    Route::get('/', Home::class)->name('home');

    foreach ($client_routes as $name) {
        Route::get($name, "App\Http\Controllers\Site\\" . ucfirst($name))
            ->name($name);
    }

    Route::get('tracks/{track}', [ TrackController::class, "show" ])->name('track.show');
});
