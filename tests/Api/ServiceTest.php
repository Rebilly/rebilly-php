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

namespace Rebilly\Tests\Api;

use GuzzleHttp\Psr7;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use Psr\Http\Message\RequestInterface as Request;
use Rebilly\Client;
use Rebilly\Entities;
use Rebilly\Entities\Customer;
use Rebilly\Entities\PaymentMethodInstrument;
use Rebilly\Entities\Webhook;
use Rebilly\Http\CurlHandler;
use Rebilly\Paginator;
use Rebilly\Rest;
use Rebilly\Services;
use Rebilly\Tests\Stub\JsonObject;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class ServiceTest.
 */
class ServiceTest extends BaseTestCase
{
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
            },
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
        $handler = $this->createMock(CurlHandler::class);

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->customers();

        $customers = [
            [
                'id' => 'foo',
                'email' => 'user@example.com',
                'firstName' => 'string',
                'lastName' => 'string',
                'ipAddress' => '192.168.0.1',
                'defaultPaymentInstrument' => [
                    'method' => 'cash',
                ],
                'createdTime' => '2016-10-18T06:39:36Z',
                'updatedTime' => '2016-10-18T06:39:36Z',
            ],
            [
                'id' => 'bar',
                'email' => 'user@example.com',
                'firstName' => 'string',
                'lastName' => 'string',
                'ipAddress' => '192.168.0.1',
                'defaultPaymentInstrument' => null,
                'createdTime' => '2016-10-18T06:39:36Z',
                'updatedTime' => '2016-10-18T06:39:36Z',
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
    public function customerLeadSourcesService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);
        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->customers();

        $result = $service->getLeadSource('dummy');
        $this->assertInstanceOf(Entities\LeadSource::class, $result);

        $result = $service->updateLeadSource('dummy', []);
        $this->assertInstanceOf(Entities\LeadSource::class, $result);

        $service->deleteLeadSource('dummy');
    }

    /**
     * @test
     */
    public function customerMerge()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);
        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'lead-sources/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->customers();

        $result = $service->merge('dummy', 'dummy2');
        $this->assertNull($result);
    }

    /**
     * @test
     */
    public function authenticationTokenService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

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

        $handler
            ->expects($this->at(3))
            ->method('__invoke')
            ->will($this->returnValue($client->createResponse()));

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

        $result = $service->exchange('token', ['invalidate' => false, 'expiredTime' => date('c')]);
        $this->assertInstanceOf(Entities\Session::class, $result);

        $service->logout('dummy');
    }

    /**
     * @test
     */
    public function invoiceService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

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

        $result = $service->issue('dummy', date('Y-m-d H:i:s'),  date('Y-m-d H:i:s'));
        $this->assertInstanceOf(Entities\Invoice::class, $result);

        $result = $service->reissue('dummy', date('Y-m-d H:i:s'));
        $this->assertInstanceOf(Entities\Invoice::class, $result);

        $result = $service->recalculate('dummy');
        $this->assertInstanceOf(Entities\Invoice::class, $result);
    }

    /**
     * @test
     */
    public function invoiceItemService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

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
        $handler = $this->createMock(CurlHandler::class);

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

        $result = $service->changePlan('dummy', []);
        $this->assertInstanceOf(Entities\Subscription::class, $result);

        $result = $service->issueInterimInvoice('dummy', []);
        $this->assertInstanceOf(Entities\Subscription::class, $result);

        $result = $service->issueUpcomingInvoice('dummy', 'invoice-1');
        $this->assertInstanceOf(Entities\Subscription::class, $result);
    }

    /**
     * @test
     */
    public function searchUpcomingInvoices()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'subscriptions/subscription-1/upcoming-invoices')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->subscriptions();

        $result = $service->getUpcomingInvoices('subscription-1');
        $this->assertInstanceOf(Rest\Collection::class, $result);
    }

    /**
     * @test
     */
    public function subscriptionCancellationService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue($client->createResponse()));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->subscriptionCancellations();

        $result = $service->update('dummy', []);
        $this->assertInstanceOf(Entities\SubscriptionCancellation::class, $result);

        $result = $service->load('dummy', []);
        $this->assertInstanceOf(Entities\SubscriptionCancellation::class, $result);
    }

    /**
     * @test
     */
    public function couponService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'coupons/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->coupons();

        $result = $service->expiration('dummy');
        $this->assertInstanceOf(Entities\Coupons\Coupon::class, $result);
    }

    /**
     * @test
     */
    public function transactionService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

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

        $result = $service->cancel('dummy');
        $this->assertInstanceOf(Entities\Transaction::class, $result);

        $result = $service->patch('dummy', []);
        $this->assertInstanceOf(Entities\Transaction::class, $result);
    }

    /**
     * @test
     */
    public function paymentCardService()
    {
        $faker = $this->getFaker();
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

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

        $result = $service->createFromToken(['token' => 'dummy'], $card);
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
    }

    /**
     * @test
     */
    public function layoutService()
    {
        $faker = $this->getFaker();
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);
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
            ]),
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
        $handler = $this->createMock(CurlHandler::class);
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

        $handler = $this->createMock(CurlHandler::class);
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

        $handler = $this->createMock(CurlHandler::class);
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

        $handler = $this->createMock(CurlHandler::class);
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

        $service->forgotPassword([]);

        $result = $service->resetPassword('token', []);
        $this->assertInstanceOf(Entities\User::class, $result);

        $result = $service->resetTotp('userId');
        $this->assertInstanceOf(Entities\User::class, $result);

        $result = $service->activate('token');
        $this->assertInstanceOf(Entities\User::class, $result);
    }

    /**
     * @test
     */
    public function redemptionService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'coupons-redemptions/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->couponsRedemptions();

        $result = $service->redeem([]);
        $this->assertInstanceOf(Entities\Coupons\Redemption::class, $result);

        $result = $service->cancel('dummy');
        $this->assertInstanceOf(Entities\Coupons\Redemption::class, $result);
    }

    /**
     * @test
     */
    public function paymentCardMigrationService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'payment-cards-migrations/migrate')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->paymentCardMigrations();

        $result = $service->migrate([]);
        $this->assertInstanceOf(Entities\PaymentCardMigrationsResponse::class, $result);
    }

    /**
     * @test
     */
    public function bankAccountService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'bank-accounts/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->bankAccounts();

        $result = $service->deactivate('dummy');
        $this->assertInstanceOf(Entities\BankAccount::class, $result);
    }

    /**
     * @test
     */
    public function payPalAccountService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'paypal-accounts/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->payPalAccounts();

        $result = $service->deactivate('dummy');
        $this->assertInstanceOf(Entities\PayPalAccount::class, $result);

        $result = $service->activate([], 'dummy');
        $this->assertInstanceOf(Entities\PayPalAccount::class, $result);
    }

    /**
     * @test
     */
    public function paymentCardTokenService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'tokens/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->paymentCardTokens();

        $result = $service->expire('dummy');
        $this->assertInstanceOf(Entities\PaymentCardToken::class, $result);
    }

    /**
     * @test
     */
    public function valuesListService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects($this->any())
            ->method('__invoke')
            ->will($this->returnValue(
                $client->createResponse()->withHeader('Location', 'lists/dummy')
            ));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->lists();

        $result = $service->loadVersion('dummy', 1);
        $this->assertInstanceOf(Entities\ValuesList::class, $result);
    }

    /**
     * @test
     */
    public function webhookService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $response = $client->createResponse()->withHeader('Location', 'previews/webhooks');

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler->expects($this->any())->method('__invoke')->willReturn($response);

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->webhooks();
        $webhook = $service->preview([]);

        self::assertInstanceOf(Webhook::class, $webhook);
    }

    /**
     * @test
     */
    public function webhookTrackingService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $response = $client->createResponse()->withStatus(204);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler->expects($this->any())->method('__invoke')->willReturn($response);

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->webhooksTracking();
        $result = $service->resend('dummy');

        $this->assertNull($result);
    }

    /**
     * @test
     */
    public function webhookCredentialService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);
        $response = $client->createResponse()->withHeader('Location', 'credential-hashes/webhooks/dummy');

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler->expects($this->any())->method('__invoke')->willReturn($response);

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->webhookCredentials();
        $webhook = $service->load('dummy');

        self::assertInstanceOf(Entities\WebhookCredential::class, $webhook);
    }

    /**
     * @test
     */
    public function gatewayDowntimeService()
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
            },
        ]);

        $service = $client->gatewayDowntimes();
        self::assertInstanceOf(Services\GatewayAccountDowntimeService::class, $service);

        $paginator = $service->paginator('dummyGateway');
        self::assertInstanceOf(Paginator::class, $paginator);

        $set = $service->search('dummyGateway');
        self::assertInstanceOf(Rest\Collection::class, $set);

        $entity = $service->load('dummyGateway', 'dummyDowntime');
        self::assertInstanceOf(Entities\GatewayAccountDowntime::class, $entity);

        $entity = $service->create('dummyGateway', []);
        self::assertInstanceOf(Entities\GatewayAccountDowntime::class, $entity);

        $entity = $service->update('dummyGateway', 'dummyDowntime', []);
        self::assertInstanceOf(Entities\GatewayAccountDowntime::class, $entity);

        $service->delete('dummyGateway', 'dummyDowntime');
    }

    /**
     * @test
     */
    public function gatewayLimitService()
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
            },
        ]);

        $service = $client->gatewayLimits();
        self::assertInstanceOf(Services\GatewayAccountLimitService::class, $service);

        $set = $service->search('dummyGateway');
        self::assertInstanceOf(Rest\Collection::class, $set);

        $entity = $service->load('dummyGateway', 'daily-money');
        self::assertInstanceOf(Entities\GatewayAccountLimit::class, $entity);

        $entity = $service->update('dummyGateway', 'daily-money', []);
        self::assertInstanceOf(Entities\GatewayAccountLimit::class, $entity);

        $service->delete('dummyGateway', 'daily-money');
    }

    /**
     * @test
     */
    public function customerTimelineService()
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
            },
        ]);

        $service = $client->customerTimeline();
        self::assertInstanceOf(Services\CustomerTimelineService::class, $service);

        $paginator = $service->paginator('dummy');
        self::assertInstanceOf(Paginator::class, $paginator);

        $set = $service->searchByCustomer('dummy');
        self::assertInstanceOf(Rest\Collection::class, $set);

        $entity = $service->load('dummy', 'dummyDowntime');
        self::assertInstanceOf(Entities\CustomerTimelineMessage::class, $entity);

        $entity = $service->create([], 'dummy');
        self::assertInstanceOf(Entities\CustomerTimelineMessage::class, $entity);
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
                'blocklists',
                Services\BlocklistService::class,
                Entities\Blocklist::class,
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
                'subscriptionCancellations',
                Services\SubscriptionCancellationService::class,
                Entities\SubscriptionCancellation::class,
            ],
            [
                'subscriptions',
                Services\SubscriptionService::class,
                Entities\Subscription::class,
            ],
            [
                'subscriptionReactivations',
                Services\SubscriptionReactivationService::class,
                Entities\SubscriptionReactivation::class,
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
                'webhookCredentials',
                Services\WebhookCredentialsService::class,
                Entities\WebhookCredential::class,
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
        ];
    }
}
