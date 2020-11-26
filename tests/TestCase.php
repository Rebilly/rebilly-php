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

use InvalidArgumentException;
use PHPUnit\Framework;
use Rebilly\Entities;
use Rebilly\Entities\PaymentInstruments\KhelocardCardPaymentInstrument;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstruction;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstruction;

/**
 * Class TestCase.
 *
 */
abstract class TestCase extends Framework\TestCase
{
    protected const TEST_PAN = '4111111111111111';

    protected const TEST_EMAIL = 'mail@example.com';

    protected const TEST_PHONE = '+123456789';

    protected const TEST_URL = 'https://example.com/home';

    protected const TEST_FIRST_NAME = 'John';

    protected const TEST_LAST_NAME = 'Doe';

    protected const TEST_COMPANY = 'MoneyPrint Inc.';

    protected const TEST_STREET = '1st Avenue';

    protected const TEST_CITY = 'New York';

    protected const TEST_COUNTRY_CODE = 'US';

    protected const TEST_POST_CODE = '12345';

    protected const TEST_SENTENCE = 'Lorem ipsum dolor sit amet.';

    protected const TEST_PARAGRAPH = 'Nullam sagittis mauris augue, ac imperdiet arcu aliquam mollis. Donec a metus porta, varius lacus vel, tincidunt quam. Proin sed rhoncus enim, id porta nibh.';

    protected const TEST_WORD = 'Lorem';

    protected const TEST_IPV4 = '127.0.0.1';

