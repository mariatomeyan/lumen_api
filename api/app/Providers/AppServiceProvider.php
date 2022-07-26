<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\ExchangeRateInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind( ExchangeRateInterface::class);
    }

    public function boot()
    {
        \Illuminate\Database\Eloquent\Model::$snakeAttributes = false;
    }
}
