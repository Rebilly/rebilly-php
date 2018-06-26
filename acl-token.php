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
$form = new \Rebilly\Entities\Session();
$form->setPermissions([
    \Rebilly\Entities\Session::RESOURCE_SUBSCRIPTIONS => [
        'id' => '*',
        'methods' => [\Rebilly\Entities\Session::METHOD_GET, \Rebilly\Entities\Session::METHOD_POST, \Rebilly\Entities\Session::METHOD_PUT],
    ],
]);
$form->setExpiredTime(date('Y-m-d H:i:s', time() + 3600));

try {
    $token = $client->sessions()->create($form);
    var_dump($token);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

$form->setExpiredTime(date('Y-m-d H:i:s', time() + 76000));

$updatedToken = $client->sessions()->update($token->getId(), $form);

$existing = $client->sessions()->load($token->getId());
var_dump($existing);
