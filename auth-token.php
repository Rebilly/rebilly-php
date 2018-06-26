<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\AuthenticationToken;
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
    'apiKey' => 'DEcCIpxpkaFU5bHQCk+aoLqivBt10/dZvOecsOZ',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);
//DONE

$form = new CustomerCredential();
$form->setCustomerId("DUG7QGJTDFWURBZ");
$form->setUsername("testuser1323");
$form->setPassword("passssword");

try {
    $credential = $client->customerCredentials()->create($form);
    //var_dump($credential);
    echo $credential->getCustomerId();

} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}
/*
//List
try {
    $resources = $client->authenticationTokens()->search([
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


$form = new AuthenticationToken();
$form->setUsername("testuser13");
$form->setPassword("passssword");

//Login
try {
    $login = $client->authenticationTokens()->login($form);
    //var_dump($login);
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}


//Verify
try {
    $tokens = $client->authenticationTokens()->verify($login->getToken());
    var_dump($tokens);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

//Logout

try {
    $client->authenticationTokens()->logout($login->getToken());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

*/