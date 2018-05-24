# Laravel Query Cache

[![Build Status](https://travis-ci.org/martianatwork/laravel-query-cache.svg?branch=master)](https://travis-ci.org/martianatwork/laravel-query-cache)

[![Packagist](https://img.shields.io/packagist/v/martianatwork/laravel-query-cache.svg)](https://packagist.org/packages/martianatwork/laravel-query-cache)
[![Packagist](https://poser.pugx.org/martianatwork/laravel-query-cache/d/total.svg)](https://packagist.org/packages/martianatwork/laravel-query-cache)
[![Packagist](https://img.shields.io/packagist/l/martianatwork/laravel-query-cache.svg)](https://packagist.org/packages/martianatwork/laravel-query-cache)

Package description: A package for Caching Eloquent quries

## Installation

Install via composer
```bash
composer require martianatwork/laravel-query-cache
```

## Usage

### Basics
The easiest way to get started with Eloquent is to create an abstract `App\Model` which you can extend your application models from. In this base model you can import the rememberable trait which will extend the same caching functionality to any queries you build off your model.

```
<?php
namespace App;

use martianatwork\LaravelQueryCache\LaravelQueryCache;
use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{
    use Rememberable;
}
```
Now, just ensure that your application models from this new `App\Model` instead of Eloquent.

```
<?php
namespace App;

use App\Model;

class Post extends Model
{
    //
}

```

Just use following code in your model to cache complete model
```
<?php

namespace App;

use App\Model;

class TestWallet extends Model
{
    protected $rememberFor = 60;
    protected $rememberCacheTag = 'Test';
    protected $clearOnChange = true;

}
```
The above code will cache all quries from the given model.
```
protected $rememberFor = 60;
```
Will cache the results for 60 min.
```
protected $rememberCacheTag = 'Test';
```
Will add a tag to the cached data which will be later used for clearing the cache
```
protected $clearOnChange = true;
```
Will clear cache on Update, Create, Delete events of the model

## Digging Deeper

If you don't want to cache entire model then just use the Model::remember() method

Using the remember method is super simple. Just pass the number of minutes you want to store the result of that query in the cache for, and whenever the same query is called within that time frame the result will be pulled from the cache, rather than from the database again.

```
// Remember the number of users for an hour.
$users = User::remember(60)->count();
```
# Cache prefix
If you want a unique prefix added to the cache key for each of your queries (say, if your cache doesn't support tagging), you can add prefix('prefix') to your query.

```
// Remember the number of users for an hour and prefix the key with 'users'
User::remember(60)->prefix('users')->count();
```

Alternatively, you can add the $rememberCachePrefix property to your model to always use that cache prefix.

### Cache driver
If you want to use a custom cache driver (defined in config/cache.php) you can add cacheDriver('cacheDriver') to your query.

```
// Remember the number of users for an hour using redis as cache driver
User::remember(60)->cacheDriver('redis')->count();
```
Alternatively, you can add the $rememberCacheDriver property to your model to always use that cache driver.

### Model wide cache tag

You can set a cache tag for all queries of a model by setting the $rememberCacheTag property with an unique string that should be used to tag the queries.
```
protected $rememberCacheTag = 'MyTag';
```
### Relationships

Validating works by caching queries on a query-by-query basis. This means that when you perform eager-loading those additional queries will not be cached as well unless explicitly specified. You can do that by using a callback with your eager-loads.

```
$users = User::where("id", ">", "1")
    ->with(['posts' => function ($q) { $q->remember(10); }])
    ->remember(10)
    ->take(5)
    ->get();
```
    
### Always enable

You can opt-in to cache all queries of a model by setting the $rememberFor property with the number of minutes you want to cache results for. Use this feature with caution as it could lead to unexpected behaviour and stale data in your app if you're not familiar with how it works.

### Cache flushing
Based on the architecture of the package it's not possible to delete the cache for a single query. But if you tagged any queries using cache tags, you are able to flush the cache for the tag:

```User::flushCache('user_queries');```

If you used the $rememberCacheTag property you can use the method without a parameter and the caches for the tag set by $rememberCacheTag are flushed:

```User::flushCache();```

### Using in your package
```
<?php

namespace Me\MyPackage\Models;

use Illuminate\Database\Eloquent\Model;
use martianatwork\LaravelQueryCache\LaravelQueryCache;

class MyModel extends Model
{
    use LaravelQueryCache;
    protected $rememberFor = 60;
    protected $rememberCacheTag = 'Currency';
    protected $clearOnChange = true;
    protected $fillable = ['name', 'symbol', 'conversion_rate'];

}
```

## Security

If you discover any security related issues, please [email](mailto:bavesh@baveshdeshmukh.com)
instead of using the issue tracker.

## Credits

- [](https://github.com/martianatwork/laravel-query-cache)
- [All contributors](https://github.com/martianatwork/laravel-query-cache/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
