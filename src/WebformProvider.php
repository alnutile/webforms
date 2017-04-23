<?php


namespace Alnutile\Webforms;


use Illuminate\Support\ServiceProvider;

class WebformProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    public function register() {

    }

}