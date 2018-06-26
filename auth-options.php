<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\AuthenticationOptions;
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
$form = new AuthenticationOptions();
$form->setPasswordPattern('/[\\d\\w]{6,}/i');
$form->setResetTokenTtl(7200);
$form->setAuthTokenTtl(3600);

try {
    $authOptions = $client->authenticationOptions()->update($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

//Get
try {
    $authOptions = $client->authenticationOptions()->load();
    var_dump($authOptions);
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}
