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
use Rebilly\Http\Exception\ServerException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Entities\PaymentCardToken;

// Instantiate an Rebilly client.
$client = new Client([
    'apiKey' => 'J01vSAYSlMc+++n2UJriE+/dqSfsW+eAcOnf65U',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);
//IN PROGRESS

//Create
$form = new PaymentCardToken();
$form->setPan("4111111111111111");
$form->setExpYear("2016");
$form->setExpMonth("10");
$form->setCvv("123");
$form->setFirstName("John");
$form->setLastName("Connor");

try {
    $createdResource = $client->paymentCardTokens()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
} catch (ServerException $e) {
    echo $e->xdebug_message;
}

//Get
try {
    $resource = $client->paymentCardTokens()->load($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}
echo 'list<br>';
//List
try {
    $resources = $client->paymentCardTokens()->search([
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
echo '<br><br>';

//Expire
try {
    $resource = $client->paymentCardTokens()->expire($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

$client->paymentCards()->createFromToken()
