<?php

namespace App\Providers;

use App\Services\ApplicationStoreService;
use App\Services\ApplicationStoreServiceContract;
use Illuminate\Support\ServiceProvider;

class ApplicationStoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ApplicationStoreServiceContract::class, ApplicationStoreService::class);
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
