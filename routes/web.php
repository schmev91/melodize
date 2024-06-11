<?php

use App\Http\Middleware\AuthCheck;
use App\Livewire\Client\About;
use App\Livewire\Client\Home as ClientHome;
use App\Livewire\Client\Library;
use App\Livewire\Client\TrackShow;
use Illuminate\Support\Facades\Route;

Route::group([ 'as' => 'client.' ], function () {
    Route::get('/', ClientHome::class)->name('home');

    Route::get('library', Library::class)->name('library')->middleware(AuthCheck::class);
    Route::get('about', About::class)->name('about');

    Route::get('tracks/{track}', TrackShow::class)->name('track.show');
});
