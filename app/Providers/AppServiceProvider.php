<?php

namespace App\Providers;

use App\Http\Middleware\BackdoorPass;
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
        Route::prefix('backdoor')
            ->as('backdoor.')
            ->group(base_path('routes/backdoor.php'))
            ->middleware('web', BackdoorPass::class);

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
