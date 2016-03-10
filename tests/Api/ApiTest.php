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
use Rebilly\Client;
use Rebilly\Entities;
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
            $values[$attribute] = $this->getFakeValue($attribute, $class);
            $resource->$method($values[$attribute]);
        }

        foreach ($getters as $attribute => $method) {
            if (isset($values[$attribute])) {
                $this->assertEquals($values[$attribute], $resource->$method(), 'Invalid ' . $attribute);
            } else {
                $this->assertNull($resource->$method());
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

        $result = $service->switchTo('dummy', []);
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
        $resourceType = Entities\CustomField::RESOURCE_TYPE_CUSTOMERS;

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
     * @return array
     */
    public function provideEntityClasses()
    {
        return [
            [Entities\AuthenticationOptions::class, null],
            [Entities\AuthenticationToken::class, 'token'],
            [Entities\Blacklist::class],
            [Entities\Contact::class],
            [Entities\Customer::class],
            [Entities\CustomerCredential::class],
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
            [Entities\SubscriptionSwitch::class, null],
            [Entities\SubscriptionCancel::class, null],
            [Entities\Transaction::class],
            [Entities\Website::class],
            [Entities\Note::class],
            [Entities\Organization::class],
            [Entities\GatewayAccount::class],
            [Entities\BankAccount::class],
            [Entities\CustomField::class, 'name'],
            [Entities\Session::class],
            [Entities\User::class],
            [Entities\ThreeDSecure::class],
        ];
    }


    /**
     * @return array
     */
    public function provideServiceClasses()
    {
        return [
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
                'emailCredentials',
                Services\EmailCredentialService::class,
                Entities\EmailCredential::class,
            ],
            [
                'subscriptionLogs',
                Services\SubscriptionLogService::class,
                Entities\SubscriptionLog::class,
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
            case 'relatedId':
                return $faker->uuid;
            case 'dueTime':
            case 'expiredTime':
            case 'expireTime': // TODO inconsistent name
            case 'periodStartTime':
            case 'renewalTime':
            case 'periodEndTime':
            case 'downtimeStart':
            case 'downtimeEnd':
                return $faker->date('Y-m-d H:i:s');
            case 'unitPrice':
            case 'amount':
            case 'recurringAmount':
            case 'trialAmount':
            case 'setupAmount':
                return $faker->randomFloat(2);
            case 'checkoutPageUri':
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
                return $faker->word;
            case 'organization':
                return $faker->company;
            case 'servicePhone':
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
                return $faker->md5;
            case 'name':
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
                return $faker->words;
            case 'description':
            case 'richDescription':
                return $faker->sentences;
            case 'pan':
                return $faker->creditCardNumber;
            case 'cvv':
                return $faker->numberBetween(100, 999);
            case 'expYear':
                return $faker->year;
            case 'expMonth':
                return $faker->month;
            case 'webHookUrl':
            case 'host':
                return $faker->url;
            case 'webHookUsername':
                return $faker->userName;
            case 'webHookPassword':
                return $faker->md5;
            case 'isActive':
            case 'archived':
            case 'starred':
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
            case 'address':
            case 'city':
            case 'country':
            case 'phoneNumber':
                return $faker->$attribute;
            case 'type':
                switch ($class) {
                    case Entities\Blacklist::class:
                        return $faker->randomElement(Entities\Blacklist::types());
                    case Entities\InvoiceItem::class:
                        return $faker->randomElement(Entities\InvoiceItem::types());
                    case Entities\CustomField::class:
                        return $faker->randomElement(Entities\CustomField::allowedTypes());
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
            case 'value':
                switch ($class) {
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
                    case Entities\SubscriptionSwitch::class:
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
                return $faker->randomElement(
                    [Entities\Note::RELATED_TYPE_CUSTOMER, Entities\Note::RELATED_TYPE_WEBSITE]
                );
            case 'method':
                return new Entities\PaymentMethods\PaymentCardMethod(); // TODO
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
            case 'threeDSecureType':
                return 'integrated';
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
                return $faker->randomNumber(25, 100);
            case 'authenticationMethod':
                return $faker->randomElement(Entities\EmailCredential::allowedAuthenticationMethods());
            case 'encryptionMethod':
                return $faker->randomElement(Entities\EmailCredential::allowedEncryptionMethods());
            case 'autopay':
                return $faker->boolean();
            default:
                throw new InvalidArgumentException(
                    sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                );
        }
    }
}
