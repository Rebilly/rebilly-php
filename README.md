# Rebilly SDK for PHP

[![Software License][ico-license]](LICENSE)

The **Rebilly SDK for PHP** makes it easy for developers to access
[Rebilly REST APIs][link-api-doc] in their PHP code.

## Important note
This branch contains an alpha version of the Rebilly PHP SDK v3.0. It is a major breaking change which is incompatible with the previous version.

## Requirements

* PHP 8.1+.
* CURL (verify peer requires a root certificate authority -- if you have not configured php curl to use one, and your system libs aren't linked to one, you may need to do a [manual configuration](http://stackoverflow.com/questions/17478283/paypal-access-ssl-certificate-unable-to-get-local-issuer-certificate/19149687#19149687) to use the appropriate certificate authority)

## Quick Examples

Create a Rebilly Client

```php
use Rebilly\Sdk\Client;
use Rebilly\Sdk\CoreService;

// Instantiate Rebilly client.
$client = new Client([
    'base_uri' => Client::SANDBOX_HOST,
    'organizationId' => '{organizationId}',
    'apiKey' => '{secretKey}',
]);
$coreService = new CoreService(client: $client);
```

Create a Customer

```php
use Rebilly\Sdk\Exception\DataValidationException;
use Rebilly\Sdk\Model\ContactObject;
use Rebilly\Sdk\Model\Customer;

$customer = Customer::from([])
    ->setWebsiteId('{websiteId}')
    ->setPrimaryAddress(
        ContactObject::from([])
            ->setFirstName('John')
            ->setLastName('Doe'),
    );

try {
  $customer = $coreService->customers()->create($form);
} catch (DataValidationException $e) {
  var_dump($e->getValidationErrors());
}
```

For more see [examples directory](./examples/).

## Documentation

Read [Rebilly REST APIs documentation][link-api-doc] for more details.

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg

[link-api-doc]: https://api-reference.rebilly.com/
[link-github]: https://github.com/Rebilly/rebilly-php