<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::group([ 'prefix' => 'posts', 'as' => 'posts.' ], function () {
    $routes = [
        'mostviewed',
     ];
    foreach ($routes as $routeName) {
        Route::get($routeName, [ PostController::class, $routeName ])
            ->name($routeName);
    }
});

Route::resource('posts', PostController::class);
