<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Blacklist;
use Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;
use Rebilly\Entities\Note;
use Rebilly\Entities\Subscription;
use Rebilly\Entities\SubscriptionCancel;
use Rebilly\Entities\SubscriptionSwitch;
use Rebilly\Entities\Website;
use Rebilly\Http\Exception\ClientException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;

// Instantiate an Rebilly client.
$client = new Client([
    'apiKey' => 'Ke3GEQCKVFtRzdlWyP7nXgZR5XVFJpuG4k9P8Vv',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);
//DONE


//Create
$method = new \Rebilly\Entities\PaymentMethods\PaymentCardMethod();
$method->setGatewayAccountId('test');
$method->setPaymentCardId("82f40949-5fa4-4308-81fc-2d9449caa4b8");

$form = new \Rebilly\Entities\Payment();
$form->setCustomerId("myCustomer");
$form->setAmount(21);
$form->setCurrency('USD');
$form->setMethod('payment_card');
$form->setWebsiteId("test");
$form->setDescription('Payment Description');

try {
    $createdResource = $client->payments()->create($form);
    var_dump($createdResource);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

/*$deleted = $client->payments()->cancel($createdResource->getId());
var_dump($deleted);*/