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
    'apiKey' => 'K2ZtKoNIhFQg4e3HPgCWQtzRWhg803uTApWzBem',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);
//DONE

// create a gateway for the sandbox
$gatewayAccountForm = new \Rebilly\Entities\GatewayAccount();
$gatewayAccountForm->setMerchantCategoryCode(5310);
$gatewayAccountForm->setAcceptedCurrencies(['USD']);
$gatewayAccountForm->setDescriptor('VOUCHERSALLDAY.COM');
// for sandbox only:
$gatewayAccountForm->setAcquirerName('Bank of Rebilly');
$gatewayAccountForm->setGatewayName('RebillyProcessor');
$gatewayAccountForm->setMethod('payment-card');
$gatewayAccountForm->setPaymentCardSchemes(['Visa', 'MasterCard']);
$gatewayAccountForm->setWebsites(['test.com']);
$gatewayAccountForm->setOrganizationId('fa73c93a-2f97-4398-a29c-f19742cbc6a1');
$gatewayAccountForm->setGatewayConfig([]);

try {
    $gatewayAccount = $client->gatewayAccounts()->create($gatewayAccountForm, 'rebilly-test');
} catch (UnprocessableEntityException $e) {
    var_dump($e->getMessage());
}

