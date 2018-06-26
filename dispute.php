<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Blacklist;
use Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;
use Rebilly\Entities\Note;
use \Rebilly\Entities\PaymentCardAuthorization;
use Rebilly\Http\Exception\ClientException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;

new \Rebilly\Entities\PaymentCard();
// Instantiate an Rebilly client.
$client = new Client([
    'apiKey' => 'K2ZtKoNIhFQg4e3HPgCWQtzRWhg803uTApWzBem',
    'baseUrl' => 'api-sandbox.dev-local.rebilly.com'
]);

$form = new \Rebilly\Entities\Dispute();

$form->setAmount("2.7");
$form->setCurrency('USD');
$form->setAcquirerReferenceNumber('someId');
$form->setStatus(\Rebilly\Entities\Dispute::STATUS_RESPONSE_NEEDED);
$form->setType(\Rebilly\Entities\Dispute::TYPE_1CB);
$form->setReasonCode('1000');
$form->setPostedTime('2016-06-01 00:00:00');
$form->setDeadlineTime('2016-07-01 00:00:00');
$form->setTransactionId('9fcfa6ce-051a-4239-ba90-2f3271527a7a');

try {
    $createdResource = $client->disputes()->create($form);

    var_dump($createdResource);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

/*$re = $client->disputes()->search();

var_dump($re);*/
