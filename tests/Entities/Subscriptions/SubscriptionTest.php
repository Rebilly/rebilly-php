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
use Rebilly\Entities\Invoice;
use Rebilly\Entities\LeadSource;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstruction;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes\DateIntervalType;
use Rebilly\Entities\Subscription;
use Rebilly\Entities\Subscriptions\InvoiceTimeShift;
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
            'recentInvoiceId' => 'invoice-2',
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
            'invoiceTimeShift' => [
                'issueTimeShift' => [
                    'method' => ScheduleInstruction::DATE_INTERVAL,
                    'chronology' => 'before',
                    'duration' => 7,
                    'unit' => 'days',
                ],
                'dueTimeShift' => [
                    'method' => ScheduleInstruction::DATE_INTERVAL,
                    'duration' => 5,
                    'unit' => 'minutes',
                ],
            ],
            '_embedded' => [
                'website' => ['id' => 'website-1'],
                'customer' => ['id' => 'customer-1'],
                'leadSource' => ['id' => 'leadSource-1'],
                'upcomingInvoice' => ['id' => 'invoice-1'],
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

        $invoiceTimeShift = new InvoiceTimeShift();
        $instruction = new DateIntervalType();
        $instruction->setChronology($data['invoiceTimeShift']['issueTimeShift']['chronology']);
        $instruction->setDuration($data['invoiceTimeShift']['issueTimeShift']['duration']);
        $instruction->setUnit($data['invoiceTimeShift']['issueTimeShift']['unit']);
        $invoiceTimeShift->setIssueTimeShift($instruction);
        $dueTimeShift = new DateIntervalType();
        $dueTimeShift->setDuration($data['invoiceTimeShift']['dueTimeShift']['duration']);
        $dueTimeShift->setUnit($data['invoiceTimeShift']['dueTimeShift']['unit']);
        $invoiceTimeShift->setDueTimeShift($dueTimeShift);

        $value->setInvoiceTimeShift($invoiceTimeShift);

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
            $expectedJson['recentInvoiceId'],
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
        self::assertSame($data['recentInvoiceId'], $value->getRecentInvoiceId());
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
        self::assertSame($data['riskMetadata'], $value->getRiskMetadata()->jsonSerialize());
        self::assertSame($data['lineItems'], $value->getLineItems());
        self::assertSame($data['lineItemSubtotal'], $value->getLineItemSubtotal());
        self::assertIsArray($value->getItems());
        self::assertCount(3, $value->getItems());

        foreach ($value->getItems() as $i => $item) {
            self::assertInstanceOf(PlanItem::class, $item);
            self::assertSame($data['items'][$i], $item->jsonSerialize());
        }

        // Check relationship
        self::assertInstanceOf(Website::class, $value->getWebsite());
        self::assertInstanceOf(Customer::class, $value->getCustomer());
        self::assertInstanceOf(LeadSource::class, $value->getLeadSource());
        self::assertInstanceOf(Invoice::class, $value->getUpcomingInvoice());

        $invoiceTimeShift = $value->getInvoiceTimeShift();
        self::assertInstanceOf(InvoiceTimeShift::class, $invoiceTimeShift);
        self::assertSame(
            $data['invoiceTimeShift']['issueTimeShift']['chronology'],
            $invoiceTimeShift->getIssueTimeShift()->getChronology()
        );
        $instructionData = $data['invoiceTimeShift']['issueTimeShift'];
        $instruction = $invoiceTimeShift->getIssueTimeShift();
        self::assertInstanceOf(DateIntervalType::class, $instruction);
        self::assertSame($instructionData['chronology'], $instruction->getChronology());
        self::assertSame($instructionData['duration'], $instruction->getDuration());
        self::assertSame($instructionData['unit'], $instruction->getUnit());
        self::assertTrue($invoiceTimeShift->hasDueTimeShift());
        $dueTimeShiftData = $data['invoiceTimeShift']['dueTimeShift'];
        $dueTimeShift = $invoiceTimeShift->getDueTimeShift();
        self::assertInstanceOf(DateIntervalType::class, $dueTimeShift);
        self::assertSame($dueTimeShiftData['duration'], $dueTimeShift->getDuration());
        self::assertSame($dueTimeShiftData['unit'], $dueTimeShift->getUnit());
    }
}
