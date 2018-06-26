<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Blacklist;
use Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;
use Rebilly\Entities\Note;
use Rebilly\Entities\Organization;
use Rebilly\Entities\Plan;
use Rebilly\Entities\Subscription;
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
$form = new Organization();
$form->setName('new company');
$form->setAddress('123 main street');
$form->setCity('New York');
$form->setPostalCode('12345');
$form->setCountry('US');

try {
    $createdResource = $client->organizations()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

//update
$form->setPostalCode("67890");
try {
    $createdResource = $client->organizations()->update($createdResource->getId(), $form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

//Get
try {
    $resource = $client->organizations()->load($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

//List
try {
    $resources = $client->organizations()->search([
        "limit" => 2,
        "offset" => 0
    ]);

    foreach ($resources as $contact) {
        var_dump($contact);
    }

} catch (ClientException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

//DELETE

try {
    $client->organizations()->delete($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}
