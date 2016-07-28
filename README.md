[![Stories in Ready](https://badge.waffle.io/Rebilly/rebilly-php.png?label=ready&title=Ready)](https://waffle.io/Rebilly/rebilly-php)
# Rebilly SDK for PHP

[![Build Status](https://img.shields.io/travis/Rebilly/rebilly-php/master.svg?style=flat-square)](https://travis-ci.org/Rebilly/rebilly-php)
[![Coverage Status](https://coveralls.io/repos/Rebilly/rebilly-php/badge.svg?branch=master&service=github)](https://coveralls.io/github/Rebilly/rebilly-php?branch=master)
[![Packagist Version](https://img.shields.io/packagist/v/rebilly/client-php.svg?style=flat-square)](https://packagist.org/packages/rebilly/client-php)
[![Total Downloads](https://img.shields.io/packagist/dt/rebilly/client-php.svg?style=flat-square)](https://packagist.org/packages/rebilly/client-php)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](https://raw.githubusercontent.com/Rebilly/rebilly-php/master/LICENSE)

The **Rebilly SDK for PHP** makes it easy for developers to access
[Rebilly REST APIs](https://www.rebilly.com/api/documentation/) in their PHP code.
You can get started in minutes by installing the SDK through Composer or by downloading
a single zip file from our [latest release](https://github.com/Rebilly/rebilly-php/releases).

## Installation

There are two supported methods of installing the Rebilly SDK for PHP.
**The recommended way to install the SDK is through Composer.**

Using [Composer](http://getcomposer.org/) is the recommended way to install the Rebilly SDK for PHP.
To get started, you need run the Composer commands (assume you're in the project's root directory).

- Install the latest stable version of the SDK:

```bash
php composer.phar require rebilly/client-php
```

- Update the dependencies:

```bash
php composer.phar update rebilly/client-php
```

You can find out more on how to install Composer, configure autoloading,
and other best-practices for defining dependencies at [getcomposer.org](http://getcomposer.org/).

## Requirements

* PHP 5.6+. We recommend you use PHP 7.0.
* CURL (verify peer requires a root certificate authority -- if you have not configured php curl to use one, and your system libs aren't linked to one, you may need to do a [manual configuration](http://stackoverflow.com/questions/17478283/paypal-access-ssl-certificate-unable-to-get-local-issuer-certificate/19149687#19149687) to use the appropriate certificate authority)
* PHPUnit (tests only)

## Quick Examples

Create a Rebilly Client

```php
use Rebilly\Client;

// Instantiate an Rebilly client.
$client = new Client([
  'apiKey' => ApiKeyProvider::env(),
  'baseUrl' => Client::SANDBOX_HOST,
]);
```

Create a Customer

```php
$form = new Customer();
$form->setFirstName('Sarah');
$form->setLastName('Connor');

try {
  $customer = $client->customers()->create($form);
} catch (UnprocessableEntityException $e) {
  var_dump($e->getErrors());
}
```

## Documentation

Read [https://www.rebilly.com/api/documentation/](https://www.rebilly.com/api/documentation/) for more details.

## Tests

```bash
# install required files
$ composer self-update
$ composer install

# run the test (from project root)
phpunit
```
