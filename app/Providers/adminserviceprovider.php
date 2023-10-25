<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class adminserviceprovider extends ServiceProvider
{
    public function boot()
    {
        Auth::provider('admins', function ($app, array $config) {
            return new EloquentUserProvider($app['hash'], $config['model']);
        });
    }
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
   
}
