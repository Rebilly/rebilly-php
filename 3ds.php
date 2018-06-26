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
$method->setPaymentCardId("HRFDQKBVMEWQRQW7");

$form = new \Rebilly\Entities\ThreeDSecure();
$form->setCustomerId("myCustomer");
$form->setAmount(21);
$form->setCurrency('USD');
$form->setWebsiteId("test");
$form->setGatewayAccountId('test');
$form->setPaymentCardId('HRFDQKBVMEWQRQW7');
$form->setEnrolled('Y');
$form->setEnrollmentEci('fefef');

try {
    $createdResource = $client->threeDSecure()->create($form);
    var_dump($createdResource);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

$list = $client->threeDSecure()->search();
var_dump($list);

/*$deleted = $client->payments()->cancel($createdResource->getId());
var_dump($deleted);*/