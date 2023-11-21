# Generate Laravel routes basend on Controllers paths 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ricventu/laravel-route-maze.svg?style=flat-square)](https://packagist.org/packages/ricventu/laravel-route-maze)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ricventu/laravel-route-maze/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ricventu/laravel-route-maze/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ricventu/laravel-route-maze/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ricventu/laravel-route-maze/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ricventu/laravel-route-maze.svg?style=flat-square)](https://packagist.org/packages/ricventu/laravel-route-maze)

Parse the give path and generate a route for each controller found.


## Index method

If you want to use the index method in your controller, you can use the `index` method in your controller.

```php
class MyController
{
    public function __invoke()
    {
       ...
    }
}
```

becomes

```php
    Route::get('/my', 'MyController@index')->name('my');
```

## Invocable Controllers

If you want to use invocable controllers, you can use the `__invoke` method in your controller.

```php
class MyController
{
    public function __invoke()
    {
       ...
    }
}
```

becomes

```php
    Route::get('/my', 'MyController')->name('my')
```

## Controller methods with route action

```php
class MyController
{
    public function getItem() {...}
    public function postItem() {...}
    public function deleteItem() {...}
}
```

becomes

```php
    Route::get('/my/item', 'MyController@getItem')->name('my.item.get');
    Route::post('/my/item', 'MyController@postItem')->name('my.item.post');
    Route::delete('/my/item', 'MyController@deleteItem')->name('my.item.delete');
```

## Controller methods with route action and no suffix

```php
class MyController
{
    public function get() {...}
    public function post() {...}
    public function delete() {...}
}
```

becomes

```php
    Route::get('/my', 'MyController@getItem')->name('my.get');
    Route::post('/my', 'MyController@postItem')->name('my.post');
    Route::delete('/my', 'MyController@deleteItem'))->name('my.delete');
```

## Parameters

```php
class MyController
{
    public function getItem($id) {...}
}
```

becomes

```php
    Route::get('/my/item/{id}', 'MyController@getItem')->name('my.item.get');
```

## Parameters in path

Parameters can be specified in the path naming the directory with `_param-name_`.


`Http/Controllers/_arg1_/MyController.php`

```php
class MyController
{
    public function get($id) {...}
}
```

becomes

```php
    Route::get('/{arg1}/my/{id}', 'MyController@get')->name('my.get');
```

## Subdirectories

All subdirectories are parsed and used as path.

`Http/Controllers/Dir1/Dir2/_arg1_/MyController.php`

```php
class MyController
{
    public function getItem($id) {...}
}
```

becomes

```php
    Route::get('/dir1/dir2/{arg1}/my/item/{id}', 'MyController@getItem')->name('dir1.dir2.my.item.get');
```

## Middleware

You can specify middleware group by adding a file named `middleware.php` in the controller directory.

```php
return [
    'auth',
];
```


## Installation

You can install the package via composer:

```bash
composer require ricventu/laravel-route-maze
```

## Usage

```php
    Route::maze(app_path('Http/Controllers'), 'App\\Http\\Controllers');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Riccardo Venturini](https://github.com/ricventu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
