<?php

namespace BUGaia\BUGaiaAPI;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler;
use BUGaia\BUGaiaAPI\Exceptions\Handler;

class APIServiceProvider extends ServiceProvider {

    public function register() 
    {
        // 
    }

    public function boot() 
    {
        $this->app->singleton(ExceptionHandler::class, Handler::class);
    }
}
