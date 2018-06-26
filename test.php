<?php
use Rebilly\Client;

require_once 'vendor/autoload.php';

$client = new Client([
    'apiKey' => 'K2ZtKoNIhFQg4e3HPgCWQtzRWhg803uTApWzBem',
    'baseUrl' => 'http://apit.dev-local.rebilly.com'
]);


$websiteData = [
    'name' => 'Microgaming',
    'url' => 'microgaming.co.uk',
    'servicePhone' => '111-222-3333',
    'serviceEmail' => 'admin@microgaming.co.uk',
    'checkoutPageUri' => 'ya.ru',
    'webHookUrl' => 'http://whr.dev-local.rebilly.com',
    'customFields' => ['GSID' => 'GSID_TEST']
];

$website = $client->websites()->create($websiteData);

$ogranizationData = [
    'name' => 'Microgaming' . time(),
    'address' => 'Address',
    'address2' => 'Address2',
    'city' => 'string',
    'region' => 'string',
    'country' => 'US',
    'postalCode' => '123123',
];
$organization = $client->organizations()->create($ogranizationData);

$gatewayaccountData = [
    'gatewayName' => 'RebillyProcessor',
    'acquirerName' => 'Bank of Rebilly',
    'merchantCategoryCode' => 5734,
    'dccMarkup' => 1,
    'descriptor' => 'descriptor',
    'city' => 'CityName',
    'organizationId' => $organization->getId(),//'4f6cf35x-2c4y-483z-a0a9-158621f77a21',
    'websites' => [
        $website->getId()//'964f3324-e00a-4bd2-8b69-2c6557ad65a7'
    ],
    'monthlyLimit' => 0,
    'threeDSecure' => true,
    'threeDSecureType' => 'integrated',
    'dynamicDescriptor' => true,
    'acceptedCurrencies' => [
                'USD'
    ],
    'method' => 'payment-card',
    'paymentCardSchemes' => [
        'Visa'
    ],
    //'downtimeStart' => '2016-11-14T09:13:49Z',
    //'downtimeEnd' => '2016-11-24T09:13:49Z',
    'gatewayConfig' => [
        'accountId' => 'test',
        'password' => '123'
    ]
];

$json = json_encode($gatewayaccountData);

try {
    $client->gatewayAccounts()->create($gatewayaccountData);
} catch (\Rebilly\Http\Exception\UnprocessableEntityException $e) {
    var_dump($e->getMessage());
}

