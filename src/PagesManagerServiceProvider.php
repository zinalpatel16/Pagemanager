<?php

namespace Hcipl\Pagesmanager;

use Illuminate\Support\ServiceProvider;

class PagesManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {   
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'pagesmanager');
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        $this->publishes([
             __DIR__.'/assets' => public_path('vendor/pagesmanager'),
        ], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}