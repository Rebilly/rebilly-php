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
    'apiKey' => 'J01vSAYSlMc+++n2UJriE+/dqSfsW+eAcOnf65U',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);
//DONE

//Create
$form = new Subscription();
$form->setCustomerId("3J8QKYZGD9TWN3Z");
$form->setPlanId("R6ZBBAUNPBUU8H4");
$form->setWebsiteId("9RXX97NG65MXU75");
$form->setQuantity(1);

try {
    $createdResource = $client->subscriptions()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}
/*
$form->setQuantity(2);
//update
try {
    $createdResource = $client->subscriptions()->update($createdResource->getId(), $form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//Get
try {
    $resource = $client->subscriptions()->load($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//List
try {
    $resources = $client->subscriptions()->search([
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

/switch
$subscriptionSwitch = new SubscriptionSwitch();
$subscriptionSwitch->setPlanId("R6ZBBAUNPBUU8H4");
$subscriptionSwitch->setQuantity(5);
$subscriptionSwitch->setWebsiteId("9RXX97NG65MXU75");
$subscriptionSwitch->setPolicy("AT_NEXT_REBILL");

try {
    $resource = $client->subscriptions()->switchTo($createdResource->getId(), $subscriptionSwitch);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}*/

//cancel
$subscriptionCancel = new SubscriptionCancel();
$subscriptionCancel->setPolicy("AT_NEXT_REBILL");
$subscriptionCancel->setStopReason(10);
try {
    $resource = $client->subscriptions()->cancel($createdResource->getId(), $subscriptionCancel);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

//DELETE
/*
try {
    $client->subscriptions()->delete($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}*/
