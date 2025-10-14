<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Đường dẫn mặc định sau khi đăng nhập
     */
    public const HOME = '/chuyen-bay';

    /**
     * Đăng ký service container bindings.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap các dịch vụ định tuyến.
     */
    public function boot(): void
    {
        // Web routes
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        // API routes
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }
}
