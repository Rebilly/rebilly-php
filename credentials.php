<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Blacklist;
use Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;
use Rebilly\Entities\CustomerCredential;
use Rebilly\Entities\Note;
use Rebilly\Entities\Website;
use Rebilly\Http\Exception\ClientException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;

// Instantiate an Rebilly client.
$client = new Client([
    'apiKey' => 'J01vSAYSlMc+++n2UJriE+/dqSfsW+eAcOnf65U',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);
//DONE

//Create
$form = new CustomerCredential();
$form->setCustomerId("3J8QKYZGD9TWN3Z");
$form->setUsername("testuser33547rtjrtj");
$form->setPassword("passssword");

try {
    $createdResource = $client->customerCredentials()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}
/*
$form->setPassword("rightPassword");
//update
try {
    $createdResource = $client->customerCredentials()->update($createdResource->getId(), $form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}
*/
//Get
try {
    $resource = $client->customerCredentials()->load($createdResource->getId());
    echo 'ut - '.$resource->getUpdatedTime();
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}
/*
//List
try {
    $resources = $client->customerCredentials()->search([
        "limit" => 2,
        "offset" => 0
    ]);
    //var_dump($resources);
    foreach ($resources as $contact) {
        var_dump($contact);
    }

} catch (ClientException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

//DELETE

try {
    $client->customerCredentials()->delete($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}
