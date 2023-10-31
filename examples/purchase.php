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
use Rebilly\Sdk\Model\OrderItem;
use Rebilly\Sdk\Model\OrderItemPlan;
use Rebilly\Sdk\Model\PaymentCardToken;
use Rebilly\Sdk\Model\PaymentInstructionToken;
use Rebilly\Sdk\Model\Plan;
use Rebilly\Sdk\Model\PlanFormulaFlatRate;
use Rebilly\Sdk\Model\PostTransactionRequest;
use Rebilly\Sdk\Model\Product;
use Rebilly\Sdk\Model\SubscriptionOrder;
use Rebilly\Sdk\Model\SubscriptionOrderPlanRecurringInterval;
use Rebilly\Sdk\Model\Website;
use Rebilly\Sdk\UsersService;

require_once __DIR__ . '/../vendor/autoload.php';

$client = new Client([
    'baseUrl' => Client::SANDBOX_HOST,
    'organizationId' => '{organizationId}',
    'apiKey' => '{secretKey}',
]);
$coreService = new CoreService(client: $client);
$usersService = new UsersService(client: $client);

function printEntity(mixed $entity): void
{
    echo json_encode($entity, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR) . PHP_EOL;
    echo str_repeat('=', 80) . PHP_EOL . PHP_EOL;
}

try {
    // Create website

    $website = Website::from()
        ->setName('Website example')
        ->setUrl('https://website.example.test')
        ->setServicePhone('1234567890')
        ->setServiceEmail('mail@example.test');

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

    printEntity($customer);

    $customer = $coreService->customers()->create($customer);

    echo 'Customer: ' . $customer->getId() . PHP_EOL;
    printEntity($customer);

    // Create product

    $product = new Product([
        'name' => 'Test product',
    ]);

    printEntity($product);

    $product = $coreService->products()->create($product);

    echo 'Product: ' . $product->getId() . PHP_EOL;
    printEntity($product);

    // Create plan

    $plan = Plan::from([])
        ->setProductId($product->getId())
        ->setName('Test plan')
        ->setCurrency('USD')
        ->setPricing(
            PlanFormulaFlatRate::from()
                ->setPrice(9.99),
        )
        ->setRecurringInterval(
            SubscriptionOrderPlanRecurringInterval::from()
                ->setUnit(SubscriptionOrderPlanRecurringInterval::UNIT_MONTH)
                ->setLength(1),
        );

    printEntity($plan);

    $plan = $coreService->plans()->create($plan);

    echo 'Plan: ' . $plan->getId() . PHP_EOL;
    printEntity($plan);

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

    printEntity($order);

    /** @var SubscriptionOrder $order */
    $order = $coreService->subscriptions()->create($order);

    echo 'Order: ' . $order->getId() . PHP_EOL;
    printEntity($order);

    $invoice = $coreService->invoices()->get($order->getInitialInvoiceId());

    echo 'Initial invoice: ' . $invoice->getId() . PHP_EOL;
    printEntity($invoice);

    // Create payment token

    $token = PaymentCardToken::from([])
        ->setPaymentInstrument([
            'pan' => '4111111111111111',
            'expMonth' => 12,
            'expYear' => 2024,
            'cvv' => '111',
        ])
        ->setBillingAddress($customer->getPrimaryAddress());

    printEntity($token);

    $token = $coreService->paymentTokens()->create($token);

    echo 'Token: ' . $token->getId() . PHP_EOL;
    printEntity($token);

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
            PaymentInstructionToken::from()
                ->setToken($token->getId()),
        )
        ->setInvoiceIds([(string) $invoice->getId()]);

    printEntity($transactionRequest);

    $transaction = $coreService->transactions()->create($transactionRequest);

    echo 'Transaction: ' . $transaction->getId() . PHP_EOL;
    printEntity($transaction);

    $order = $coreService->subscriptions()->get($order->getId());

    printEntity($order);
} catch (DataValidationException $e) {
    var_dump($e->getValidationErrors());
}
