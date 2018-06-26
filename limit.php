<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Blacklist;
use Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;
use Rebilly\Entities\Note;
use Rebilly\Http\Exception\ClientException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;

// Instantiate an Rebilly client.
$client = new Client([
    'apiKey' => 'DEcCIpxpkaFU5bHQCk+aoLqivBt10/dZvOecsOZ',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);

set_time_limit(0);

try {
    for ($i=0; $i<5001; $i++) {
        $client->customers()->load('myCustomer');
    }
} catch (\Rebilly\Http\Exception\TooManyRequestsException $e) {
    echo $e->getRateLimit().'<br>';
    echo $e->getRateRemaining().'<br>';
    echo $e->getRetryAfter().'<br>';
}


