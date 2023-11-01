<?php

namespace App\Providers;

use App\Repositories\Auth\RegisterRepository;
use App\Repositories\Interfaces\Auth\RegisterRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RegisterRepositoryInterface::class, RegisterRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
