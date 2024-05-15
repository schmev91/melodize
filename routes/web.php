<?php

use Illuminate\Support\Facades\Route;

Route::group([ 'as' => 'client.' ], function () {
    Route::get('/', function () {
        return view('client.home');
    })->name('home');

    Route::get('albums', function () {
        return view('client.albums');
    })->name('albums');

    Route::get('artists', function () {
        return view('client.artists');
    })->name('artists');

    Route::get('tracks', function () {
        return view('client.tracks');
    })->name('tracks');

    require_once __DIR__ . "/client/posts.php";
});
