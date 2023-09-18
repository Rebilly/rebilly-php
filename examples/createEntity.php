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

require_once __DIR__ . '/vendor/autoload.php';

$client = new Client([
    'baseUrl' => Client::SANDBOX_HOST,
    'organizationId' => '{organizationId}',
    'apiKey' => '{secretKey}',
]);
$coreService = new CoreService(client: $client);

// Create entity using setters

$product1 = Product::from()
    ->setName('Test setters product')
    ->setDescription('Test setters description');

$coreService->products()->create($product1);

printEntity($product1);

// Create entity using from array method

$product2 = Product::from([
    'name' => 'Test fromArray product',
    'description' => 'Test fromArray description',
]);

$coreService->products()->create($product2);

printEntity($product2);

function printEntity(mixed $entity): void
{
    echo json_encode($entity, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;
    echo str_repeat('=', 80) . PHP_EOL . PHP_EOL;
}
