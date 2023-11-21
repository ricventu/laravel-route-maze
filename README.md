# Generate Laravel routes basend on Controllers paths 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ricventu/laravel-route-maze.svg?style=flat-square)](https://packagist.org/packages/ricventu/laravel-route-maze)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ricventu/laravel-route-maze/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ricventu/laravel-route-maze/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ricventu/laravel-route-maze/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ricventu/laravel-route-maze/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ricventu/laravel-route-maze.svg?style=flat-square)](https://packagist.org/packages/ricventu/laravel-route-maze)

app/Http/Controllers/Test1/IndexController.php
-> GET /test1

app/Http/Controllers/Test2/InvokableController.php
-> GET /test2

## Installation

You can install the package via composer:

```bash
composer require ricventu/laravel-route-maze
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-route-maze-config"
```

This is the contents of the published config file:

```php
return [
];
```


## Usage

```php
// TODO
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
