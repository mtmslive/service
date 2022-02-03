<?php

namespace Mtms\Service;

use Illuminate\Support\ServiceProvider;

class MtmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes/web.php';
        include __DIR__.'/routes/api.php';
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Mtms\Service\Controllers\InstallController');
        $this->app->make('Mtms\Service\Controllers\UpdateController');
    }
}