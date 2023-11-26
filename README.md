# Convention over configuration Laravel route generator 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ricventu/laravel-route-maze.svg?style=flat-square)](https://packagist.org/packages/ricventu/laravel-route-maze)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ricventu/laravel-route-maze/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ricventu/laravel-route-maze/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ricventu/laravel-route-maze/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ricventu/laravel-route-maze/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ricventu/laravel-route-maze.svg?style=flat-square)](https://packagist.org/packages/ricventu/laravel-route-maze)


A quick and easy way to create the routes is to take advantage of the **convention over configuration** and **PHP attributes**.  
This means that routes are automatically generated based on the directory structure of the controllers and the methods attributes.  
In this way, you don't have to manually write the routes in the web.php or api.php file, but just follow some rules of file naming and organization.  
Route groups are base on subdirectories of the controllers.

Let's see how to do it with a practical example.

Controller: `App/Http/Controllers/SomeCategory/ProductsController.php`
```php
class ProductsController
{
    // index and __invoke defaults to GET
    public function index() {...}
    #[Get]
    public function show($id) {...}
    #[Post]
    public function store(Request $request) {...}
    #[Patch]
    public function update($id, Request $request) {...}
    #[Delete]
    public function destroy($id) {...}
}
```
To get routes simpli add the the following line to `routes/web.php`

```php
    Route::maze(app_path('Http/Controllers'), 'App\\Http\\Controllers');
```

The generated routes are:
```php
    Route::get('/some-category/products', 'SomeCategory\ProductsController@index')->name('some-category.products.index');
    Route::get('/some-category/products/show/{id}', 'SomeCategory\ProductsController@show')->name('some-category.products.show');
    Route::post('/some-category/products/store', 'SomeCategory\ProductsController@store')->name('some-category.products.store');
    Route::Patch('/some-category/products/update/{id}', 'SomeCategory\ProductsController@update')->name('some-category.products.update');
    Route::delete('/some-category/products/destroy/{id}', 'SomeCategory\ProductsController@destroy')->name('some-category.products.destroy');
```

## Parameters in path

Parameters can be specified in the path naming the directory with `_param-name_`.

`Http/Controllers/_param1_/ItemsController.php`

```php
class ItemsController
{
    #[Get]
    public function get($id) {...}
}
```
becomes

```php
    Route::get('/{param1}/items/get/{id}', 'ItemsController@get')->name('items.get');
```

## Middleware

You can specify middleware group by adding a file named `middleware.php` in the controller directory.

```php
return [
    'auth',
];
```

## Naming conventions

Uri and route name are composed of directories name, first part of the controller name (before `Controller`) and method name, all in kebab-case.

examples:

| Controller name       | Method name      | Route name                | Route path                      |
|-----------------------|------------------|---------------------------|---------------------------------|
| SomeProductController | showItem($id)    | some.product.show-item    | /some-product/show-item/{id}    |
| SomeProductController | storeItem        | some.product.store-item   | /some-product/store-item        |
| SomeProductController | updateItem($id)  | some.product.update-item  | /some-product/update-item/{id}  |
| SomeProductController | destroyItem($id) | some.product.destroy-item | /some-product/destroy-item/{id} |

## Disable discover for a Controller

To disable route discover for a specified crontroller, add static method `mazeDisabled` that returns `true`

## In path configuration

If in the path is present a file named `maze.php`, it will be used to configure the route group.

```php
return [
];
```

| Key              | Description                            | Default |
|------------------|----------------------------------------|---------|
| ignore_path_name | Ignore path and name in route          | false   |
| disabled         | Disable discovering of the entire path |         |


```php

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
