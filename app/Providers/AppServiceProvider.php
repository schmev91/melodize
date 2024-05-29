<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ADMIN
        Route::prefix('admin')
            ->middleware('web')
            ->as('admin.')
            ->group(base_path('routes/admin.php'));

        // API
        Route::prefix('api')
            ->as('api.')
            ->group(base_path('routes/api.php'));
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

}
