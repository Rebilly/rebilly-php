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
    'apiKey' => '8gIf6YuhaS/PlGyTXdFJb9CANeXuoN9kwoKDDp7',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);
//DONE


//Create
$form = new \Rebilly\Entities\EmailCredential();
$form->setHost('test.com');
$form->setPort('25');
$form->setSenderEmail('test@test.com');
$form->setSenderName('test');
$form->setUsername('tester');
$form->setPassword('12345');

try {
    $credential = $client->emailCredentials()->create($form);
    var_dump($credential);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

$form = new \Rebilly\Entities\EmailCredential();
$form->setHost('test2.com');
$form->setPort('88');

try {
    $credential = $client->emailCredentials()->update($credential->getId(), $form);
    var_dump($credential);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

$get = $client->emailCredentials()->load($credential->getId());
var_dump($get);

$client->emailCredentials()->delete($credential->getId());

$get = $client->emailCredentials()->load($credential->getId());
var_dump($get);

$list = $client->emailCredentials()->search();