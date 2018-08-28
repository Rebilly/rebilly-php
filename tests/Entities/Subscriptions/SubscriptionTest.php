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

namespace Rebilly\Tests\Entities\Subscriptions;

use DateTimeImmutable;
use Rebilly\Entities\Address;
use Rebilly\Entities\Customer;
use Rebilly\Entities\LeadSource;
use Rebilly\Entities\Subscription;
use PHPUnit\Framework\TestCase;
use Rebilly\Entities\Website;

class SubscriptionTest extends TestCase
{
    private static function getDefaultData()
    {
        $now = new DateTimeImmutable();
        $address = [
            'firstName' => 'John',
            'lastName' => 'Doe',
        ];

        return [
            'id' => 'subscription-1',
            'status' => 'draft',
            'customerId' => 'customer-1',
            'websiteId' => 'website-1',
            'initialInvoiceId' => 'invoice-1',
            'autopay' => true,
            'startTime' => $now->modify('+1 day')->format('c'),
            'endTime' => $now->modify('+1 year')->format('c'),
            'renewalTime' => $now->modify('+1 month')->format('c'),
            'createdTime' => $now->format('c'),
            'customFields' => ['foo' => 'bar'],
            'inTrial' => false,
            'rebillNumber' => null,
            'canceledTime' => $now->modify('+1 week')->format('c'),
            'cancelCategory' => null,
            'canceledBy' => 'Jane',
            'cancelDescription' => 'Cancelled manually',
            'billingAddress' => $address,
            'deliveryAddress' => $address,
            'riskMetadata' => [
                'ipAddress' => '127.0.0.1',
            ],
            'lineItems' => [],
            'lineItemSubtotal' => 0,
            '_embedded' => [
                'website' => ['id' => 'website-1'],
                'customer' => ['id' => 'customer-1'],
                'leadSource' => ['id' => 'leadSource-1'],
            ],
        ];
    }

    /**
     * @test
     */
    public function buildObjectUsingSetterToSendToServer()
    {
        $data = self::getDefaultData();

        $value = new Subscription();
        $value->setCustomerId($data['customerId']);
        $value->setWebsiteId($data['websiteId']);
        $value->setInitialInvoiceId($data['initialInvoiceId']);
        $value->setAutopay(true);
        $value->setRenewalTime($data['renewalTime']);
        $value->setCustomFields($data['customFields']);
        $value->setBillingAddress($data['billingAddress']);
        $value->setDeliveryAddress($data['deliveryAddress']);
        $value->setRiskMetadata($data['riskMetadata']);

        $expectedJson = $data;
        // Unset read-only properties which we not set.
        unset(
            $expectedJson['id'],
            $expectedJson['status'],
            $expectedJson['startTime'],
            $expectedJson['endTime'],
            $expectedJson['createdTime'],
            $expectedJson['inTrial'],
            $expectedJson['rebillNumber'],
            $expectedJson['canceledTime'],
            $expectedJson['cancelCategory'],
            $expectedJson['canceledBy'],
            $expectedJson['cancelDescription'],
            $expectedJson['lineItems'],
            $expectedJson['lineItemSubtotal'],
            $expectedJson['_embedded']
        );

        self::assertSame($expectedJson, $value->jsonSerialize());
    }

    /**
     * @test
     */
    public function populatePlanFromArrayReceivedFromServer()
    {
        $data = self::getDefaultData();

        $plan = new Subscription($data);

        // Check properties
        self::assertSame($data['id'], $plan->getId());
        self::assertSame($data['status'], $plan->getStatus());
        self::assertSame($data['customerId'], $plan->getCustomerId());
        self::assertSame($data['websiteId'], $plan->getWebsiteId());
        self::assertSame($data['initialInvoiceId'], $plan->getInitialInvoiceId());
        self::assertSame($data['autopay'], $plan->getAutopay());
        self::assertSame($data['startTime'], $plan->getStartTime());
        self::assertSame($data['endTime'], $plan->getEndTime());
        self::assertSame($data['renewalTime'], $plan->getRenewalTime());
        self::assertSame($data['createdTime'], $plan->getCreatedTime());
        self::assertSame($data['customFields'], $plan->getCustomFields());
        self::assertSame($data['inTrial'], $plan->getInTrial());
        self::assertSame($data['rebillNumber'], $plan->getRebillNumber());
        self::assertSame($data['canceledTime'], $plan->getCanceledTime());
        self::assertSame($data['cancelCategory'], $plan->getCancelCategory());
        self::assertSame($data['canceledBy'], $plan->getCanceledBy());
        self::assertSame($data['cancelDescription'], $plan->getCancelDescription());
        self::assertInstanceOf(Address::class, $plan->getBillingAddress());
        self::assertSame($data['billingAddress'], $plan->getBillingAddress()->jsonSerialize());
        self::assertInstanceOf(Address::class, $plan->getDeliveryAddress());
        self::assertSame($data['deliveryAddress'], $plan->getDeliveryAddress()->jsonSerialize());
        self::assertSame($data['riskMetadata'], $plan->getRiskMetadata());
        self::assertSame($data['lineItems'], $plan->getLineItems());
        self::assertSame($data['lineItemSubtotal'], $plan->getLineItemSubtotal());

        // Check relationship
        self::assertInstanceOf(Website::class, $plan->getWebsite());
        self::assertInstanceOf(Customer::class, $plan->getCustomer());
        self::assertInstanceOf(LeadSource::class, $plan->getLeadSource());
    }
}
