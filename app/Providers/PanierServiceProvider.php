<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PanierServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PanierInterfaceRepository::class, PanierSessionRepository::class);
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
