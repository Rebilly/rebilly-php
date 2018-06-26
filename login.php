<?php
require_once 'vendor/autoload.php';
use Rebilly\Client;
use Rebilly\Http\Exception\UnprocessableEntityException;

// Instantiate an Rebilly client.
$client = new Client([
    'apiKey' => 'Ee2A4L7iiaaLVMReOVJoLnIEymsa/cxGLMNU8BC',
    'baseUrl' => 'http://api-sandbox.dev-local.rebilly.com'
]);
//DONE

$form = new \Rebilly\Entities\Login();
$form->setEmail('xaossintez@gmail.com');
$form->setPassword('s5p8wu');

try {
    $createdResource = $client->login()->create($form);
    var_dump($createdResource);
} catch (UnprocessableEntityException $e) {
    // Something wrong -- check response for errors
    var_dump($e);
} catch (\Rebilly\Http\Exception\ServerException $e) {
    var_dump($e);
}