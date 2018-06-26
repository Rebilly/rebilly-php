<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Http\Exception\ClientException;
use Rebilly\Http\Exception\NotFoundException;

// Instantiate an Rebilly client.
$client = new Rebilly\Client([
    'apiKey' => 'K2ZtKoNIhFQg4e3HPgCWQtzRWhg803uTApWzBem',
    'baseUrl' => 'http://apit.dev-local.rebilly.com'
]);

//List
try {
    $customer = $client->customers()->load('CUST-1');
    //var_dump($customer);
    //var_dump($customer->getLifetimeRevenue());
    echo $customer->getLifetimeRevenue()->getCurrency() . "\n";
    echo $customer->getLifetimeRevenue()->getAmount() . "\n";
    echo $customer->getLifetimeRevenue()->getAmountUsd() . "\n";

} catch (NotFoundException $e) {
   var_dump($e);
} catch (ClientException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}


