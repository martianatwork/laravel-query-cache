<?php

namespace martianatwork\LaravelQueryCache\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelQueryCache extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-query-cache';
    }
}
