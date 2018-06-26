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
    'apiKey' => 'LSEi99dlKMbkdpO6xDAwKCz6eAH92fh9KXnGoXw',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);

$form = new \Rebilly\Entities\CustomField();
$form->setType(\Rebilly\Entities\CustomField::TYPE_STRING);
$form->setDescription("test field for customer");
$form->setAdditionalSchema([
    "allowedValues" => [
        "value1",
        "value2"
    ]
]);

try {
    $customField = $client->customFields()->create(\Rebilly\Entities\CustomField::RESOURCE_TYPE_CUSTOMERS, "field1",
        $form);
    var_dump($customField->getAdditionalSchema());
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    echo $e->getMessage();
}

