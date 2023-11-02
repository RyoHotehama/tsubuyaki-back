<?php

namespace App\Providers;

use App\Services\Auth\LoginService;
use App\Services\Auth\RegisterService;
use App\Services\Interfaces\Auth\LoginServiceInterface;
use App\Services\Interfaces\Auth\RegisterServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RegisterServiceInterface::class, RegisterService::class);
        $this->app->bind(LoginServiceInterface::class, LoginService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
