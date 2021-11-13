<?php

namespace BUGaia\BUGaiaAPI;

use Asga\AdminPanel\BaseServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Asga\API\Exceptions\Handler;

class APIServiceProvider extends BaseServiceProvider {

    public function register() 
    {
        // 
    }

    public function boot() 
    {
        $this->app->singleton(ExceptionHandler::class, Handler::class);
    }
}
