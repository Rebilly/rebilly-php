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
use GuzzleHttp\Psr7\Utils;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Message\RequestInterface as Request;
use Rebilly\Client;
use Rebilly\Entities;
use Rebilly\Entities\Cashier\CashierCustomAmount;
use Rebilly\Entities\Cashier\CashierRequest;
use Rebilly\Entities\Cashier\CashierStrategy;
use Rebilly\Entities\Cashier\CashierStrategyAmounts;
use Rebilly\Entities\Customer;
use Rebilly\Entities\PaymentMethodInstrument;
use Rebilly\Entities\Webhook;
use Rebilly\Http\CurlHandler;
use Rebilly\Paginator;
use Rebilly\Rest;
use Rebilly\Services;
use Rebilly\Tests\Stub\JsonObject;
use Rebilly\Tests\TestCase as BaseTestCase;
use ReflectionMethod;

/**
 * Class ServiceTest.
 */
class ServiceTest extends BaseTestCase
{
    private function getFakeRequiredAttributes($object, $method)
    {
        $testedMethod = new ReflectionMethod($object, $method);
        $attributesCount = $testedMethod->getNumberOfRequiredParameters();

        return array_fill(0, $attributesCount, 'someRequiredParameterValue');
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
                        (string) $uri->withPath(rtrim($uri->getPath(), '/') . '/dummy')
                    );
                }

                return $response;
            },
        ]);

        $service = $client->$name();
        self::assertInstanceOf($serviceClass, $service);

        if (method_exists($service, 'paginator')) {
            $paginator = $service->paginator(...$this->getFakeRequiredAttributes($service, 'paginator'));

            self::assertInstanceOf(Paginator::class, $paginator);
        }

        if (method_exists($service, 'search')) {
            $set = $service->search(...$this->getFakeRequiredAttributes($service, 'search'));

            self::assertInstanceOf(Rest\Collection::class, $set);
        }

        if (method_exists($service, 'load')) {
            $requiredAttributes = $this->getFakeRequiredAttributes($service, 'load');
            if ($id === null) {
                $entity = $service->load(...$requiredAttributes);
            } else {
                $entity = $service->load(...([$this->getFakeValue($id, $entityClass)] + $requiredAttributes));
            }

            self::assertInstanceOf($entityClass, $entity);
        }

        if (method_exists($service, 'create')) {
            $entity = $service->create([]);
            self::assertInstanceOf($entityClass, $entity);

            if ($id !== null) {
                $entity = $service->create([], $this->getFakeValue($id, $entityClass));
                self::assertInstanceOf($entityClass, $entity);
            }
        }

        if (method_exists($service, 'update')) {
            $requiredAttributes = $this->getFakeRequiredAttributes($service, 'update');
            if ($id === null) {
                $entity = $service->update(...($requiredAttributes + [[]]));
            } else {
                $entity = $service->update(...($requiredAttributes + [$this->getFakeValue($id, $entityClass), []]));
            }

            self::assertInstanceOf($entityClass, $entity);
        }

        if (method_exists($service, 'patch')) {
            if ($id === null) {
                $entity = $service->patch([]);
            } else {
                $entity = $service->patch($this->getFakeValue($id, $entityClass), []);
            }

            self::assertInstanceOf($entityClass, $entity);
        }

        if (method_exists($service, 'delete')) {
            $requiredAttributes = $this->getFakeRequiredAttributes($service, 'delete');
            if ($id === null) {
                $service->delete(...$requiredAttributes);
            } else {
                $service->delete(...([$this->getFakeValue($id, $entityClass)] + $requiredAttributes));
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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn(
                $client
                    ->createResponse()
                    ->withBody(Psr7\stream_for(json_encode($customers)))
            );

        $result = $service->search();

        self::assertCount(2, $result);
        self::assertInstanceOf(Rest\Collection::class, $result);

        self::assertInstanceOf(Customer::class, $result[0]);
        self::assertSame($customers[0]['id'], $result[0]->getId());
        self::assertInstanceOf(PaymentMethodInstrument::class, $result[0]->getDefaultPaymentInstrument());

        self::assertInstanceOf(Customer::class, $result[1]);
        self::assertSame($customers[1]['id'], $result[1]->getId());
        self::assertNull($result[1]->getDefaultPaymentInstrument());
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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse());

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->customers();

        $result = $service->getLeadSource('dummy');
        self::assertInstanceOf(Entities\LeadSource::class, $result);

        $result = $service->updateLeadSource('dummy', []);
        self::assertInstanceOf(Entities\LeadSource::class, $result);

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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'lead-sources/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->customers();

        self::assertNull($service->merge('dummy', 'dummy2'));
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
            ->method('__invoke')
            ->willReturnOnConsecutiveCalls(
                $client->createResponse(),
                $client->createResponse()->withStatus(404),
                $client->createResponse()->withHeader('Location', 'authentication-tokens/token'),
                $client->createResponse()
            );

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->authenticationTokens();

        $result = $service->verify('dummy');
        self::assertTrue($result);

        $result = $service->verify('dummy');
        self::assertFalse($result);

        $result = $service->login(['username' => 'dummy', 'password' => 'qwerty']);
        self::assertInstanceOf(Entities\AuthenticationToken::class, $result);

        $result = $service->exchange('token', ['invalidate' => false, 'expiredTime' => date('c')]);
        self::assertInstanceOf(Entities\Session::class, $result);

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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'invoices/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->invoices();

        $result = $service->void('dummy');
        self::assertInstanceOf(Entities\Invoice::class, $result);

        $result = $service->abandon('dummy');
        self::assertInstanceOf(Entities\Invoice::class, $result);

        $result = $service->issue('dummy', date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
        self::assertInstanceOf(Entities\Invoice::class, $result);

        $result = $service->reissue('dummy', date('Y-m-d H:i:s'));
        self::assertInstanceOf(Entities\Invoice::class, $result);

        $result = $service->recalculate('dummy');
        self::assertInstanceOf(Entities\Invoice::class, $result);
    }

    /**
     * @test
     */
    public function creditMemosService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'credit-memos/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->creditMemos();

        $result = $service->void('dummy');
        self::assertInstanceOf(Entities\CreditMemo::class, $result);
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
            ->method('__invoke')
            ->willReturnOnConsecutiveCalls(
                $client->createResponse(),
                $client->createResponse(),
                $client->createResponse()->withHeader('Location', 'invoices/invoiceId/items/dummy'),
                $client->createResponse()->withHeader('Location', 'invoices/invoiceId/items/dummy')
            );

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->invoiceItems();

        $paginator = $service->paginator('invoiceId');
        self::assertInstanceOf(Paginator::class, $paginator);

        $result = $service->search('invoiceId');
        self::assertInstanceOf(Rest\Collection::class, $result);

        $result = $service->load('invoiceId', 'dummy');
        self::assertInstanceOf(Entities\InvoiceItem::class, $result);

        $result = $service->create([], 'invoiceId');
        self::assertInstanceOf(Entities\InvoiceItem::class, $result);

        $result = $service->create([], 'invoiceId', 'dummy');
        self::assertInstanceOf(Entities\InvoiceItem::class, $result);
    }

    /**
     * @test
     */
    public function creditMemoAllocationsService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);
        $handler
            ->method('__invoke')
            ->willReturnOnConsecutiveCalls(
                $client->createResponse(),
                $client->createResponse(),
                $client->createResponse()->withHeader('Location', 'invoices/invoiceId/credit-memo-allocations/dummy'),
                $client->createResponse()->withHeader('Location', 'invoices/invoiceId/credit-memo-allocations/dummy'),
                $client->createResponse()->withStatus(204)
            );

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->creditMemoAllocations();
        self::assertInstanceOf(Services\CreditMemoAllocationService::class, $service);

        $paginator = $service->paginator('invoiceId');
        self::assertInstanceOf(Paginator::class, $paginator);

        $result = $service->search('invoiceId');
        self::assertInstanceOf(Rest\Collection::class, $result);

        $result = $service->load('invoiceId', 'dummy');
        self::assertInstanceOf(Entities\CreditMemoAllocation::class, $result);

        $result = $service->update('invoiceId', 'dummy', []);
        self::assertInstanceOf(Entities\CreditMemoAllocation::class, $result);

        $service->delete('invoiceId', 'dummy');
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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'subscriptions/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->subscriptions();

        $result = $service->cancel('dummy', []);
        self::assertInstanceOf(Entities\Subscription::class, $result);

        $result = $service->changePlan('dummy', []);
        self::assertInstanceOf(Entities\Subscription::class, $result);

        $result = $service->issueInterimInvoice('dummy', []);
        self::assertInstanceOf(Entities\Subscription::class, $result);

        $result = $service->issueUpcomingInvoice('dummy', 'invoice-1');
        self::assertInstanceOf(Entities\Subscription::class, $result);

        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturnCallback(function ($request) use ($client) {
                self::assertSame(
                    'https://api.rebilly.com/subscriptions/dummy/change-items?expand=upcomingInvoice',
                    (string) $request->getUri()
                );

                return $client->createResponse()->withHeader('Location', 'subscriptions/dummy');
            });

        $result = $service->changeItems('dummy', [], ['expand' => 'upcomingInvoice']);
        self::assertInstanceOf(Entities\Subscription::class, $result);
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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'subscriptions/subscription-1/upcoming-invoices'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->subscriptions();

        $result = $service->getUpcomingInvoices('subscription-1');
        self::assertInstanceOf(Rest\Collection::class, $result);
    }

    /**
     * @test
     */
    public function getUpcomingInvoice()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'subscriptions/subscription-1/upcoming-invoice'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->subscriptions();

        $result = $service->getUpcomingInvoice('subscription-1');
        self::assertInstanceOf(Entities\Invoice::class, $result);
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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse());

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->subscriptionCancellations();

        $result = $service->update('dummy', []);
        self::assertInstanceOf(Entities\SubscriptionCancellation::class, $result);

        $result = $service->load('dummy', []);
        self::assertInstanceOf(Entities\SubscriptionCancellation::class, $result);
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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'coupons/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->coupons();

        $result = $service->expiration('dummy');
        self::assertInstanceOf(Entities\Coupons\Coupon::class, $result);
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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'transactions/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->transactions();

        $result = $service->refund('dummy', 10);
        self::assertInstanceOf(Entities\Transaction::class, $result);

        $result = $service->refund('dummy', 10, 'refund', true);
        self::assertInstanceOf(Entities\Transaction::class, $result);

        $result = $service->patch('dummy', []);
        self::assertInstanceOf(Entities\Transaction::class, $result);
    }

    /**
     * @test
     */
    public function payoutService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'transactions/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->payouts();

        $result = $service->create([]);
        self::assertInstanceOf(Entities\Transaction::class, $result);
    }

    /**
     * @test
     */
    public function paymentInstrumentService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'payment-instruments/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->paymentInstruments();

        $paymentInstrument = new JsonObject(['customerId' => self::uuid(), 'method' => 'payment-card']);

        $result = $service->createFromToken('token', $paymentInstrument);
        self::assertInstanceOf(Entities\CommonPaymentInstrument::class, $result);

        $result = $service->createFromToken('token', ['customerId' => self::uuid()]);
        self::assertInstanceOf(Entities\CommonPaymentInstrument::class, $result);

        $result = $service->createFromToken(['token' => 'dummy'], $paymentInstrument);
        self::assertInstanceOf(Entities\CommonPaymentInstrument::class, $result);

        $result = $service->deactivate('dummy');
        self::assertInstanceOf(Entities\CommonPaymentInstrument::class, $result);
    }

    /**
     * @test
     */
    public function paymentCardService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'payment-cards/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->paymentCards();

        $card = new JsonObject(['customerId' => self::uuid()]);

        $result = $service->createFromToken('token', $card);
        self::assertInstanceOf(Entities\PaymentCard::class, $result);

        $result = $service->createFromToken('token', ['customerId' => self::uuid()], 'dummy');
        self::assertInstanceOf(Entities\PaymentCard::class, $result);

        $result = $service->createFromToken(['token' => 'dummy'], $card);
        self::assertInstanceOf(Entities\PaymentCard::class, $result);

        $result = $service->deactivate('dummy');
        self::assertInstanceOf(Entities\PaymentCard::class, $result);
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
        self::assertInstanceOf(Paginator::class, $paginator);

        $entity = $service->create($resourceType, $this->getFakeValue('id', $entityClass), []);
        self::assertInstanceOf($entityClass, $entity);

        $set = $service->search($resourceType);
        self::assertInstanceOf(Rest\Collection::class, $set);

        $entity = $service->load($resourceType, $this->getFakeValue('id', $entityClass));
        self::assertInstanceOf($entityClass, $entity);

        $entity = $service->update($resourceType, $this->getFakeValue('id', $entityClass), []);
        self::assertInstanceOf($entityClass, $entity);
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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'users/userId'));
        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->users();
        $result = $service->load('userId');
        self::assertInstanceOf(Entities\User::class, $result);

        $handler = $this->createMock(CurlHandler::class);
        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'users/signup'));
        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->users();
        $result = $service->signup([]);
        self::assertInstanceOf(Entities\User::class, $result);

        $handler = $this->createMock(CurlHandler::class);
        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'users/signin'));
        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->users();
        $result = $service->signin([]);
        self::assertInstanceOf(Entities\User::class, $result);

        $handler = $this->createMock(CurlHandler::class);
        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'users/userId'));
        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->users();
        $result = $service->updatePassword('userId', []);
        self::assertInstanceOf(Entities\User::class, $result);

        $service->forgotPassword([]);

        $result = $service->resetPassword('token', []);
        self::assertInstanceOf(Entities\User::class, $result);

        $result = $service->resetTotp('userId');
        self::assertInstanceOf(Entities\User::class, $result);

        $result = $service->activate('token');
        self::assertInstanceOf(Entities\User::class, $result);
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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'coupons-redemptions/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->couponsRedemptions();

        $result = $service->redeem([]);
        self::assertInstanceOf(Entities\Coupons\Redemption::class, $result);

        $result = $service->cancel('dummy');
        self::assertInstanceOf(Entities\Coupons\Redemption::class, $result);
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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'bank-accounts/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->bankAccounts();

        $result = $service->deactivate('dummy');
        self::assertInstanceOf(Entities\BankAccount::class, $result);
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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'paypal-accounts/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->payPalAccounts();

        $result = $service->deactivate('dummy');
        self::assertInstanceOf(Entities\PayPalAccount::class, $result);
    }

    /**
     * @test
     */
    public function paymentTokenService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'tokens/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->paymentTokens();

        $result = $service->expire('dummy');
        self::assertInstanceOf(Entities\PaymentToken::class, $result);
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
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withHeader('Location', 'lists/dummy'));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->lists();

        $result = $service->loadVersion('dummy', 1);
        self::assertInstanceOf(Entities\ValuesList::class, $result);
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

        $handler->expects(self::any())->method('__invoke')->willReturn($response);

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

        $handler->expects(self::any())->method('__invoke')->willReturn($response);

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->webhooksTracking();

        self::assertNull($service->resend('dummy'));
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

        $handler->expects(self::any())->method('__invoke')->willReturn($response);

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
                        (string) $uri->withPath(rtrim($uri->getPath(), '/') . '/dummy')
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
                        (string) $uri->withPath(rtrim($uri->getPath(), '/') . '/dummy')
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
                        (string) $uri->withPath(rtrim($uri->getPath(), '/') . '/dummy')
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
     * @test
     */
    public function tagService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn($client->createResponse()->withStatus(204));

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->tags();

        self::assertNull($service->tagCustomer('dummy', 'customer-1'));
        self::assertNull($service->untagCustomer('dummy', 'customer-1'));
        self::assertNull($service->tagCustomers('dummy', ['customer-1']));
    }

    /**
     * @test
     */
    public function cashierStrategyService()
    {

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);

        $service = $client->cashierStrategies();

        $strategies = [
            [
                'id' => 'foo',
                'name' => 'bar',
                'filter' => '',
                'amounts' => [
                    'calculator' => 'percent',
                    'baseAmount' => 10,
                    'increments' => [10.5, 15, 25],
                    'adjustBaseToLastDeposit' => false,
                ],
                'customAmount' => [
                    'minimum' => 1,
                    'maximum' => 9,
                    'multipleOf' => 2
                ],
            ],
            [
                'id' => 'foo-2',
                'name' => 'bar-2',
                'filter' => 'currency:USD',
                'amounts' => [
                    'calculator' => 'absolute',
                    'baseAmount' => 10.5,
                    'increments' => [11, 15, 25.3],
                    'adjustBaseToLastDeposit' => true,
                ],
                'customAmount' => [
                    'minimum' => 1,
                    'maximum' => 9,
                    'multipleOf' => 2
                ],
            ],
        ];

        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn(
                $client
                    ->createResponse()
                    ->withBody(Utils::streamFor(json_encode($strategies)))
            );

        $result = $service->search();

        self::assertCount(2, $result);
        self::assertInstanceOf(Rest\Collection::class, $result);

        self::assertInstanceOf(CashierStrategy::class, $result[0]);
        self::assertSame($strategies[0]['id'], $result[0]->getId());
        self::assertInstanceOf(CashierStrategyAmounts::class, $result[0]->getAmounts());
        self::assertInstanceOf(CashierCustomAmount::class, $result[0]->getCustomAmount());

        self::assertInstanceOf(CashierStrategy::class, $result[1]);
        self::assertSame($strategies[1]['id'], $result[1]->getId());
        self::assertInstanceOf(CashierStrategyAmounts::class, $result[1]->getAmounts());
        self::assertInstanceOf(CashierCustomAmount::class, $result[1]->getCustomAmount());
    }

    /**
     * @test
     */
    public function cashierRequestsService()
    {
        $client = new Client(['apiKey' => 'QWERTY']);

        /** @var CurlHandler|MockObject $handler */
        $handler = $this->createMock(CurlHandler::class);

        $body = [
            [
                'id' => 'cr-1',
                'websiteId' => 'website-1',
                'customerId' => 'customer-1',
                'currency' => 'USD',
                'status' => 'created',
                'amounts' => [1, 3.5, 10],
                'customAmount' => [
                    'minimum' => 1,
                    'maximum' => 9,
                    'multipleOf' => 2
                ],
            ],
            [
                'id' => 'cr-2',
                'websiteId' => 'website-1',
                'customerId' => 'customer-2',
                'currency' => 'EUR',
                'status' => 'expired',
                'amounts' => [2,3,4],
                'customAmount' => null,
            ],
        ];

        $handler
            ->expects(self::any())
            ->method('__invoke')
            ->willReturn(
                $client->createResponse()
                    ->withBody(Utils::streamFor(json_encode($body)))
            );

        $client = new Client([
            'apiKey' => 'QWERTY',
            'httpHandler' => $handler,
        ]);
        $service = $client->cashierRequests();

        $result = $service->search();
        self::assertCount(2, $result);

        self::assertInstanceOf(CashierRequest::class, $result[0]);
        self::assertSame($body[0]['id'], $result[0]->getId());
        self::assertSame($body[0]['amounts'], $result[0]->getAmounts());
        self::assertInstanceOf(CashierCustomAmount::class, $result[0]->getCustomAmount());

        self::assertInstanceOf(CashierRequest::class, $result[1]);
        self::assertSame($body[1]['id'], $result[1]->getId());
        self::assertSame($body[1]['amounts'], $result[1]->getAmounts());
        self::assertNull($result[1]->getCustomAmount());
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
                'creditMemoAllocations',
                Services\CreditMemoAllocationService::class,
                Entities\CreditMemoAllocation::class,
            ],
            [
                'creditMemos',
                Services\CreditMemoService::class,
                Entities\CreditMemo::class,
            ],
            [
                'paymentCards',
                Services\PaymentCardService::class,
                Entities\PaymentCard::class,
            ],
            [
                'paymentTokens',
                Services\PaymentTokenService::class,
                Entities\PaymentToken::class,
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
                'apiKeys',
                Services\ApiKeyService::class,
                Entities\ApiKey::class,
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
                'shippingRates',
                Services\ShippingRateService::class,
                Entities\ShippingRate::class,
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
                'plaidCredentials',
                Services\PlaidCredentialsService::class,
                Entities\PlaidCredential::class,
            ],
            [
                'experianCredentials',
                Services\ExperianCredentialsService::class,
                Entities\ExperianCredential::class,
            ],
            [
                'taxjarCredentials',
                Services\TaxJarCredentialsService::class,
                Entities\TaxJarCredential::class,
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
                'paymentInstruments',
                Services\PaymentInstrumentService::class,
                Entities\CommonPaymentInstrument::class,
            ],
            [
                'tags',
                Services\TagService::class,
                Entities\Tag::class,
            ],
            [
                'kycDocuments',
                Services\KycService::class,
                Entities\KycDocuments\KycDocument::class,
            ],
            [
                'eventRules',
                Services\RuleService::class,
                Entities\RulesEngine\EventRules::class,
            ],
            [
                'cashierRequests',
                Services\CashierRequestService::class,
                Entities\Cashier\CashierRequest::class,
            ],
            [
                'cashierStrategies',
                Services\CashierStrategyService::class,
                Entities\Cashier\CashierStrategy::class,
            ],
        ];
    }
}
