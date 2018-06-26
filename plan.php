<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Blacklist;
use Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;
use Rebilly\Entities\Note;
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
$form = new Plan();
$form->setName('MyPerfectPlan1');
$form->setMinQuantity(0);
$form->setMaxQuantity(100);
$form->setCurrency('USD');
$form->setDescription("This plan is shiny1");
$form->setRecurringAmount(29.95);
$form->setRecurringPeriodUnit("month");
$form->setRecurringPeriodLength(1);

try {
    $createdResource = $client->plans()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
}

//update
$form->setDescription("This plan is very shiny1");
try {
    $createdResource = $client->plans()->update($createdResource->getId(), $form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
}

//Get
try {
    $resource = $client->plans()->load($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
}

//List
try {
    $resources = $client->plans()->search([
        "limit" => 2,
        "offset" => 0
    ]);

    foreach ($resources as $contact) {
        var_dump($contact);
    }

} catch (ClientException $e) {
    // Something wrong -- check response for errors
}

//DELETE

try {
    $client->plans()->delete($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}
