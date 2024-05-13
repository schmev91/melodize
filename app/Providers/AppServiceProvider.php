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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadRoutes();
    }

    /**
     * add Routes
     */
    public function loadRoutes(): void
    {

        Route::prefix('admin')
            ->middleware('web')
            ->as('admin.')
            ->group(base_path('routes/admin.php'));

    }
}
