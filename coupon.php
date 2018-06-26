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
    'apiKey' => 'K2ZtKoNIhFQg4e3HPgCWQtzRWhg803uTApWzBem',
    'baseUrl' => 'http://apit.dev-local.rebilly.com'
]);
//DONE


$couponForm = new Rebilly\Entities\Coupons\Coupon();

$discountArray = [
    'currency' => 'USD',
    'amount' => 1.99,
];

$discountForm = new Rebilly\Entities\Coupons\Discounts\Fixed($discountArray);
$couponForm->setDiscount($discountForm);
// Coupon will can be used right now
$couponForm->setIssuedTime(date('Y-m-d H:i:s'));

$restrictionArray = [
    'quantity' => 2,
];

$restrictionForm = new Rebilly\Entities\Coupons\Restrictions\DiscountsPerRedemption($restrictionArray);

$couponForm->setRestrictions([$restrictionForm]);

try {
    $coupon = $client->coupons()->create($couponForm);
    var_dump($coupon);
} catch (UnprocessableEntityException $e) {
    echo $e->getMessage();
}
