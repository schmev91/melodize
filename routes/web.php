<?php

use Illuminate\Support\Facades\Route;

$client_routes = [
    'library',
 ];


Route::group([ 'as' => 'client.' ], function () use ($client_routes) {
    Route::get('/', function () {
        return view('client.home');
    })->name('home');

    foreach ($client_routes as $name) {
        Route::get($name, function () use ($name) {
            return view($name);
        })->name($name);
    }
});
