<?php

namespace martianatwork\LaravelQueryCache\Tests;

use martianatwork\LaravelQueryCache\Facades\LaravelQueryCache;
use martianatwork\LaravelQueryCache\ServiceProvider;
use Orchestra\Testbench\TestCase;

class LaravelQueryCacheTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'laravel-query-cache' => LaravelQueryCache::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
