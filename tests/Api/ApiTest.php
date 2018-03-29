<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Api;

use InvalidArgumentException;
use JsonSerializable;
use Rebilly\Client;
use Rebilly\Entities;
use Rebilly\Entities\Customer;
use Rebilly\Entities\PaymentMethodInstrument;
use Rebilly\Http\CurlHandler;
use Rebilly\Paginator;
use Rebilly\Rest;
use Rebilly\Services;
use Rebilly\Tests\Stub\JsonObject;
use Rebilly\Tests\TestCase;
use Psr\Http\Message\RequestInterface as Request;
use GuzzleHttp\Psr7;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

/**
 * Class ApiTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
class ApiTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideEntityClasses
     *
     * @param string $class
     * @param string $id
     */
    public function buildJson($class, $id = 'id')
    {
        $getters = [];
        $setters = [];
        $values = [];
        $objects = [];

        if ($id !== null) {
            $values[$id] = $this->getFakeValue($id, $class);
            $values['id'] = $values[$id];
        }

        /** @var Rest\Resource $resource */
        $resource = new $class($values);

        $methods = get_class_methods($resource);

        foreach ($methods as $method) {
            $prefix = substr($method, 0, 3);

            if ($prefix === 'get') {
                $attribute = lcfirst(substr($method, 3));
                $getters[$attribute] = $method;
            } elseif ($prefix === 'set') {
                $attribute = lcfirst(substr($method, 3));
                $setters[$attribute] = $method;
            }
        }

        foreach ($setters as $attribute => $method) {
            $value = $this->getFakeValue($attribute, $class);
            $values[$attribute] = $value;

            // Test attributes factory
            if (is_array($value) && method_exists($resource, "create{$attribute}")) {
                $objects[$attribute] = $resource->{"create{$attribute}"}($value);
            }

            $resource->$method($value);
        }

        foreach ($getters as $attribute => $method) {
            $value = $resource->$method();

            if (isset($objects[$attribute])) {
                if ($value instanceof JsonSerializable) {
                    $value = $value->jsonSerialize();
                } elseif (is_array($value)) {
                    $value = array_map(
                        function (JsonSerializable $item) {
                            return $item->jsonSerialize();
                        },
                        $value
                    );
                }

                $this->assertEquals($values[$attribute], $value, 'Invalid ' . $attribute);
            } elseif (isset($values[$attribute])) {
                $this->assertEquals($values[$attribute], $value, 'Invalid ' . $attribute);
            } else {
                $this->assertNull($value);
            }
        }

        $json = $resource->jsonSerialize();

        $this->assertTrue(is_array($json));
        $this->assertNotEmpty($json);
    }


    /**
     * @test
     * @dataProvider provideServiceClasses
     *
     * @param string $name
     * @param string $serviceClass
     * @param string $entityClass
     * @param string $id
     */
    public function useService($name, $serviceClass, $entityClass, $id = 'id')
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => function (Request $request) use ($client) {
                $response = $client->createResponse();
                $uri = $request->getUri();

                if ($request->getMethod() === 'POST') {
                    $response = $response->withHeader(
                        'Location',
                        $uri->withPath(rtrim($uri->getPath(), '/') . '/dummy')
                    );
                }

                return $response;
            }
        ]);

        $service = $client->$name();
        $this->assertInstanceOf($serviceClass, $service);

        if (method_exists($service, 'paginator')) {
            $paginator = $service->paginator();

            $this->assertInstanceOf(Paginator::class, $paginator);
        }

        if (method_exists($service, 'search')) {
            $set = $service->search();

            $this->assertInstanceOf(Rest\Collection::class, $set);
        }

        if (method_exists($service, 'load')) {
            if ($id === null) {
                $entity = $service->load();
            } else {
                $entity = $service->load($this->getFakeValue($id, $entityClass));
            }

            $this->assertInstanceOf($entityClass, $entity);
        }

        if (method_exists($service, 'create')) {
            $entity = $service->create([]);
            $this->assertInstanceOf($entityClass, $entity);

            if ($id !== null) {
                $entity = $service->create([], $this->getFakeValue($id, $entityClass));
                $this->assertInstanceOf($entityClass, $entity);
            }
        }

        if (method_exists($service, 'update')) {
            if ($id === null) {
                $entity = $service->update([]);
            } else {
                $entity = $service->update($this->getFakeValue($id, $entityClass), []);
            }

            $this->assertInstanceOf($entityClass, $entity);
        }

        if (method_exists($service, 'delete')) {
            if ($id === null) {
                $service->delete();
            } else {
                $service->delete($this->getFakeValue($id, $entityClass));
            }
        }
    }

    /**
     * @test
     */
    public function customerService()
    {
        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class);

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->customers();

        $customers = [
            [
                "id" => "foo",
                "email" => "user@example.com",
                "firstName" => "string",
                "lastName" => "string",
                "ipAddress" => "192.168.0.1",
                "defaultPaymentInstrument" => [
                    'method' => 'cash',
                ],
                "createdTime" => "2016-10-18T06:39:36Z",
                "updatedTime" => "2016-10-18T06:39:36Z",
            ],
            [
                "id" => "bar",
                "email" => "user@example.com",
                "firstName" => "string",
                "lastName" => "string",
                "ipAddress" => "192.168.0.1",
                "defaultPaymentInstrument" => null,
                "createdTime" => "2016-10-18T06:39:36Z",
                "updatedTime" => "2016-10-18T06:39:36Z",
            ],
        ];

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will(
                $this->returnValue(
                    $client
                        ->createResponse()
                        ->withBody(Psr7\stream_for(json_encode($customers)))
                )
            );

        $result = $service->search();

        $this->assertCount(2, $result);
        $this->assertInstanceOf(Rest\Collection::class, $result);

        $this->assertInstanceOf(Customer::class, $result[0]);
        $this->assertSame($customers[0]['id'], $result[0]->getId());
        $this->assertInstanceOf(PaymentMethodInstrument::class, $result[0]->getDefaultPaymentInstrument());

        $this->assertInstanceOf(Customer::class, $result[1]);
        $this->assertSame($customers[1]['id'], $result[1]->getId());
        $this->assertNull($result[1]->getDefaultPaymentInstrument());
    }

    /**
     * @test
     */
    public function authenticationTokenService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class);

        $handler
            ->expects($this->at(0))
            ->method('__invoke')
            ->will($this->returnValue($client->createResponse()));

        $handler
            ->expects($this->at(1))
            ->method('__invoke')
            ->will($this->returnValue($client->createResponse()->withStatus(404)));

        $handler
            ->expects($this->at(2))
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'authentication-tokens/token')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->authenticationTokens();

        $result = $service->verify('dummy');
        $this->assertTrue($result);

        $result = $service->verify('dummy');
        $this->assertFalse($result);

        $result = $service->login(['username' => 'dummy', 'password' => 'qwerty']);
        $this->assertInstanceOf(Entities\AuthenticationToken::class, $result);

        $service->logout('dummy');
    }

    /**
     * @test
     */
    public function invoiceService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'invoices/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->invoices();

        $result = $service->void('dummy');
        $this->assertInstanceOf(Entities\Invoice::class, $result);

        $result = $service->abandon('dummy');
        $this->assertInstanceOf(Entities\Invoice::class, $result);

        $result = $service->issue('dummy', date('Y-m-d H:i:s'));
        $this->assertInstanceOf(Entities\Invoice::class, $result);
    }

    /**
     * @test
     */
    public function invoiceItemService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class);

        $handler
            ->expects($this->at(0))
            ->method('__invoke')
            ->will($this->returnValue($client->createResponse()));

        $handler
            ->expects($this->at(1))
            ->method('__invoke')
            ->will($this->returnValue($client->createResponse()));

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'invoices/invoiceId/items/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->invoiceItems();

        $paginator = $service->paginator('invoiceId');
        $this->assertInstanceOf(Paginator::class, $paginator);

        $result = $service->search('invoiceId');
        $this->assertInstanceOf(Rest\Collection::class, $result);

        $result = $service->load('invoiceId', 'dummy');
        $this->assertInstanceOf(Entities\InvoiceItem::class, $result);

        $result = $service->create([], 'invoiceId');
        $this->assertInstanceOf(Entities\InvoiceItem::class, $result);

        $result = $service->create([], 'invoiceId', 'dummy');
        $this->assertInstanceOf(Entities\InvoiceItem::class, $result);
    }

    /**
     * @test
     */
    public function subscriptionService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'subscriptions/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->subscriptions();

        $result = $service->cancel('dummy', []);
        $this->assertInstanceOf(Entities\Subscription::class, $result);
    }

    /**
     * @test
     */
    public function transactionService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'transactions/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->transactions();

        $result = $service->refund('dummy', 10);
        $this->assertInstanceOf(Entities\Transaction::class, $result);
    }

    /**
     * @test
     */
    public function paymentService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class);

        $handler
            ->expects($this->at(0))
            ->method('__invoke')
            ->will($this->returnValue($client->createResponse()));

        $handler
            ->expects($this->at(1))
            ->method('__invoke')
            ->will($this->returnValue($client->createResponse()));

        $handler
            ->expects($this->at(1))
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'queue/payments/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->payments();

        $paginator = $service->paginatorForQueue();
        $this->assertInstanceOf(Paginator::class, $paginator);

        $result = $service->searchInQueue();
        $this->assertInstanceOf(Rest\Collection::class, $result);

        $result = $service->loadFromQueue('dummy');
        $this->assertInstanceOf(Entities\ScheduledPayment::class, $result);
    }

    /**
     * @test
     */
    public function paymentCardService()
    {
        $faker = $this->getFaker();
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'payment-cards/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->paymentCards();

        $card = new JsonObject(['customerId' => $faker->uuid]);

        $result = $service->createFromToken('token', $card);
        $this->assertInstanceOf(Entities\PaymentCard::class, $result);

        $result = $service->createFromToken('token', ['customerId' => $faker->uuid], 'dummy');
        $this->assertInstanceOf(Entities\PaymentCard::class, $result);

        $result = $service->authorize([], 'dummy');
        $this->assertInstanceOf(Entities\PaymentCard::class, $result);

        $result = $service->deactivate('dummy');
        $this->assertInstanceOf(Entities\PaymentCard::class, $result);
    }

    /**
     * @test
     */
    public function customFieldService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => function () use ($client) {
                return $client->createResponse();
            },
        ]);

        $service = $client->customFields();
        $entityClass = Entities\CustomField::class;
        $resourceType = Entities\ResourceType::TYPE_CUSTOMERS;

        $paginator = $service->paginator($resourceType);
        $this->assertInstanceOf(Paginator::class, $paginator);

        $entity = $service->create($resourceType, $this->getFakeValue('id', $entityClass), []);
        $this->assertInstanceOf($entityClass, $entity);

        $set = $service->search($resourceType);
        $this->assertInstanceOf(Rest\Collection::class, $set);

        $entity = $service->load($resourceType, $this->getFakeValue('id', $entityClass));
        $this->assertInstanceOf($entityClass, $entity);

        $entity = $service->update($resourceType, $this->getFakeValue('id', $entityClass), []);
        $this->assertInstanceOf($entityClass, $entity);

        $service->delete($resourceType, $this->getFakeValue('id', $entityClass));
    }

    /**
     * @test
     */
    public function layoutService()
    {
        $faker = $this->getFaker();
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class);
        $layout = new Entities\Layout();
        $layout->addItem([
            'planId' => $faker->uuid,
            'starred' => true,
        ]);
        $layout->setItems([
            [
                'planId' => $faker->uuid,
                'starred' => true,
            ],
            new Entities\LayoutItem([
                'planId' => $faker->uuid,
            ])
        ]);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client
                    ->createResponse()
                    ->withHeader('Location', 'layouts/dummy')
                    ->withBody(Psr7\stream_for(json_encode($layout)))
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->layouts();

        $result = $service->create($layout);
        $this->assertInstanceOf(Entities\Layout::class, $result);
        $this->assertCount(2, $result->getItems());
        $this->assertInstanceOf(Entities\LayoutItem::class, $result->getItems()[0]);
    }

    /**
     * @test
     */
    public function userService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->getMock(CurlHandler::class);
        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'users/userId')
            ));
        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->users();
        $result = $service->load('userId');
        $this->assertInstanceOf(Entities\User::class, $result);

        $handler = $this->getMock(CurlHandler::class);
        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'users/signup')
            ));
        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->users();
        $result = $service->signup([]);
        $this->assertInstanceOf(Entities\User::class, $result);

        $handler = $this->getMock(CurlHandler::class);
        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'users/signin')
            ));
        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->users();
        $result = $service->signin([]);
        $this->assertInstanceOf(Entities\User::class, $result);

        $handler = $this->getMock(CurlHandler::class);
        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'users/userId')
            ));
        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->users();
        $result = $service->updatePassword('userId', []);
        $this->assertInstanceOf(Entities\User::class, $result);
    }

    /**
     * @test
     */
    public function useFactories()
    {
        $resource = new Customer();

        $data = $this->getFakeValue('primaryAddress', Customer::class);

        self::assertNotEmpty($data);

        $resource->setPrimaryAddress($data);

        self::assertInstanceOf(Entities\Address::class, $resource->getPrimaryAddress());

        $data = $this->getFakeValue('primaryAddress', Customer::class);

        $resource->setPrimaryAddress(Entities\Address::createFromData($data));

        self::assertInstanceOf(Entities\Address::class, $resource->getPrimaryAddress());
    }

    /**
     * @return array
     */
    public function provideEntityClasses()
    {
        return [
            [Entities\Address::class],
            [Entities\Attachment::class],
            [Entities\AuthenticationOptions::class, null],
            [Entities\AuthenticationToken::class, 'token'],
            [Entities\Blacklist::class],
            [Entities\Contact::class],
            [Entities\Contact\Email::class],
            [Entities\Contact\PhoneNumber::class],
            [Entities\Customer::class],
            [Entities\CustomerCredential::class],
            [Entities\File::class],
            [Entities\Invoice::class],
            [Entities\InvoiceItem::class],
            [Entities\Layout::class],
            [Entities\LayoutItem::class, null],
            [Entities\LeadSource::class],
            [Entities\Payment::class],
            [Entities\PaymentMethods\PaymentCardMethod::class, null],
            [Entities\PaymentCard::class],
            [Entities\PaymentCardAuthorization::class, null],
            [Entities\PaymentCardToken::class, null],
            [Entities\Plan::class],
            [Entities\ResetPasswordToken::class, 'token'],
            [Entities\ScheduledPayment::class],
            [Entities\Subscription::class],
            [Entities\SubscriptionCancel::class, null],
            [Entities\Transaction::class],
            [Entities\Website::class],
            [Entities\Note::class],
            [Entities\Organization::class],
            [Entities\GatewayAccount::class],
            [Entities\BankAccount::class],
            [Entities\PayPalAccount::class],
            [Entities\CustomField::class, 'name'],
            [Entities\Session::class],
            [Entities\User::class],
            [Entities\ThreeDSecure::class],
            [Entities\UpdatePassword::class],
            [Entities\ApiKey::class],
            [Entities\ApiTracking::class],
            [Entities\CheckoutPage::class],
            [Entities\SubscriptionTracking::class],
            [Entities\Signup::class],
            [Entities\ResetPassword::class],
            [Entities\ForgotPassword::class],
            [Entities\Login::class],
            [Entities\Dispute::class],
            [Entities\PaymentCardMigrationsRequest::class],
            [Entities\Coupons\Coupon::class],
            [Entities\Coupons\Redemption::class],
            [Entities\ValuesList::class],
            [Entities\Product::class],
            [Entities\Webhook::class],
            [Entities\RiskMetadata::class],
            [Entities\WebhookTracking::class],
            [Entities\Shipping\ShippingZone::class],
            [Entities\InvoiceTax::class],
            [Entities\EmailNotifications\EmailNotification::class],
            [Entities\EmailNotifications\EmailNotificationTracking::class],
        ];
    }


    /**
     * @return array
     */
    public function provideServiceClasses()
    {
        return [
            [
                'attachments',
                Services\AttachmentService::class,
                Entities\Attachment::class,
            ],
            [
                'authenticationOptions',
                Services\AuthenticationOptionsService::class,
                Entities\AuthenticationOptions::class,
                null,
            ],
            [
                'authenticationTokens',
                Services\AuthenticationTokenService::class,
                Entities\AuthenticationToken::class,
                'token',
            ],
            [
                'blacklists',
                Services\BlacklistService::class,
                Entities\Blacklist::class,
            ],
            [
                'contacts',
                Services\ContactService::class,
                Entities\Contact::class,
            ],
            [
                'customerCredentials',
                Services\CustomerCredentialService::class,
                Entities\CustomerCredential::class,
            ],
            [
                'customers',
                Services\CustomerService::class,
                Entities\Customer::class,
            ],
            /*[ // TODO depends from invoiceId
                'invoiceItems',
                Services\InvoiceItemService::class,
                Entities\InvoiceItem::class,
            ],*/
            [
                'files',
                Services\FileService::class,
                Entities\File::class,
            ],
            [
                'invoices',
                Services\InvoiceService::class,
                Entities\Invoice::class,
            ],
            [
                'layouts',
                Services\LayoutService::class,
                Entities\Layout::class,
            ],
            [
                'leadSources',
                Services\LeadSourceService::class,
                Entities\LeadSource::class,
            ],
            [
                'paymentCards',
                Services\PaymentCardService::class,
                Entities\PaymentCard::class,
            ],
            [
                'paymentCardTokens',
                Services\PaymentCardTokenService::class,
                Entities\PaymentCardToken::class,
            ],
            [
                'payments',
                Services\PaymentService::class,
                Entities\Payment::class,
            ],
            [
                'scheduledPayments',
                Services\SchedulePaymentService::class,
                Entities\ScheduledPayment::class,
            ],
            [
                'plans',
                Services\PlanService::class,
                Entities\Plan::class,
            ],
            [
                'resetPasswordTokens',
                Services\ResetPasswordTokenService::class,
                Entities\ResetPasswordToken::class,
            ],
            [
                'subscriptions',
                Services\SubscriptionService::class,
                Entities\Subscription::class,
            ],
            [
                'transactions',
                Services\TransactionService::class,
                Entities\Transaction::class,
            ],
            [
                'websites',
                Services\WebsiteService::class,
                Entities\Website::class,
            ],
            [
                'notes',
                Services\NoteService::class,
                Entities\Note::class,
            ],
            [
                'organizations',
                Services\OrganizationService::class,
                Entities\Organization::class,
            ],
            [
                'gatewayAccounts',
                Services\GatewayAccountService::class,
                Entities\GatewayAccount::class,
            ],
            [
                'bankAccounts',
                Services\BankAccountService::class,
                Entities\BankAccount::class,
            ],
            [
                'payPalAccounts',
                Services\PayPalAccountService::class,
                Entities\PayPalAccount::class,
            ],
            [
                'sessions',
                Services\SessionService::class,
                Entities\Session::class,
            ],
            [
                'users',
                Services\UserService::class,
                Entities\User::class,
            ],
            [
                'threeDSecure',
                Services\ThreeDSecureService::class,
                Entities\ThreeDSecure::class,
            ],
            [
                'apiKeys',
                Services\ApiKeyService::class,
                Entities\ApiKey::class,
            ],
            [
                'checkoutPages',
                Services\CheckoutPageService::class,
                Entities\CheckoutPage::class,
            ],
            [
                'apiTracking',
                Services\ApiTrackingService::class,
                Entities\ApiTracking::class,
            ],
            [
                'subscriptionTracking',
                Services\SubscriptionTrackingService::class,
                Entities\SubscriptionTracking::class,
            ],
            [
                'disputes',
                Services\DisputeService::class,
                Entities\Dispute::class,
            ],
            [
                'paymentCardMigrations',
                Services\PaymentCardMigrationsService::class,
                Entities\PaymentCardMigrationsRequest::class,
            ],
            [
                'products',
                Services\ProductService::class,
                Entities\Product::class,
            ],
            [
                'lists',
                Services\ValuesListService::class,
                Entities\ValuesList::class,
            ],
            [
                'listsTracking',
                Services\ValuesListTrackingService::class,
                Entities\ValuesList::class,
            ],
            [
                'shippingZones',
                Services\ShippingZoneService::class,
                Entities\Shipping\ShippingZone::class,
            ],
            [
                'webhooks',
                Services\WebhooksService::class,
                Entities\Webhook::class,
            ],
            [
                'webhooksTracking',
                Services\WebhookTrackingService::class,
                Entities\WebhookTracking::class,
            ],
            [
                'coupons',
                Services\CouponService::class,
                Entities\Coupons\Coupon::class,
            ],
            [
                'couponsRedemptions',
                Services\RedemptionService::class,
                Entities\Coupons\Redemption::class,
            ],
            [
                'emailNotifications',
                Services\EmailNotificationService::class,
                Entities\EmailNotifications\EmailNotification::class,
            ],
            [
                'emailNotificationsTracking',
                Services\EmailNotificationTrackingService::class,
                Entities\EmailNotifications\EmailNotificationTracking::class,
            ],
        ];
    }

    /**
     * @param string $attribute
     * @param string $class
     *
     * @return mixed
     */
    private function getFakeValue($attribute, $class)
    {
        $faker = $this->getFaker();

        $faker->phoneNumber;

        switch ($attribute) {
            case 'id':
            case 'password':
            case 'currentPassword':
            case 'fileId':
            case 'newPassword':
            case 'customerId':
            case 'contactId':
            case 'websiteId':
            case 'initialInvoiceId':
            case 'billingContactId':
            case 'deliveryContactId':
            case 'planId':
            case 'processorAccountId':
            case 'paymentCardId':
            case 'gatewayAccountId':
            case 'defaultCardId':
            case 'defaultPaymentInstrumentId':
            case 'relatedId':
            case 'subscriptionId':
            case 'userId':
            case 'transactionId':
            case 'fromGatewayAccountId':
            case 'toGatewayAccountId':
            case 'redemptionCode':
            case 'productId':
                return $faker->uuid;
            case 'dueTime':
            case 'expiredTime':
            case 'expireTime': // TODO inconsistent name
            case 'periodStartTime':
            case 'renewalTime':
            case 'periodEndTime':
            case 'downtimeStart':
            case 'downtimeEnd':
            case 'postedTime':
            case 'deadlineTime':
            case 'issuedTime':
            case 'effectiveTime':
                return $faker->date('Y-m-d H:i:s');
            case 'unitPrice':
            case 'amount':
            case 'recurringAmount':
            case 'trialAmount':
            case 'setupAmount':
                return $faker->randomFloat(2);
            case 'uriPath':
            case 'gatewayName':
            case 'organizationId':
            case 'acquirerName':
            case 'routingNumber':
            case 'accountNumber':
            case 'enrollmentEci':
            case 'eci':
            case 'cavv':
            case 'xid':
            case 'senderName':
            case 'redirectUrl':
            case 'request':
            case 'response':
            case 'acquirerReferenceNumber':
                return $faker->word;
            case 'organization':
            case 'company':
                return $faker->company;
            case 'servicePhone':
            case 'businessPhone':
                return $faker->phoneNumber;
            case 'serviceEmail':
            case 'senderEmail':
                return $faker->email;
            case 'region':
                return $faker->city;
            case 'ipAddress':
                return $faker->ipv4;
            case 'token':
            case 'fingerprint':
            case 'secretKey':
                return $faker->md5;
            case 'name':
            case 'bankName':
            case 'medium':
            case 'source':
            case 'campaign':
            case 'term':
            case 'content':
            case 'affiliate':
            case 'subAffiliate':
            case 'salesAgent':
            case 'clickId':
            case 'path':
            case 'descriptor':
            case 'subject':
            case 'body':
                return $faker->words;
            case 'description':
            case 'richDescription':
            case 'cancelDescription':
                return $faker->sentences;
            case 'pan':
                return $faker->creditCardNumber;
            case 'cvv':
                return $faker->numberBetween(100, 999);
            case 'expYear':
                return $faker->year;
            case 'expMonth':
                return $faker->month;
            case 'host':
                return $faker->url;
            case 'userName':
                return $faker->userName;
            case 'eventsFilter':
                return $faker->randomElements([
                    "gateway-account-requested",
                    "subscription-trial-ended",
                    "subscription-activated",
                    "subscription-canceled",
                    "subscription-renewed",
                    "transaction-processed",
                    "payment-card-expired",
                    "payment-declined",
                    "invoice-modified",
                    "invoice-created",
                    "dispute-created",
                    "suspended-payment-completed"
                ], 3);
            case 'headers':
                return [["name" => $faker->word, "value" => $faker->word, "status" => $faker->randomElement(["active", "inactive"])]];
            case 'credentialHash':
                return $faker->uuid;
            case 'isActive':
            case 'archived':
            case 'starred':
            case 'allowCustomCustomerId':
                return $faker->boolean();
            case 'credentialTtl':
            case 'authTokenTtl':
            case 'resetTokenTtl':
            case 'quantity':
            case 'recurringPeriodLength':
            case 'trialPeriodLength':
            case 'contractTermLength':
            case 'recurringPeriodLimit':
            case 'minQuantity':
            case 'maxQuantity':
            case 'monthlyLimit':
            case 'redirectTimeout':
                return $faker->numberBetween(1, 10);
            case 'address2':
                return $faker->address;
            case 'postalCode':
                return $faker->postcode;
            case 'email':
            case 'firstName':
            case 'lastName':
            case 'username':
            case 'url':
            case 'city':
            case 'country':
            case 'phoneNumber':
                return $faker->$attribute;
            case 'address':
                switch ($class) {
                    case Entities\BankAccount::class:
                    case Entities\PayPalAccount::class:
                        return [
                            'firstName' => $faker->firstName,
                            'lastName' => $faker->lastName,
                            'city' => $faker->city,
                            'region' => $faker->word,
                            'postalCode' => $faker->postcode,
                            'organization' => $faker->company,
                            'country' => $faker->countryCode,
                            'address' => $faker->address,
                            'address2' => $faker->streetAddress,
                            'emails' => [
                                new Entities\Contact\Email([
                                    'label' => $faker->word,
                                    'primary' => $faker->boolean(),
                                    'value' => $faker->email,
                                ]),
                            ],
                            'phoneNumbers' => [
                                new Entities\Contact\PhoneNumber([
                                    'label' => $faker->word,
                                    'primary' => $faker->boolean(),
                                    'value' => $faker->phoneNumber,
                                ]),
                            ],
                        ];
                    default:
                        return $faker->$attribute;
                }
            case 'phoneNumbers':
                return [
                    new Entities\Contact\PhoneNumber([
                        'label' => $faker->word,
                        'primary' => $faker->boolean(),
                        'value' => $faker->phoneNumber,
                    ]),
                ];
            case 'emails':
                return [
                    new Entities\Contact\Email([
                        'label' => $faker->word,
                        'primary' => $faker->boolean(),
                        'value' => $faker->email,
                    ]),
                ];
            case 'extension':
                return $faker->randomElement(Entities\File::allowedTypes());
            case 'tags':
                return [$faker->word];
            case 'type':
            case 'datetimeFormat':
                switch ($class) {
                    case Entities\Blacklist::class:
                        return $faker->randomElement(Entities\Blacklist::types());
                    case Entities\InvoiceItem::class:
                        return $faker->randomElement(Entities\InvoiceItem::types());
                    case Entities\CustomField::class:
                        return $faker->randomElement(Entities\CustomField::allowedTypes());
                    case Entities\ApiKey::class:
                        return $faker->randomElement(Entities\ApiKey::datetimeFormats());
                    case Entities\Dispute::class:
                        return $faker->randomElement(Entities\Dispute::allowedTypes());
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
            case 'value':
                switch ($class) {
                    case Entities\Contact\Email::class:
                    case Entities\Contact\PhoneNumber::class:
                    case Entities\Blacklist::class:
                        return $faker->word;
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
            case 'policy':
                switch ($class) {
                    case Entities\SubscriptionCancel::class:
                        return $faker->randomElement(Entities\SubscriptionCancel::policies());
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
            case 'items':
                switch ($class) {
                    case Entities\Layout::class:
                        return [
                            new Entities\LayoutItem([
                                'planId' => 'foo',
                                'starred' => true,
                            ]),
                            new Entities\LayoutItem([
                                'planId' => 'bar',
                            ]),
                        ];
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
            case 'recurringPeriodUnit':
            case 'trialPeriodUnit':
            case 'contractTermUnit':
                return 'day'; // TODO
            case 'passwordPattern':
                return '/\w\d{6,}/';
            case 'currency':
                return 'USD';
            case 'payment':
                return []; // TODO
            case 'relatedType':
                switch ($class) {
                    case Entities\Attachment::class:
                        return $faker->randomElement(Entities\Attachment::allowedTypes());
                    case Entities\Note::class:
                        return $faker->randomElement(Entities\Note::relatedTypes());
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
            case 'label':
                switch ($class) {
                    case Entities\Contact\Email::class:
                    case Entities\Contact\PhoneNumber::class:
                        return $faker->word;
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
            case 'primary':
                return $faker->boolean();
            case 'primaryAddress':
            case 'billingAddress':
            case 'deliveryAddress':
                return [
                    'firstName' => $faker->firstName,
                    'lastName' => $faker->lastName,
                    'city' => $faker->city,
                    'region' => $faker->word,
                    'postalCode' => $faker->postcode,
                    'organization' => $faker->company,
                    'country' => $faker->countryCode,
                    'address' => $faker->address,
                    'address2' => $faker->streetAddress,
                    'emails' => [
                        [
                            'label' => $faker->word,
                            'primary' => $faker->boolean(),
                            'value' => $faker->email,
                        ]
                    ],
                    'phoneNumbers' => [
                        [
                            'label' => $faker->word,
                            'primary' => $faker->boolean(),
                            'value' => $faker->phoneNumber,
                        ]
                    ],
                ];
            case 'method':
            case 'defaultPaymentMethod':
                switch ($class) {
                    case Entities\Customer::class:
                        return new Entities\PaymentMethods\PaymentCardMethod(); // TODO
                    case Entities\ApiTracking::class:
                        return 'GET';
                    case Entities\GatewayAccount::class:
                        return Entities\PaymentMethod::METHOD_PAYMENT_CARD;
                    default:
                        return new Entities\PaymentMethods\PaymentCardMethod(); // TODO
                }
            case 'customFields':
            case 'gatewayConfig':
            case 'additionalSchema':
                return [];
            case 'websites':
                return [$faker->word];
            case 'acceptedCurrencies':
                return ['USD'];
            case 'dynamicDescriptor':
            case 'threeDSecure':
                return false;
            case 'paymentCardSchemes':
            case 'paymentMethods':
                return ['Visa'];
            case 'merchantCategoryCode':
                return 5966;
            case 'accountType':
                return 'checking';
            case 'permissions':
                return [];
            case 'invoiceIds':
                return [];
            case 'enrolled':
            case 'payerAuthResponseStatus':
            case 'signatureVerification':
                return 'Y';
            case 'port':
                return $faker->numberBetween(25, 100);
            case 'autopay':
                return $faker->boolean();
            case 'duration':
                return $faker->numberBetween(1, 100);
            case 'paymentInstrument':
                switch ($class) {
                    case Entities\Payment::class:
                        return new Entities\PaymentInstruments\PaymentCardInstrument([
                            'method' => Entities\PaymentMethod::METHOD_PAYMENT_CARD
                        ]);
                    default:
                        return new Entities\PaymentInstruments\PaymentCardPaymentInstrument();
                }
            case 'defaultPaymentInstrument':
                return [
                    'method' => Entities\PaymentMethod::METHOD_PAYMENT_CARD,
                ];
            case 'retryInstruction':
                return new Entities\PaymentRetryInstruction();
            case 'reasonCode':
                return '1000';
            case 'status':
                switch ($class) {
                    case Entities\ApiTracking::class:
                        return 200;
                    case Entities\Dispute::class:
                        return $faker->randomElement(Entities\Dispute::allowedStatuses());
                    default:
                        return $faker->randomElement(Entities\Dispute::allowedStatuses());
                }
            case 'paymentCardIds':
                return [$faker->uuid];
            case 'discount':
                return [
                    'type' => 'fixed',
                    'amount' => $faker->numberBetween(1, 100),
                    'currency' => 'USD',
                ];
            case 'taxCategoryId':
                return $faker->randomElement(Entities\Product::allowedTaxCategories());
            case 'accountingCode':
                return (string) $faker->numberBetween(1000, 10000);
            case 'requiresShipping':
                return $faker->randomElement([true, false]);
            case 'restrictions':
            case 'additionalRestrictions':
                return [
                    [
                        'type' => 'restrict-to-invoices',
                        'invoiceIds' => ['foo', 'bar'],
                    ],
                    [
                        'type' => 'discounts-per-redemption',
                        'quantity' => $faker->numberBetween(1, 100),
                    ]
                ];
            case 'countries':
                return ['US'];
            case 'rates':
                return [
                    Entities\Shipping\Rate::createFromData([
                        'name' => 'test',
                        'minOrderSubtotal' => 4,
                        'maxOrderSubtotal' => 10,
                        'price' => 5,
                        'default' => false,
                        'currency' => 'USD',
                    ]),
                ];
            case 'values':
                return [
                    $faker->word,
                    $faker->numberBetween(1, 100),
                ];
            case 'cancelCategory':
                return $faker->randomElement(Entities\SubscriptionCancel::cancelCategories());
            case 'canceledBy':
                return $faker->randomElement(Entities\SubscriptionCancel::canceledBySources());
            case 'riskMetadata':
                return new Entities\RiskMetadata([
                    'ipAddress' => $faker->ipv4,
                ]);
            case 'httpHeaders':
                return [
                    'User-Agent' => 'Mozilla/5.0',
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                ];
            case 'isDefault':
                return $faker->boolean;
            case 'preview':
            case 'prorated':
                return $faker->boolean();
            case 'renewalPolicy':
                return $faker->randomElement(Entities\SubscriptionChangePlan::renewalPolicies());
            case 'notifications':
                return [
                    [
                        'email' => $faker->email,
                        'active' => 'active',
                    ],
                ];
            case 'eventType':
                return $faker->randomElement([
                    "subscription-created",
                    "subscription-activated",
                    "subscription-canceled",
                    "subscription-renewed",
                    "payment-card-expired",
                ]);
            default:
                throw new InvalidArgumentException(
                    sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                );
        }
    }
}
