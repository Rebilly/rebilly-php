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

/*
//Create
$form = new Contact();
$form->setCustomerId("MyCustomerId1224");
$form->setFirstName('John');
$form->setLastName('Connor');

try {
    $createdResource = $client->contacts()->create($form, "MyContactId266346");
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//update
try {
    $createdResource = $client->contacts()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//Get
try {
    $resource = $client->contacts()->load($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}
*/
//List
try {
    $resources = $client->contacts()->search([
        "limit" => 1,
        "offset" => 13
    ]);
    //var_dump($resources);
    foreach ($resources as $contact) {
        var_dump($contact);
    }

} catch (ClientException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//DELETE
/*
try {
    $client->contacts()->delete($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}*/
