<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Service Registration
        $this->app->bind('App\Services\Ice\IceServiceInterface', 'App\Services\Ice\IceService');


        //Repository Registration
        $this->app->bind('App\Repositories\Ice\IceRepositoryInterface', 'App\Repositories\Ice\IceRepository');


    }
}
