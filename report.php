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
    'apiKey' => 'ctYW0BpIrbl9jiL7Ovy8jPGyIOHzc3KtFP47Uld',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);
//DONE

//dunning
try {
    $resource = $client->reports()->dunning([
        'periodStart' => '2016-01-01',
        'periodEnd' => '2016-03-20',
    ]);
    var_dump($resource->getData());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//Disputes
try {
    $resource = $client->reports()->disputes([
        'aggregationField' => 'website',
        'periodMonth' => '2016-02',
    ]);
    var_dump($resource->getData());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//RetentionValue
try {
    $resource = $client->reports()->retentionValue([
        'aggregationField' => 'day',
        'aggregationPeriod' => 'day',
        'periodStart' => '2016-02-01',
        'periodEnd' => '2016-04-01',
    ]);
    var_dump($resource->getData());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//RetentionPercentage
try {
    $resource = $client->reports()->retentionPercentage([
        'aggregationField' => 'day',
        'aggregationPeriod' => 'day',
        'periodStart' => '2016-02-01',
        'periodEnd' => '2016-04-01',
    ]);
    var_dump($resource->getData());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//Subscribers
try {
    $resource = $client->reports()->subscribers();
    var_dump($resource->getData());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//Statistics
try {
    $resource = $client->reports()->statistics();
    var_dump($resource->getRevenue());
    var_dump($resource->getCancels());
    var_dump($resource->getRefundsGrowthPercentage());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//Histogram transactions
try {
    $resource = $client->histogram()->transactions([
        'periodStart' => '2016-02-01',
        'periodEnd' => '2016-04-01',
    ]);
    var_dump($resource->getData());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//transactions
try {
    $resource = $client->reports()->transactions([
        'periodStart' => '2016-02-01',
        'periodEnd' => '2016-04-01',
        'aggregationField' => 'website',
        'metric' => 'ApprovalThroughput',
    ]);
    var_dump($resource->getData());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}
