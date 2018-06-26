<?php
require_once 'vendor/autoload.php';
use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Entities\Blacklist;
use \Rebilly\Entities\Contact;
use Rebilly\Entities\Customer;
use Rebilly\Entities\Invoice;
use Rebilly\Entities\InvoiceItem;
use Rebilly\Entities\Note;
use Rebilly\Entities\Website;
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
$form = new Invoice();
$form->setWebsiteId("9RXX97NG65MXU75");
$form->setCustomerId("3J8QKYZGD9TWN3Z");
$form->setCurrency("USD");

try {
    $createdResource = $client->invoices()->create($form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
}


//update
try {
    $createdResource = $client->invoices()->update($createdResource->getId(), $form);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//invoice items
$itemForm = new InvoiceItem();
$itemForm->setQuantity(2);
$itemForm->setDescription("just for nothing");
$itemForm->setUnitPrice(4);
$itemForm->setType(InvoiceItem::TYPE_DEBIT);

try {
    $createdInvoiceItem = $client->invoiceItems()->create($itemForm, $createdResource->getId());
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}

//invoice items get
try {
    $invoiceItem = $client->invoiceItems()->load($createdResource->getId(), $createdInvoiceItem->getId());
    var_dump($invoiceItem);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
}


//Get
try {
    $resource = $client->invoices()->load($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//List
try {
    $resources = $client->invoices()->search([
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
/*
//void
try {
    $resource = $client->invoices()->void($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//abandon
try {
    $resource = $client->invoices()->abandon($createdResource->getId());
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

//issue
try {
    $resource = $client->invoices()->issue($createdResource->getId(), "2015-09-12 00:00:00");
} catch (NotFoundException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}
*/
