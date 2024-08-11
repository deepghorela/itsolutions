<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\IpRangeService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IpRangeService::class, function ($app) {
            return new IpRangeService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
