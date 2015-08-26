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
use Rebilly\Rest;
use Rebilly\Services;
use Rebilly\Tests\TestCase;
use Psr\Http\Message\RequestInterface as Request;

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
                $this->assertEquals($values[$attribute], $resource->$method());
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
            [Entities\LeadSource::class],
            [Entities\Payment::class],
            [Entities\PaymentMethods\PaymentCardMethod::class, null],
            [Entities\PaymentMethods\PaypalMethod::class, null],
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
            case 'websiteId':
            case 'initialInvoiceId':
            case 'billingContactId':
            case 'deliveryContactId':
            case 'planId':
            case 'processorAccountId':
            case 'paymentCardId':
            case 'gatewayAccountId':
            case 'defaultCardId':
                return $faker->uuid;
            case 'dueTime':
            case 'expiredTime':
            case 'expireTime': // TODO inconsistent name
            case 'periodStartTime':
            case 'renewalTime':
            case 'periodEndTime':
                return $faker->date('Y-m-d H:i:s');
            case 'unitPrice':
            case 'amount':
            case 'recurringAmount':
            case 'trialAmount':
            case 'setupAmount':
                return $faker->randomFloat(2);
            case 'checkoutPageUri':
                return $faker->word;
            case 'organization':
                return $faker->company;
            case 'servicePhone':
                return $faker->phoneNumber;
            case 'serviceEmail':
                return $faker->email;
            case 'region':
                return $faker->city;
            case 'ipAddress':
                return $faker->ipv4;
            case 'token':
            case 'fingerprint':
            case 'paypalKey':
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
                return $faker->words;
            case 'description':
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
                return $faker->url;
            case 'webHookUsername':
                return $faker->userName;
            case 'webHookPassword':
                return $faker->md5;
            case 'isActive':
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
            case 'method':
                return new Entities\PaymentMethods\PaymentCardMethod(); // TODO
            default:
                throw new InvalidArgumentException(
                    sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                );
        }
    }
}
