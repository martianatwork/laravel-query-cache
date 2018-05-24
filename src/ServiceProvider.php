<?php

namespace martianatwork\LaravelQueryCache;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/laravel-query-cache.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('laravel-query-cache.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'laravel-query-cache'
        );

        $this->app->bind('laravel-query-cache', function () {
            return new LaravelQueryCache();
        });
    }
}
