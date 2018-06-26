<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Blacklist;
use Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;
use Rebilly\Entities\Invoice;
use Rebilly\Entities\InvoiceItem;
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

//GET
try {
    $createdResource = $client->transactions()->load("XA7CZNVYY5KK");
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
}

//List
try {
    $resources = $client->transactions()->search([
        "limit" => 2,
        "offset" => 0,
    ]);
    //var_dump($resources);
    foreach ($resources as $contact) {
        var_dump($contact);
    }

} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
}

//List by customer
try {
    $resources = $client->transactions()->search([
        "limit" => 2,
        "offset" => 0,
        "filter" => "customerId:3J8QKYZGD9TWN3Z"
    ]);
    //var_dump($resources);
    foreach ($resources as $contact) {
        var_dump($contact);
    }

} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
}

//Refund
try {
    $resources = $client->transactions()->refund("XA7CZNVYY5KK", 20);
} catch (UnprocessableEntityException $e) {
    var_dump($e->getErrors());
}
