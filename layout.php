<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Blacklist;
use Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;
use Rebilly\Entities\Layout;
use Rebilly\Entities\Note;
use Rebilly\Entities\Plan;
use Rebilly\Entities\Website;
use Rebilly\Http\Exception\ClientException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\ServerException;
use Rebilly\Http\Exception\UnprocessableEntityException;

// Instantiate an Rebilly client.
$client = new Client([
    'apiKey' => 'J01vSAYSlMc+++n2UJriE+/dqSfsW+eAcOnf65U',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);

//add one more plan
$form = new Plan();
$form->setName('MyPerfectPlan13');
$form->setMinQuantity(0);
$form->setMaxQuantity(100);
$form->setCurrency('USD');
$form->setDescription("This plan is shiny31");
$form->setRecurringAmount(29.95);
$form->setRecurringPeriodUnit("month");
$form->setRecurringPeriodLength(1);

try {
    $plan = $client->plans()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e->getErrors());
}

//add one more plan
$form = new Plan();
$form->setName('MyPerfectPlan137');
$form->setMinQuantity(0);
$form->setMaxQuantity(100);
$form->setCurrency('USD');
$form->setDescription("This plan is shiny381");
$form->setRecurringAmount(29.95);
$form->setRecurringPeriodUnit("month");
$form->setRecurringPeriodLength(1);

try {
    $plan1 = $client->plans()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e->getErrors());
}

$item1 = new \Rebilly\Entities\LayoutItem();
$item1->setPlanId($plan->getId());

$item2 = new \Rebilly\Entities\LayoutItem();
$item2->setPlanId($plan1->getId());
$item2->setStarred(true);

//Create
$form = new Layout();
$form->setName("my Layout346");
$form->addItem($item1);
$form->addItem($item2);

try {
    $layout = $client->layouts()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
} catch (ServerException $e) {
    var_dump($e->getMessage());
}

//List
try {
    $layouts = $client->layouts()->search([]);

    foreach ($layouts as $l) {
        var_dump($l);
    }
} catch (ClientException $e) {
    var_dump($e);
}

//update
$form = new Layout();
$form->setName("my Layout2");
$form->addItem($item1);

try {
    $updatedLayout = $client->layouts()->update($layout->getId(), $form);
} catch (UnprocessableEntityException $e) {
    var_dump($e->getErrors());
}

//get
try {
    $layout = $client->layouts()->load($layout->getId());

    var_dump($layout);

} catch (ClientException $e) {
    var_dump($e);
}

echo '<br><br>';

var_dump($layout->getItems());
