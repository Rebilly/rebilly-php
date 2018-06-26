<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Blacklist;
use Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;
use Rebilly\Entities\Note;
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
$form = new Blacklist();
$form->setType('customerId');
$form->setValue('customer1234');

try {
    $createdResource = $client->blacklists()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//DELETE

try {
    $client->blacklists()->delete($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}
