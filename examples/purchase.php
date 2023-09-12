<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

use Rebilly\Sdk\Client;
use Rebilly\Sdk\CoreService;
use Rebilly\Sdk\Exception\DataValidationException;
use Rebilly\Sdk\Model\ContactObject;
use Rebilly\Sdk\Model\Customer;
use Rebilly\Sdk\Model\FlatRate;
use Rebilly\Sdk\Model\OrderItem;
use Rebilly\Sdk\Model\OrderItemPlan;
use Rebilly\Sdk\Model\PaymentCardToken;
use Rebilly\Sdk\Model\PaymentToken;
use Rebilly\Sdk\Model\PostPlanRequest;
use Rebilly\Sdk\Model\PostTransactionRequest;
use Rebilly\Sdk\Model\Product;
use Rebilly\Sdk\Model\SubscriptionOrder;
use Rebilly\Sdk\Model\SubscriptionOrderPlanRecurringInterval;
use Rebilly\Sdk\Model\Website;
use Rebilly\Sdk\UsersService;

require_once __DIR__ . '/vendor/autoload.php';

$client = new Client([
    'baseUrl' => Client::SANDBOX_HOST,
    'organizationId' => '{organizationId}',
    'apiKey' => '{secretKey}',
]);
$coreService = new CoreService(client: $client);
$usersService = new UsersService($client);

try {
    // Create website

    $website = new Website();
    $website->setName('Website example');
    $website->setUrl('https://website.example.test');
    $website->setServicePhone('1234567890');
    $website->setServiceEmail('mail@example.test');

    $website = $usersService->websites()->create($website);
    $websiteId = $website->getId();

    // Create customer

    $customer = Customer::from()
        ->setWebsiteId($websiteId)
        ->setPrimaryAddress(
            ContactObject::from()
                ->setFirstName('John')
                ->setLastName('Doe'),
        );

    echo json_encode($customer, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;
    $customer = $coreService->customers()->create($customer);

    echo 'Customer: ' . $customer->getId() . PHP_EOL;
    echo json_encode($customer, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;
    echo str_repeat('=', 80) . PHP_EOL . PHP_EOL;

    // Create product

    $product = new Product([
        'name' => 'Test product',
    ]);

    echo json_encode($product, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;

    $product = $coreService->products()->create($product);

    echo 'Product: ' . $product->getId() . PHP_EOL;
    echo json_encode($product, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;
    echo str_repeat('=', 80) . PHP_EOL . PHP_EOL;

    // Create plan

    $plan = PostPlanRequest::from([])
        ->setProductId($product->getId())
        ->setName('Test plan')
        ->setCurrency('USD')
        ->setPricing(
            FlatRate::from()
                ->setFormula(FlatRate::FORMULA_FLAT_RATE)
                ->setPrice(9.99),
        )
        ->setRecurringInterval(
            SubscriptionOrderPlanRecurringInterval::from()
                ->setUnit(SubscriptionOrderPlanRecurringInterval::UNIT_MONTH)
                ->setLength(1),
        );

    echo json_encode($plan, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;

    $plan = $coreService->plans()->create($plan);

    echo 'Plan: ' . $plan->getId() . PHP_EOL;
    echo json_encode($plan, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;
    echo str_repeat('=', 80) . PHP_EOL . PHP_EOL;

    // Create subscription order

    $order = SubscriptionOrder::from()
        ->setWebsiteId($websiteId)
        ->setCustomerId($customer->getId())
        ->setItems([
            OrderItem::from()
                ->setPlan(
                    OrderItemPlan::from()
                        ->setId($plan->getId())
                )
            ->setQuantity(1),
        ]);

    echo json_encode($order, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;

    /** @var SubscriptionOrder $order */
    $order = $coreService->subscriptions()->create($order);

    echo 'Order: ' . $order->getId() . PHP_EOL;
    echo json_encode($order, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;
    echo str_repeat('=', 80) . PHP_EOL . PHP_EOL;

    $invoice = $coreService->invoices()->get($order->getInitialInvoiceId());

    echo json_encode($invoice, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;
    echo str_repeat('=', 80) . PHP_EOL . PHP_EOL;

    // Create payment token

    $token = PaymentCardToken::from([])
        ->setPaymentInstrument([
            'pan' => '4111111111111111',
            'expMonth' => 12,
            'expYear' => 2024,
            'cvv' => '111',
        ])
        ->setMethod(PaymentCardToken::METHOD_PAYMENT_CARD)
        ->setBillingAddress($customer->getPrimaryAddress());

    echo json_encode($token, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;

    $token = $coreService->paymentTokens()->create($token);

    echo 'Token: ' . $token->getId() . PHP_EOL;
    echo json_encode($token, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;
    echo str_repeat('=', 80) . PHP_EOL . PHP_EOL;

    // Create transaction

    $transactionRequest = PostTransactionRequest::from()
        ->setWebsiteId($websiteId)
        ->setCustomerId($customer->getId())
        ->setType(PostTransactionRequest::TYPE_SALE)
        ->setBillingAddress($customer->getPrimaryAddress())
        ->setCurrency($invoice->getCurrency())
        ->setAmount($invoice->getAmountDue())
        ->setIsMerchantInitiated(true)
        ->setIsProcessedOutside(true)
        ->setPaymentInstruction(
            PaymentToken::from()
                ->setToken($token->getId()),
        )
        ->setInvoiceIds([$invoice->getId()]);

    echo json_encode($transactionRequest, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;

    $transaction = $coreService->transactions()->create($transactionRequest);

    echo 'Transaction: ' . $transaction->getId() . PHP_EOL;
    echo json_encode($transaction, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;
    echo str_repeat('=', 80) . PHP_EOL . PHP_EOL;

    $order = $coreService->subscriptions()->get($order->getId());

    echo json_encode($order, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;
    echo str_repeat('=', 80) . PHP_EOL . PHP_EOL;
} catch (DataValidationException $e) {
    var_dump($e->getValidationErrors());
}
