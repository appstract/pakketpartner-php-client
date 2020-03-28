# Pakketpartner PHP Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/appstract/pakketpartner-php-client.svg?style=flat-square)](https://packagist.org/packages/appstract/pakketpartner-php-client)
[![Total Downloads](https://img.shields.io/packagist/dt/appstract/pakketpartner-php-client.svg?style=flat-square)](https://packagist.org/packages/appstract/pakketpartner-php-client)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/appstract/pakketpartner-php-client/master.svg?style=flat-square)](https://travis-ci.org/appstract/pakketpartner-php-client)

PHP Client for the [Pakketpartner API](https://pakketpartner.nl/pakketpartner-rest-api/)

## Installation

You can install the package via composer:

``` bash
composer require appstract/pakketpartner-php-client
```

## Usage

Setup the connection.

``` php
use Appstract\Pakketpartner\Connection;
use Appstract\Pakketpartner\Pakketpartner;

$connection = new Connection();

$connection->setApiToken('yourapitoken');

$pakketpartner = new Pakketpartner($connection);
```

Use a method to handle entities.

```php
use Appstract\Pakketpartner\Pakketpartner;

$shipment = Pakketpartner::shipment();

$shipment->order_reference = 'Appstract';

$shipment->save();
```

## Testing

``` bash
composer test
```

## Contributing

Contributions are welcome, [thanks to y'all](https://github.com/appstract/pakketpartner-php-client/graphs/contributors) :)

## About Appstract

Appstract is a small team from The Netherlands. We create (open source) tools for Web Developers and write about related subjects on [Medium](https://medium.com/appstract). You can [follow us on Twitter](https://twitter.com/appstractnl), [buy us a beer](https://www.paypal.me/appstract/10) or [support us on Patreon](https://www.patreon.com/appstract).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
