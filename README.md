# Generate Laravel routes basend on Controllers paths 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ricventu/laravel-route-maze.svg?style=flat-square)](https://packagist.org/packages/ricventu/laravel-route-maze)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ricventu/laravel-route-maze/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ricventu/laravel-route-maze/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ricventu/laravel-route-maze/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ricventu/laravel-route-maze/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ricventu/laravel-route-maze.svg?style=flat-square)](https://packagist.org/packages/ricventu/laravel-route-maze)


A quick and easy way to create the routes is to take advantage of the over configuration convention.  
This means that routes are automatically generated based on the directory structure of the controllers and the methods of the controllers.  
In this way, you don't have to manually write the routes in the web.php or api.php file, but just follow some rules of file naming and organization.  
Route groups are base on subdirectories of the controllers.

Let's see how to do it with a practical example.

Controller: `App/Http/Controllers/SomeCategory/ProductsController.php`
```php
class ProductsController
{
    public function index() {...}
    public function show($id) {...}
    public function store(Request $request) {...}
    public function update($id, Request $request) {...}
    public function destroy($id) {...}
}
```
```php
    Route::maze(app_path('Http/Controllers'), 'App\\Http\\Controllers');
```

The generated routes are:
```php
    Route::get('/some-category/products', 'SomeCategory\ProductsController@index')->name('some-category.products.index');
    Route::get('/some-category/products/show/{id}', 'SomeCategory\ProductsController@show')->name('some-category.products.show');
    Route::post('/some-category/products/store', 'SomeCategory\ProductsController@store')->name('some-category.products.store');
    Route::post('/some-category/products/update/{id}', 'SomeCategory\ProductsController@update')->name('some-category.products.update');
    Route::post('/some-category/products/destroy/{id}', 'SomeCategory\ProductsController@destroy')->name('some-category.products.destroy');
```

## Parameters in path

Parameters can be specified in the path naming the directory with `_param-name_`.

`Http/Controllers/_param1_/ItemsController.php`

```php
class ItemsController
{
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

The name of the controller file must be the same as the name of the route, but in camelcase and with the suffix `Controller.php`.
The name of the method must be the same as the name of the route, but in camelcase.
Route names are converted in kebab-case.

examples:

| Controller name       | Method name      | Route name                | Route path                      | Route Method |
|-----------------------|------------------|---------------------------|---------------------------------|--------------|
| SomeProductController | showItem($id)    | some.product.show-item    | /some-product/show-item/{id}    | GET          |
| SomeProductController | storeItem        | some.product.store-item   | /some-product/store-item        | POST         |
| SomeProductController | updateItem($id)  | some.product.update-item  | /some-product/update-item/{id}  | POST         |
| SomeProductController | destroyItem($id) | some.product.destroy-item | /some-product/destroy-item/{id} | POST         |

## Route Method Convention

| Controller Method                          | Route Method |
|--------------------------------------------|--------------|
| index, __invoke                            | GET          |
| post, store, save, set, put, patch, update | POST         |
| delete, destroy, remove                    | POST         |
| all others public methods                  | GET          |

## Disable discover for a Controller

To disable route discover for a specified crontroller, add static method `mazeDisabled` that returns `true`

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
