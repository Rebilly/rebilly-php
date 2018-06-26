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
    'apiKey' => 'cnlfB+1CN/PCg3dj50c7EeqmaxEeD4CgRLu4xTY',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);
//DONE

//Create
$form = new \Rebilly\Entities\CheckoutPage();
$form->setUriPath('myCheckoutUri');
$form->setName('myCheckoutPage');
$form->setPlanId('myPlanId');
$form->setWebsiteId('myWebsiteId');
$form->setRedirectTimeout(5);
$form->setRedirectUrl('http://test.com/url');

try {
    $createdResource = $client->checkoutPages()->create($form);
} catch (UnprocessableEntityException $e) {
    var_dump($e->getMessage());
}

$form->setName("myCheckoutPageUpdated");
//update
try {
    $createdResource = $client->checkoutPages()->update($createdResource->getId(), $form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//Get
try {
    $resource = $client->checkoutPages()->load($createdResource->getId());
    var_dump($resource);
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//List
try {
    $resources = $client->checkoutPages()->search([
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
    $client->checkoutPages()->delete($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}
