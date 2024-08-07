# E-commerce package for Naykel applications

[![Latest Version on Packagist](https://img.shields.io/packagist/v/naykel/shopit.svg?style=flat-square)](https://packagist.org/packages/naykel/shopit)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/naykel/shopit/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/naykel/shopit/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/naykel/shopit/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/naykel/shopit/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/naykel/shopit.svg?style=flat-square)](https://packagist.org/packages/naykel/shopit)


**Interface**: The `CartInterface` is defined in `src/Contracts/CartInterface.php`.

**Service**: The `CartService` class implements the CartInterface in `src/CartService.php`.

**Service Provider**: In the `ShopitServiceProvider`:

The `CartInterface` is bound to the `CartService` using `$this->app->bind(CartInterface::class, CartService::class);`.

The `CartService` is registered as a singleton with the key `cart` using 
    
```php
$this->app->singleton('cart', function ($app) {
    return $app->make(CartService::class); }
);
```

**Facade**: The Cart facade is defined in `src/Facades/Cart.php` and returns `cart` as the facade accessor, which corresponds to the singleton registered in the service provider.