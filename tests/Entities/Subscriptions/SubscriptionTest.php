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
use Rebilly\Entities\Subscriptions\PlanItem;
use Rebilly\Entities\Website;
use Rebilly\Tests\TestCase;

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
            'cancelCategory' => 'did-not-want',
            'canceledBy' => 'customer',
            'cancelDescription' => 'Cancelled manually',
            'billingAddress' => $address,
            'deliveryAddress' => $address,
            'riskMetadata' => [
                'ipAddress' => '127.0.0.1',
            ],
            'lineItems' => [],
            'lineItemSubtotal' => 0,
            'items' => [
                ['planId' => 'plan-1', 'quantity' => 1],
                ['planId' => 'plan-2', 'quantity' => null],
                ['planId' => 'plan-3'],
            ],
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
        $value->setAutopay(true);
        $value->setRenewalTime($data['renewalTime']);
        $value->setCustomFields($data['customFields']);
        $value->setBillingAddress($data['billingAddress']);
        $value->setDeliveryAddress($data['deliveryAddress']);
        $value->setRiskMetadata($data['riskMetadata']);
        $value->setItems($data['items']);

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
            $expectedJson['initialInvoiceId'],
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

        $value = new Subscription($data);

        // Check properties
        self::assertSame($data['id'], $value->getId());
        self::assertSame($data['status'], $value->getStatus());
        self::assertSame($data['customerId'], $value->getCustomerId());
        self::assertSame($data['websiteId'], $value->getWebsiteId());
        self::assertSame($data['initialInvoiceId'], $value->getInitialInvoiceId());
        self::assertSame($data['autopay'], $value->getAutopay());
        self::assertSame($data['startTime'], $value->getStartTime());
        self::assertSame($data['endTime'], $value->getEndTime());
        self::assertSame($data['renewalTime'], $value->getRenewalTime());
        self::assertSame($data['createdTime'], $value->getCreatedTime());
        self::assertSame($data['customFields'], $value->getCustomFields());
        self::assertSame($data['inTrial'], $value->getInTrial());
        self::assertSame($data['rebillNumber'], $value->getRebillNumber());
        self::assertSame($data['canceledTime'], $value->getCanceledTime());
        self::assertSame($data['cancelCategory'], $value->getCancelCategory());
        self::assertSame($data['canceledBy'], $value->getCanceledBy());
        self::assertSame($data['cancelDescription'], $value->getCancelDescription());
        self::assertInstanceOf(Address::class, $value->getBillingAddress());
        self::assertSame($data['billingAddress'], $value->getBillingAddress()->jsonSerialize());
        self::assertInstanceOf(Address::class, $value->getDeliveryAddress());
        self::assertSame($data['deliveryAddress'], $value->getDeliveryAddress()->jsonSerialize());
        self::assertSame($data['riskMetadata'], $value->getRiskMetadata());
        self::assertSame($data['lineItems'], $value->getLineItems());
        self::assertSame($data['lineItemSubtotal'], $value->getLineItemSubtotal());
        self::assertInternalType('array', $value->getItems());
        self::assertCount(3, $value->getItems());

        foreach ($value->getItems() as $i => $item) {
            self::assertInstanceOf(PlanItem::class, $item);
            self::assertSame($data['items'][$i], $item->jsonSerialize());
        }

        // Check relationship
        self::assertInstanceOf(Website::class, $value->getWebsite());
        self::assertInstanceOf(Customer::class, $value->getCustomer());
        self::assertInstanceOf(LeadSource::class, $value->getLeadSource());
    }
}
