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
    //'sessionToken' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjY0MzcwOGI4LTJiOTItNDViYS1hYWFiLTQ0YzYxNGJlNjVlNCJ9.6rzY3--BlCjBxsm_EJ9x73LDryE2fEVwSMP7esUbSyM',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);
//DONE


//Create
$form = new \Rebilly\Entities\Customer();
$form->setFirstName('Xaos');
$form->setEmail('xaossintez@gmail.com');

try {
    $token = $client->customers()->create($form);
    var_dump($token);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}
