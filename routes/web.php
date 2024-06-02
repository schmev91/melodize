<?php

use App\Livewire\Client\Home as ClientHome;
use App\Livewire\Client\TrackShow;
use Illuminate\Support\Facades\Route;

$client_routes = [
    'library',
    'about',
 ];

Route::group([ 'as' => 'client.' ], function () use ($client_routes) {
    Route::get('/', ClientHome::class)->name('home');

    foreach ($client_routes as $name) {
        Route::get($name, "App\Livewire\Client\\" . ucfirst($name))->name($name);
    }

    Route::get('tracks/{track}', TrackShow::class)->name('track.show');
});
