# Rebilly SDK for PHP

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![GitHub Actions status][ico-github-actions]][link-github]
[![Total Downloads][ico-downloads]][link-downloads]
[![Coverage Status][ico-coveralls]][link-coveralls]

The **Rebilly SDK for PHP** makes it easy for developers to access
[Rebilly REST APIs][link-api-doc] in their PHP code.
You can get started in minutes by installing the SDK through Composer or by downloading
a single zip file from our [latest release](https://github.com/Rebilly/rebilly-php/releases).

## Installation

Using [Composer](http://getcomposer.org/) is the recommended way to install the Rebilly SDK for PHP.
To get started, you need run the Composer commands (assume you're in the project's root directory).

- Install the latest stable version of the SDK:

```bash
composer require rebilly/client-php
```

_You can find out more on how to install Composer, configure autoloading,
and other best-practices for defining dependencies at [getcomposer.org](http://getcomposer.org/)._

## Requirements

* PHP 7.1+.
* CURL (verify peer requires a root certificate authority -- if you have not configured php curl to use one, and your system libs aren't linked to one, you may need to do a [manual configuration](http://stackoverflow.com/questions/17478283/paypal-access-ssl-certificate-unable-to-get-local-issuer-certificate/19149687#19149687) to use the appropriate certificate authority)
* PHPUnit (tests only)

## Quick Examples

Create a Rebilly Client

```php
use Rebilly\Client;

// Instantiate Rebilly client.
$client = new Client([
  'apiKey' => ApiKeyProvider::env(),
  'base_uri' => Client::SANDBOX_HOST,
]);
```

Create a Customer

```php
$form = new Customer();
$form->setFirstName('Sarah');
$form->setLastName('Connor');

try {
  $customer = $client->customers()->create($form);
} catch (DataValidationException $e) {
  var_dump($e->getErrors());
}
```

### Mock Rebilly Client for Test purposes

If you use Guzzle jump to the 2nd example, for regular usage the example with custom handler is below.

#### Custom handler
```php
use Rebilly\Http\HttpHandler;

MockHandler implements HttpHandler {

    private $responses;

    public function append($response)
    {
        $this->responses[] = $response;
    }

    public function __invoke(Request $request)
    {
        return array_shift($this->responses);
    }
};

$httpHandler = new MockHandler();

new RebillyClient(['httpHandler' => $httpHandler]);

// Here is mocked part
$httpHandler->append($response);
```

#### Guzzle handler 
```php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Rebilly\Client as RebillyClient;
use Rebilly\Http\GuzzleAdapter;
 
$mockHandler = new MockHandler();
$guzzleAdapter = new GuzzleAdapter(
    new Client(
        [
            'handler' => $mockHandler,
        ]
    )
);

new RebillyClient([
    'httpHandler' => $guzzleAdapter
]);

// Here is mocked part
$response = new Response(204);
$mockHandler->append($response);
```

If RebillyClient does several sequenced requests in the code you need to cover,
responses have to be appended in the same order as RebillyClient is called:
```php
// Send several sequenced requests
...
$transaction = $rebillyClient->transactions()->load($id);
$refundedTransaction = $rebillyClient->transactions()->refund($id, $amount);
$transactionWithCustomer = $rebillyClient->transactions()->load($id, ['expand' => 'customer']);
...
```
Tests become:
```php
$response = new Response(200, [], json_encode($transaction));
$responseWithCustomer = new Response(200, [], json_encode($transactionWithCustomer));

/** 
 * hint: if you receive an error message 'Cannot create resource by URI "..."' during the tests
 * most probably the created Response misses appropriate "Location" header.
 *
 * Below is an example of mocked POST response `/transactions/{transactionId}/refund` which is not listed in `Rebilly\Entities\Schema`
 * because it can be simply mapped by "Location" header from the response.
 * The "Location" header shows Client which Schema to use to create an object out of the response content.
 */
  
$responseRefund = new GuzzleResponse(201, ['Location' => 'transactions/{transactionId}'], json_encode($transaction));

// Now append them in the same order as it is called in the code
$mockHandler->append($response);
$mockHandler->append($responseRefund);
$mockHandler->append($responseWithCustomer);
```

## Documentation

Read [Rebilly REST APIs documentation][link-api-doc] for more details.

## Tests

```bash
# install required files
$ composer self-update
$ composer install

# run the test
phpunit
```

[ico-version]: https://img.shields.io/packagist/v/rebilly/client-php.svg
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[ico-github-actions]: https://github.com/Rebilly/rebilly-php/workflows/Tests/badge.svg
[ico-downloads]: https://img.shields.io/packagist/dt/rebilly/client-php.svg
[ico-coveralls]: https://coveralls.io/repos/Rebilly/rebilly-php/badge.svg?branch=main&service=github

[link-api-doc]: https://api-reference.rebilly.com/
[link-packagist]: https://packagist.org/packages/rebilly/client-php
[link-github]: https://github.com/Rebilly/rebilly-php
[link-downloads]: https://packagist.org/packages/rebilly/client-php
[link-coveralls]: https://coveralls.io/github/Rebilly/rebilly-php?branch=main
