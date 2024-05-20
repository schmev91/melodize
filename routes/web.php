<?php

use Illuminate\Support\Facades\Route;

$client_routes = [
    'albums',
    'artists',
    'tracks',
 ];

Route::group([ 'as' => 'client.' ], function () use ($client_routes) {
    Route::get('/', function () {
        return view('client.home');
    })->name('home');

    // require_once __DIR__ . "/client/posts.php";
});
