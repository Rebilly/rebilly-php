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

namespace Rebilly\Tests;

use Faker\Factory as FakerFactory;
use Faker\Generator as Faker;
use InvalidArgumentException;
use PHPUnit\Framework;
use Rebilly\Entities;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstruction;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstruction;

/**
 * Class TestCase.
 *
 */
abstract class TestCase extends Framework\TestCase
{
    /** @var Faker */
    private $faker;

    /**
     * @return Faker
     */
    final protected function getFaker()
    {
        if ($this->faker === null) {
            $this->faker = $this->createFaker();
        }

        return $this->faker;
    }

    /**
     * @return Faker
     */
    protected function createFaker()
    {
        return FakerFactory::create();
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $annotations = $this->getAnnotations();

        if (isset($annotations['class']['todo'])) {
            $this->markTestSkipped('Pending test case...');
        } elseif (isset($annotations['method']['todo'])) {
            $this->markTestSkipped('Pending test...');
        }
    }

    /**
     * @param string $attribute
     * @param string $class
     *
     * @return mixed
     */
    protected function getFakeValue($attribute, $class)
    {
        $faker = $this->getFaker();

        $faker->phoneNumber;
        $redirectUrl = 'https://redirect.com';
        $uriParh = 'pathsegment';

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
            case 'requestId':
            case 'stickyGatewayAccountId':
                return $faker->uuid;
            case 'dueTime':
            case 'expiredTime':
            case 'expirationTime':
            case 'periodStartTime':
            case 'renewalTime':
            case 'periodEndTime':
            case 'downtimeStart':
            case 'downtimeEnd':
            case 'postedTime':
            case 'deadlineTime':
            case 'issuedTime':
            case 'effectiveTime':
            case 'startTime':
            case 'endTime':
            case 'churnTime':
            case 'autopayScheduledTime':
            case 'processedTime':
                return $faker->date('Y-m-d H:i:s');
            case 'unitPrice':
            case 'unitPriceAmount':
            case 'amount':
                return $faker->randomFloat(2);
            case 'uriPath':
            case 'urlPathSegment':
                return $uriParh;
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
            case 'request':
            case 'response':
            case 'acquirerReferenceNumber':
            case 'bic':
                return $faker->word;
            case 'redirectUrl':
                return $redirectUrl;
            case 'notificationUrl':
                return $faker->url;
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
            case 'bodyText':
            case 'bodyHtml':
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
                    'gateway-account-requested',
                    'subscription-trial-ended',
                    'subscription-activated',
                    'subscription-canceled',
                    'subscription-reactivated',
                    'subscription-renewed',
                    'transaction-processed',
                    'payment-card-expired',
                    'payment-declined',
                    'invoice-modified',
                    'invoice-created',
                    'dispute-created',
                    'suspended-payment-completed',
                ], 3);
            case 'headers':
                return [['name' => $faker->word, 'value' => $faker->word, 'status' => $faker->randomElement(['active', 'inactive'])]];
            case 'hash':
            case 'credentialHash':
                return $faker->uuid;
            case 'auth':
                return $faker->randomElement([
                    [
                        'type' => 'none',
                    ],
                    [
                        'type' => 'basic',
                        'username' => $faker->userName,
                        'password' => $faker->password,
                    ],
                ]);
            case 'isActive':
            case 'allowCustomCustomerId':
            case 'isCustomCustomerIdAllowed':
            case 'reconciliationWindowEnabled':
                return true;
            case 'archived':
            case 'starred':
            case 'attachInvoice':
            case 'invalidate':
            case 'isProcessedOutside':
                return $faker->boolean();
            case 'credentialTtl':
            case 'authTokenTtl':
            case 'resetTokenTtl':
            case 'quantity':
            case 'minQuantity':
            case 'maxQuantity':
            case 'monthlyLimit':
            case 'redirectTimeout':
                return 5;
            case 'velocity':
            case 'revision':
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
                // no break
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
            case 'redirect':
                return ['url' => $redirectUrl, 'timeout' => 5];
            case 'mode':
                switch ($class) {
                    case Entities\AuthenticationToken::class:
                        return $faker->randomElement(Entities\AuthenticationToken::modes());
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
            case 'type':
            case 'datetimeFormat':
                switch ($class) {
                    case Entities\LineItem::class:
                        return $faker->randomElement(Entities\LineItem::types());
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
                    case Entities\Transaction::class:
                        return $faker->randomElement(Entities\Transaction::types());
                    case Entities\Session::class:
                        return $faker->word;
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
                // no break
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
                // no break
            case 'policy':
                switch ($class) {
                    case Entities\SubscriptionCancel::class:
                        return $faker->randomElement(Entities\SubscriptionCancel::policies());
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
                // no break
            case 'items':
                switch ($class) {
                    case Entities\Layout::class:
                        return [
                            new Entities\LayoutItem(
                                [
                                    'planId' => 'foo',
                                    'starred' => true,
                                ]
                            ),
                            new Entities\LayoutItem(
                                [
                                    'planId' => 'bar',
                                ]
                            ),
                        ];
                    case Entities\Subscription::class:
                        return [
                            ['planId' => 'plan-1', 'quantity' => 1],
                            ['planId' => 'plan-2', 'quantity' => null],
                            ['planId' => 'plan-3'],
                        ];
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
                // no break
            case 'passwordPattern':
                return '/\w\d{6,}/';
            case 'currency':
            case 'unitPriceCurrency':
                return 'USD';
            case 'payment':
                return []; // TODO
            case 'relatedType':
                switch ($class) {
                    case Entities\Attachment::class:
                        return $faker->randomElement(Entities\Attachment::allowedTypes());
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
                // no break
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
                // no break
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
                        ],
                    ],
                    'phoneNumbers' => [
                        [
                            'label' => $faker->word,
                            'primary' => $faker->boolean(),
                            'value' => $faker->phoneNumber,
                        ],
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
                // no break
            case 'customFields':
            case 'gatewayConfig':
            case 'additionalSchema':
                return [];
            case 'acceptedCurrencies':
                return ['USD'];
            case 'dynamicDescriptor':
            case 'threeDSecure':
            case 'used':
                return false;
            case 'paymentCardSchemes':
            case 'paymentMethods':
                return ['Visa'];
            case 'merchantCategoryCode':
                return 5966;
            case 'accountType':
                return 'checking';
            case 'accountNumberType':
                return 'BBAN';
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
                    case Entities\Transaction::class:
                        return new Entities\PaymentInstruments\PaymentCardInstrument([
                            'method' => Entities\PaymentMethod::METHOD_PAYMENT_CARD,
                        ]);
                    default:
                        return new Entities\PaymentInstruments\PaymentCardPaymentInstrument();
                }
                // no break
            case 'defaultPaymentInstrument':
                return [
                    'method' => Entities\PaymentMethod::METHOD_PAYMENT_CARD,
                ];
            case 'retryInstruction':
                switch ($class) {
                    case Entities\Invoice::class:
                        return new Entities\InvoiceRetryInstructions\RetryInstruction(
                            [
                                'afterAttemptPolicies' => [Entities\InvoiceRetryInstructions\RetryInstruction::AFTER_ATTEMPT_POLICY_CHANGE_SUBSCRIPTION_RENEWAL_TIME],
                                'afterRetryEndPolicies' => [Entities\InvoiceRetryInstructions\RetryInstruction::AFTER_RETRY_END_POLICY_ABANDON_INVOICE],
                                'attempts' => [
                                    [
                                        'scheduleInstruction' => ['method' => ScheduleInstruction::IMMEDIATELY],
                                    ],
                                ],
                            ]
                        );
                    default:
                        return new Entities\PaymentRetryInstruction();
                }
                // no break
            case 'reasonCode':
                return '1000';
            case 'status':
                switch ($class) {
                    case Entities\SubscriptionCancellation::class:
                        return $faker->randomElement(Entities\SubscriptionCancellation::statuses());
                    case Entities\ApiTracking::class:
                        return 200;
                    case Entities\Dispute::class:
                        return $faker->randomElement(Entities\Dispute::allowedStatuses());
                    case Entities\PaymentCard::class:
                        return 'active';
                    case Entities\CheckoutPage::class:
                        return 'active';
                    default:
                        return $faker->randomElement(Entities\Dispute::allowedStatuses());
                }
                // no break
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
                    ],
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
            case 'reason':
                return $faker->randomElement(Entities\SubscriptionCancellation::reasons());
            case 'canceledBy':
                return $faker->randomElement(Entities\SubscriptionCancellation::canceledBySources());
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
                    'subscription-created',
                    'subscription-activated',
                    'subscription-canceled',
                    'subscription-reactivated',
                    'subscription-renewed',
                    'payment-card-expired',
                ]);
            case 'scheduleInstruction':
                return ScheduleInstruction::createFromData([
                    'method' => 'auto',
                ]);
            case 'paymentInstruction':
                return PaymentInstruction::createFromData([
                    'method' => 'none',
                ]);
            case 'lineItems':
                return [
                    [
                        'type' => $faker->randomElement([
                            Entities\LineItem::TYPE_DEBIT,
                            Entities\LineItem::TYPE_CREDIT,
                        ]),
                        'description' => $faker->sentence,
                        'unitPriceAmount' => $faker->randomFloat(),
                        'unitPriceCurrency' => 'USD',
                    ],
                ];
            case 'leadSource':
                return new Entities\LeadSource([
                    'source' => 'Rebilly',
                ]);
            case 'pricing':
                return new Entities\Subscriptions\Pricing\FixedFee(['price' => 1.0]);
            case 'recurringInterval':
                return new Entities\Subscriptions\RecurringInterval(['unit' => 'day', 'length' => 1, 'limit' => 10]);
            case 'trial':
                switch ($class) {
                    case Entities\Subscription::class:
                        return new Entities\Subscriptions\SubscriptionTrial(['enabled' => false]);
                    case Entities\Plan::class:
                        return new Entities\Subscriptions\PlanTrial(['price' => 1.0, 'period' => ['unit' => 'day', 'length' => 1]]);
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
                // no break
            case 'setup':
                return new Entities\Subscriptions\PlanSetup(['price' => 1.0]);
            case 'file':
                return base64_encode('Plain-text file');
            case 'options':
                return [
                    'color',
                    'size',
                ];
            case 'unitLabel':
                return 'unit';
            case 'orderType':
                return 'subscription-order';
            case 'additionalCriteria':
                return [
                    'op' => 'equals',
                    'path' => '/transaction/websiteId',
                    'value' => 'website-1',
                ];
            case 'invoiceTimeShift':
                return new Entities\Subscriptions\InvoiceTimeShift();
            case 'reconciliationWindowTtl':
                return $this->faker->numberBetween(30, 36000);
            case 'digitalWallets':
                return Entities\DigitalWallets\DigitalWallets::createFromData([
                    'applePay' => [
                        'isEnabled' => true,
                    ],
                    'googlePay' => [
                        'isEnabled' => true,
                        'merchantName' => 'test-merchant',
                        'merchantOrigin' => 'www.example.com',
                    ],
                ]);
            default:
                throw new InvalidArgumentException(
                    sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                );
        }
    }
}
