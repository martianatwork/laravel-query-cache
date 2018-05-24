# Laravel Query Cache

[![Build Status](https://travis-ci.org/martianatwork/laravel-query-cache.svg?branch=master)](https://travis-ci.org/martianatwork/laravel-query-cache)
[![styleci](https://styleci.io/repos/CHANGEME/shield)](https://styleci.io/repos/CHANGEME)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/martianatwork/laravel-query-cache/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/martianatwork/laravel-query-cache/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/CHANGEME/mini.png)](https://insight.sensiolabs.com/projects/CHANGEME)
[![Coverage Status](https://coveralls.io/repos/github/martianatwork/laravel-query-cache/badge.svg?branch=master)](https://coveralls.io/github/martianatwork/laravel-query-cache?branch=master)

[![Packagist](https://img.shields.io/packagist/v/martianatwork/laravel-query-cache.svg)](https://packagist.org/packages/martianatwork/laravel-query-cache)
[![Packagist](https://poser.pugx.org/martianatwork/laravel-query-cache/d/total.svg)](https://packagist.org/packages/martianatwork/laravel-query-cache)
[![Packagist](https://img.shields.io/packagist/l/martianatwork/laravel-query-cache.svg)](https://packagist.org/packages/martianatwork/laravel-query-cache)

Package description: CHANGE ME

## Installation

Install via composer
```bash
composer require martianatwork/laravel-query-cache
```

### Register Service Provider

**Note! This and next step are optional if you use laravel>=5.5 with package
auto discovery feature.**

Add service provider to `config/app.php` in `providers` section
```php
martianatwork\LaravelQueryCache\ServiceProvider::class,
```

### Register Facade

Register package facade in `config/app.php` in `aliases` section
```php
martianatwork\LaravelQueryCache\Facades\LaravelQueryCache::class,
```

### Publish Configuration File

```bash
php artisan vendor:publish --provider="martianatwork\LaravelQueryCache\ServiceProvider" --tag="config"
```

## Usage

CHANGE ME

## Security

If you discover any security related issues, please email 
instead of using the issue tracker.

## Credits

- [](https://github.com/martianatwork/laravel-query-cache)
- [All contributors](https://github.com/martianatwork/laravel-query-cache/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
