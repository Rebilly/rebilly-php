<?php

use Rebilly\Client;

require_once 'vendor/autoload.php';

$client = new Client([
    'apiKey' => 'K2ZtKoNIhFQg4e3HPgCWQtzRWhg803uTApWzBem',
    'baseUrl' => 'http://apit.dev-local.rebilly.com'
]);

$orderNotification = new \Rebilly\Entities\EmailNotifications\EmailNotification();
$orderNotification->setSubject('abc1');
$orderNotification->setBody('test2');
$orderNotification->setStatus('active');
$orderNotification->setNotifications([
    new \Rebilly\Entities\EmailNotifications\Notification([
        'email' => 'sdgsdg@sgsgd.com',
        'status' => 'active',
    ]),
    new \Rebilly\Entities\EmailNotifications\Notification([
        'email' => 'sdgsdg3@sgsgd.com',
        'status' => 'active',
    ]),
]);

try {
    /*$result = $client->emailNotifications()->create([
        'eventType' => 'subscription-created',
        'subject' => 'test subject',
        'body' => 'test body',
        'status' => 'active',
        'notifications' => [
            [
                'status' => 'active',
                'email' => 'test@test.com',
            ],
            [
                'email' => 'sdgsdg3@sgsgd.com',
                'status' => 'inactive',
            ],
        ],
        'tags' => [
            'order-notifications',
        ],
    ]);*/

    //$result = $client->emailNotifications()->search();
    //$result = $client->emailNotificationsTracking()->load('fdfdhfdh');
    var_dump($result);
} catch (Exception $e) {
    var_dump($e);
}