    protected const DATE_FORMAT = 'Y-m-d H:i:s';

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
            case 'couponId':
            case 'productId':
            case 'requestId':
            case 'stickyGatewayAccountId':
            case 'hash':
            case 'credentialHash':
            case 'clientId':
            case 'secretToken':
                return self::uuid();
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
            case 'deactivationTime':
                return date(self::DATE_FORMAT);
            case 'unitPrice':
            case 'unitPriceAmount':
            case 'amount':
                return random_int(1, 9999) / 100;
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
            case 'hmacKey':
            case 'publicKey':
            case 'username':
                return self::TEST_WORD;
            case 'redirectUrl':
            case 'notificationUrl':
            case 'url':
            case 'host':
                return self::TEST_URL;
            case 'organization':
            case 'company':
                return self::TEST_COMPANY;
            case 'servicePhone':
            case 'phoneNumber':
            case 'businessPhone':
                return self::TEST_PHONE;
            case 'serviceEmail':
            case 'senderEmail':
            case 'email':
                return self::TEST_EMAIL;
            case 'city':
            case 'region':
                return self::TEST_CITY;
            case 'address':
            case 'address2':
                return self::TEST_STREET;
            case 'postalCode':
                return self::TEST_POST_CODE;
            case 'ipAddress':
                return self::TEST_IPV4;
            case 'token':
            case 'fingerprint':
            case 'secretKey':
                return md5($attribute);
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
                return self::TEST_SENTENCE;
            case 'description':
            case 'richDescription':
            case 'cancelDescription':
            case 'notes':
                return self::TEST_PARAGRAPH;
            case 'pan':
                return self::TEST_PAN;
            case 'cvv':
                return random_int(100, 999);
            case 'expYear':
                return (int) date('Y');
            case 'expMonth':
                return random_int(1, 12);
            case 'userName':
            case 'firstName':
            case 'apiUser':
                return self::TEST_FIRST_NAME;
            case 'lastName':
                return self::TEST_LAST_NAME;
            case 'country':
                return self::TEST_COUNTRY_CODE;
            case 'eventsFilter':
                return self::randomElements([
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
                return [['name' => self::TEST_WORD, 'value' => self::TEST_WORD, 'status' => self::randomElements(['active', 'inactive'])[0]]];
            case 'auth':
                return self::randomElements([
                    [
                        'type' => 'none',
                    ],
                    [
                        'type' => 'basic',
                        'username' => self::TEST_FIRST_NAME,
                        'password' => self::TEST_LAST_NAME,
                    ],
                ])[0];
            case 'isActive':
            case 'allowCustomCustomerId':
            case 'isCustomCustomerIdAllowed':
            case 'reconciliationWindowEnabled':
            case 'archived':
            case 'starred':
            case 'attachInvoice':
            case 'invalidate':
            case 'isProcessedOutside':
            case 'primary':
            case 'isDefault':
            case 'preview':
            case 'prorated':
            case 'autopay':
            case 'useStripe':
            case 'keepTrial':
            case 'requiresShipping':
                return true;
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
                return random_int(1, 10);
            case 'phoneNumbers':
                return [
                    new Entities\Contact\PhoneNumber([
                        'label' => self::TEST_WORD,
                        'primary' => true,
                        'value' => self::TEST_PHONE,
                    ]),
                ];
            case 'emails':
                return [
                    new Entities\Contact\Email([
                        'label' => self::TEST_WORD,
                        'primary' => true,
                        'value' => self::TEST_EMAIL,
                    ]),
                ];
            case 'extension':
                return self::randomElements(Entities\File::allowedTypes())[0];
            case 'tags':
                return [self::TEST_WORD];
            case 'redirect':
                return ['url' => self::TEST_URL, 'timeout' => 5];
            case 'mode':
                switch ($class) {
                    case Entities\AuthenticationToken::class:
                        return self::randomElements(Entities\AuthenticationToken::modes())[0];
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
                // no break
            case 'type':
            case 'datetimeFormat':
                switch ($class) {
                    case Entities\LineItem::class:
                        return self::randomElements(Entities\LineItem::types())[0];
                    case Entities\Blacklist::class:
                        return self::randomElements(Entities\Blacklist::types())[0];
                    case Entities\Blocklist::class:
                        return self::randomElements(Entities\Blocklist::types())[0];
                    case Entities\InvoiceItem::class:
                        return self::randomElements(Entities\InvoiceItem::types())[0];
                    case Entities\CustomField::class:
                        return self::randomElements(Entities\CustomField::allowedTypes())[0];
                    case Entities\ApiKey::class:
                        return self::randomElements(Entities\ApiKey::datetimeFormats())[0];
                    case Entities\Dispute::class:
                        return self::randomElements(Entities\Dispute::allowedTypes())[0];
                    case Entities\Transaction::class:
                        return self::randomElements(Entities\Transaction::types())[0];
                    case Entities\Session::class:
                        return self::TEST_WORD;
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
                        return self::TEST_WORD;
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
                // no break
            case 'policy':
                switch ($class) {
                    case Entities\SubscriptionCancel::class:
                        return self::randomElements(Entities\SubscriptionCancel::policies())[0];
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
            case 'relatedType':
                switch ($class) {
                    case Entities\Attachment::class:
                        return self::randomElements(Entities\Attachment::allowedTypes())[0];
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
                        return self::TEST_WORD;
                    default:
                        throw new InvalidArgumentException(
                            sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                        );
                }
                // no break
            case 'primaryAddress':
            case 'billingAddress':
            case 'deliveryAddress':
                return [
                    'firstName' => self::TEST_FIRST_NAME,
                    'lastName' => self::TEST_LAST_NAME,
                    'city' => self::TEST_CITY,
                    'region' => self::TEST_WORD,
                    'postalCode' => self::TEST_POST_CODE,
                    'organization' => self::TEST_COMPANY,
                    'country' => self::TEST_COUNTRY_CODE,
                    'address' => self::TEST_STREET,
                    'address2' => self::TEST_STREET,
                    'emails' => [
                        [
                            'label' => self::TEST_WORD,
                            'primary' => true,
                            'value' => self::TEST_EMAIL,
                        ],
                    ],
                    'phoneNumbers' => [
                        [
                            'label' => self::TEST_WORD,
                            'primary' => true,
                            'value' => self::TEST_PHONE,
                        ],
                    ],
                ];
            case 'method':
            case 'defaultPaymentMethod':
                switch ($class) {
                    case Entities\ApiTracking::class:
                        return 'GET';
                    case Entities\GatewayAccount::class:
                        return Entities\PaymentMethod::METHOD_PAYMENT_CARD;
                    case Entities\Customer::class:
                    default:
                        return new Entities\PaymentMethods\PaymentCardMethod(); // TODO
                }
                // no break
            case 'customFields':
            case 'gatewayConfig':
            case 'additionalSchema':
            case 'permissions':
            case 'invoiceIds':
            case 'payment': // TODO
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
            case 'enrolled':
            case 'payerAuthResponseStatus':
            case 'signatureVerification':
                return 'Y';
            case 'port':
                return random_int(25, 100);
            case 'duration':
                return random_int(1, 100);
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
                        return self::randomElements(Entities\SubscriptionCancellation::statuses())[0];
                    case Entities\ApiTracking::class:
                        return 200;
                    case Entities\PaymentCard::class:
                        return 'active';
                    case Entities\Dispute::class:
                    default:
                        return self::randomElements(Entities\Dispute::allowedStatuses())[0];
                }
                // no break
            case 'paymentCardIds':
                return [self::uuid()];
            case 'discount':
                return [
                    'type' => 'fixed',
                    'amount' => random_int(1, 100),
                    'currency' => 'USD',
                ];
            case 'taxCategoryId':
                return self::randomElements(Entities\Product::allowedTaxCategories())[0];
            case 'accountingCode':
            case 'poNumber':
                return (string) random_int(1000, 10000);
            case 'restrictions':
            case 'additionalRestrictions':
                return [
                    [
                        'type' => 'restrict-to-invoices',
                        'invoiceIds' => ['foo', 'bar'],
                    ],
                    [
                        'type' => 'discounts-per-redemption',
                        'quantity' => random_int(1, 100),
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
                    self::TEST_WORD,
                    random_int(1, 100),
                ];
            case 'cancelCategory':
                return self::randomElements(Entities\SubscriptionCancel::cancelCategories())[0];
            case 'reason':
                return self::randomElements(Entities\SubscriptionCancellation::reasons())[0];
            case 'canceledBy':
                return self::randomElements(Entities\SubscriptionCancellation::canceledBySources())[0];
            case 'riskMetadata':
                return new Entities\RiskMetadata([
                    'ipAddress' => self::TEST_IPV4,
                ]);
            case 'httpHeaders':
                return [
                    'User-Agent' => 'Mozilla/5.0',
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                ];
            case 'renewalPolicy':
                return self::randomElements(Entities\SubscriptionChangePlan::renewalPolicies())[0];
            case 'notifications':
                return [
                    [
                        'email' => self::TEST_EMAIL,
                        'active' => 'active',
                    ],
                ];
            case 'eventType':
                return self::randomElements([
                    'subscription-created',
                    'subscription-activated',
                    'subscription-canceled',
                    'subscription-reactivated',
                    'subscription-renewed',
                    'payment-card-expired',
                ])[0];
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
                        'type' => self::randomElements([
                            Entities\LineItem::TYPE_DEBIT,
                            Entities\LineItem::TYPE_CREDIT,
                        ])[0],
                        'description' => self::TEST_SENTENCE,
                        'unitPriceAmount' => random_int(1, 9999) / 100,
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
            case 'additionalFilters':
                return 'websiteId:website-1';
            case 'reconciliationWindowTtl':
                return random_int(30, 36000);
            case 'browserData':
                return Entities\BrowserData::createFromData([
                    'colorDepth' => self::randomElements([1, 4, 8, 15, 16, 24, 32, 48])[0],
                    'javaEnabled' => true,
                    'language' => 'en-US',
                    'screenHeight' => random_int(0, 999999),
                    'screenWidth' => random_int(0, 999999),
                    'timeZoneOffset' => random_int(-1410, 1410),
                ]);
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
            case 'number':
                if ($class === KhelocardCardPaymentInstrument::class) {
                    return self::TEST_PAN;
                }
                // no break
            default:
                throw new InvalidArgumentException(
                    sprintf('Cannot generate fake value for "%s :: %s"', $class, $attribute)
                );
        }
    }

    protected static function uuid(): string
    {
        $data = random_bytes(16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    protected static function randomElements(array $values, $limit = 1): array
    {
        shuffle($values);
        if ($limit > 0) {
            $values = array_splice($values, 0, $limit);
        }

        return $values;
    }
}
