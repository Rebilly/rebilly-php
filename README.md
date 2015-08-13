# PHP Rebilly API

[![Build Status](https://img.shields.io/travis/Rebilly/rebilly-php/master.svg?style=flat-square)](https://travis-ci.org/Rebilly/rebilly-php)
[![Packagist Version](https://img.shields.io/packagist/v/rebilly/client-php.svg?style=flat-square)](https://packagist.org/packages/rebilly/client-php)
[![Total Downloads](https://img.shields.io/packagist/dt/rebilly/client-php.svg?style=flat-square)](https://packagist.org/packages/rebilly/client-php)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://raw.githubusercontent.com/Rebilly/rebilly-php/master/LICENSE)

## Installation

*  You can copy the files into your project.
*  You can clone this repository if you use git.
*  If you use composer, you can install from composer as well.

## Loading
We recommend you use the `composer autoloader` to load the relevant files into your application.

## Usage

Set the environment, set your api key,
and then use according to documentation.

```php
TBD
```

Use version 2.1 of the API.

## Requirements

* PHP 5.4+ (tested with 5.4, 5.5, 5.6). We recommend you use PHP 5.6.
* CURL (verify peer requires a root certificate authority -- if you have not configured php curl to use one, and your system libs aren't linked to one, you may need to do a [manual configuration](http://stackoverflow.com/questions/17478283/paypal-access-ssl-certificate-unable-to-get-local-issuer-certificate/19149687#19149687) to use the appropriate certificate authority)
* PHPUnit (tests only)

## Documentation

Read https://www.rebilly.com/api/documentation/v2.1/ for more details.

## Tests

```bash
# install required files
$ composer self-update
$ composer install

# run the test (from project root)
phpunit
```
