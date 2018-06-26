<?php
require_once 'vendor/autoload.php';
use Rebilly\Client;
use Rebilly\Entities\LeadSource;
use Rebilly\Http\Exception\UnprocessableEntityException;

// Instantiate an Rebilly client.
$client = new Client([
    'apiKey' => 'K2ZtKoNIhFQg4e3HPgCWQtzRWhg803uTApWzBem',
    'baseUrl' => 'http://apit.dev-local.rebilly.com'
]);
//DONE
/*
$leadSourceForm = new Rebilly\Entities\LeadSource();
$leadSourceForm->setSource('Scratch Academy');
$leadSourceForm->setCampaign('Education');

try {
    $invoice = $client->invoices()->updateLeadSource('customer1dummy-1', $leadSourceForm);
} catch (UnprocessableEntityException $e) {
    echo $e->getMessage();
}*/
/**
 * @var \Rebilly\Entities\Invoice $invoice
 */
$invoice = $client->invoices()->load("customer1dummy-1", ['expand' => 'leadSource']);

$leadSource = $invoice->getLeadSource();
var_dump($leadSource);

