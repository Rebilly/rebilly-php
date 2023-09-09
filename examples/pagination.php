<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

declare(strict_types=1);

use Rebilly\Sdk\Client;
use Rebilly\Sdk\CoreService;
use Rebilly\Sdk\Model\Product;

require_once __DIR__ . '/../vendor/autoload.php';

$client = new Client([
     'baseUrl' => Client::SANDBOX_HOST,
     'organizationId' => 'AddHereOrganizationId',
     'apiKey' => 'sk_sandbox_add_here_your_api_key',
 ]);
$coreService = new CoreService(client: $client);

function printProduct(Product $product): void
{
    printf("Product #%s: %s\n", $product->getId(), $product->getName());
}

$productsPaginator = $coreService->products()->getAllPaginator(limit: 2);

foreach ($productsPaginator as $productPage) {
    printf("Products page %d/%d\n", $productsPaginator->key() + 1, $productsPaginator->count());
    foreach ($productPage as $product) {
        printProduct($product);
    }
}
