<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Blacklist;
use Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;
use Rebilly\Entities\Note;
use \Rebilly\Entities\PaymentCardAuthorization;
use Rebilly\Http\Exception\ClientException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;

new \Rebilly\Entities\PaymentCard();
// Instantiate an Rebilly client.
$client = new Client([
    'apiKey' => 'G7cP82s3SfNeoUIh8seXh0oSXb4YjkVSNAJtIps',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);

//Create
/*$form = new \Rebilly\Entities\PaymentCard();
$form->setCustomerId("3J8QKYZGD9TWN3Z");
$form->setPan("4111111111111111");
$form->setExpMonth("10");
$form->setExpYear("2016");
$form->setCvv("123");
$form->setBillingContactId("XT3FQENEVCS698T");*/

/*try {
    $createdResource = $client->paymentCards()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}*/

$form = new \Rebilly\Entities\PaymentCard();

$form->setCustomerId("test");
$form->setBillingContactId('TGGA824KCW444VDU79');
$form->setCvv('999');
$form->setPan('4111111111111111');
$form->setExpMonth('10');
$form->setExpYear('2018');

try {
    $createdResource = $client->paymentCards()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}
/*
//Get
try {
    echo '-'.$createdResource->getId().'-';
    $resource = $client->paymentCards()->load($createdResource->getId());
    var_dump($resource);
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//List
try {
    $resources = $client->paymentCards()->search([
        "limit" => 1,
        "offset" => 1
    ]);
    foreach ($resources as $contact) {
        var_dump($contact);
    }

} catch (ClientException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//Set defaultCardId
/*$customerForm = new Customer();
$customerForm->setDefaultCardId($createdResource->getId());
try {
    $resource = $client->customers()->update("3J8QKYZGD9TWN3Z", $customerForm);
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}*/
/*
//Activate
try {
    $data = new PaymentCardAuthorization();
    $data->setWebsiteId("test");
    $data->setCurrency("USD");
    $activated = $client->paymentCards()->authorize($data, $createdResource->getId());
    var_dump($activated);

} catch (ClientException $e) {
    // Something wrong -- check response for errors
    //echo $e->getMessage();

}



//INVOICES

//DELETE
/*
try {
    $client->contacts()->delete($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}*/
