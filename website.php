<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Blacklist;
use Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;
use Rebilly\Entities\Note;
use Rebilly\Entities\Website;
use Rebilly\Http\Exception\ClientException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;

// Instantiate an Rebilly client.
$client = new Client([
    'apiKey' => 'md2KAERAT/h8lNdCMavRWnFho+5IsWSpp+jRHjx',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);
//DONE

//Create
$form = new Website();
$form->setName('myWebsite');
$form->setUrl('http://mywebsite.com');
$form->setServiceEmail('support@mywebsite.com');
$form->setServicePhone('1234567890');

try {
    $createdResource = $client->websites()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
}

$form->setName("updatedWebsite");
//update
try {
    $createdResource = $client->websites()->update($createdResource->getId(), $form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//Get
try {
    $resource = $client->websites()->load($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//List
try {
    $resources = $client->websites()->search([
        "limit" => 2,
        "offset" => 0
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

try {
    $client->websites()->delete($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}
