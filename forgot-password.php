<?php
require_once 'vendor/autoload.php';
use Rebilly\Client;

// Instantiate an Rebilly client.
$client = new Client([
    'apiKey' => 'K2ZtKoNIhFQg4e3HPgCWQtzRWhg803uTApWzBem',
    'baseUrl' => 'http://apit.dev-local.rebilly.com'
]);

try {
    $form = new \Rebilly\Entities\Email();
    $form->setEmail('user@rebilly.com');
    $result = $client->users()->forgotPassword($form);

    var_dump($result);
} catch (Exception $e) {
    echo $e->getMessage() . ' ' . $e->getFile() . ' '  . $e->getLine();
}

