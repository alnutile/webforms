<?php


namespace Alnutile\Webforms;


use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class WebformProvider extends ServiceProvider
{

    public function boot()
    {

        $this->publishes([
            __DIR__.'/../config/webform.php' => config_path('webform.php')
        ], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'webforms');
    }

    public function register() {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }

}