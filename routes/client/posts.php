<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

$routes = [
    'mostviewed',
    'newest',
    'type',
 ];
 
Route::group([ 'prefix' => 'posts', 'as' => 'posts.' ], function () use ($routes) {
    foreach ($routes as $name) {
        Route::get($name, [ PostController::class, $name ])
            ->name($name);
    }
});

Route::resource('posts', PostController::class);
