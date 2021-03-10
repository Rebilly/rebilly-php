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

namespace Rebilly\Entities;

use DomainException;
use Rebilly\Entities\Subscriptions\InvoiceTimeShift;
use Rebilly\Entities\Subscriptions\RecurringInterval;
use Rebilly\Entities\Subscriptions\SubscriptionTrial;
use Rebilly\Rest\Entity;

/**
 * Class Subscription.
 */
final class Subscription extends Entity
{
    public const TYPE_SUBSCRIPTION_ORDER = 'subscription-order';

    public const TYPE_ONE_TIME_ORDER = 'one-time-order';

    public const MSG_UNEXPECTED_TYPE = 'Unexpected order type. Only %s types are supported';

    /**
     * @return array
     */
    public static function orderTypes()
    {
        return [
            self::TYPE_SUBSCRIPTION_ORDER,
            self::TYPE_ONE_TIME_ORDER,
        ];
    }

    /**
     * @return string
     */
    public function getOrderType()
    {
        return $this->getAttribute('orderType');
    }

    /**
     * @param string $value
     *
     * @throws DomainException
     * @return Subscription
     */
    public function setOrderType($value)
    {
        if (!in_array($value, self::orderTypes(), true)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_TYPE, implode(', ', self::orderTypes())));
        }

        return $this->setAttribute('orderType', $value);
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setStatus($value)
    {
        return $this->setAttribute('status', $value);
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @param string $value
     *
     * @return Subscription
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
    }

    /**
     * @return string
     */
    public function getInitialInvoiceId()
    {
        return $this->getAttribute('initialInvoiceId');
    }

    /**
     * @return string
     */
    public function getRecentInvoiceId()
    {
        return $this->getAttribute('recentInvoiceId');
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('websiteId');
    }

    /**
     * @param string $value
     *
     * @return Subscription
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('websiteId', $value);
    }

    /**
     * @return string
     */
    public function getStartTime()
    {
        return $this->getAttribute('startTime');
    }

    /**
     * @return string
     */
    public function getEndTime()
    {
        return $this->getAttribute('endTime');
    }

    /**
     * @return string
     */
    public function getCanceledTime()
    {
        return $this->getAttribute('canceledTime');
    }

    /**
     * @return string
     */
    public function getRenewalTime()
    {
        return $this->getAttribute('renewalTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRenewalTime($value)
    {
        return $this->setAttribute('renewalTime', $value);
    }

    /**
     * @return string
     */
    public function getActivationTime()
    {
        return $this->getAttribute('activationTime');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return array
     */
    public function getCustomFields()
    {
        return $this->getAttribute('customFields');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setCustomFields($value)
    {
        return $this->setAttribute('customFields', $value);
    }

    /**
     * @return bool
     */
    public function getAutopay()
    {
        return $this->getAttribute('autopay');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setAutopay($value)
    {
        return $this->setAttribute('autopay', $value);
    }

    /**
     * @return bool
     */
    public function getInTrial()
    {
        return $this->getAttribute('inTrial');
    }

    /**
     * @return SubscriptionTrial
     */
    public function getTrial()
    {
        return $this->getAttribute('trial');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setTrial($value)
    {
        return $this->setAttribute('trial', $value);
    }

    /**
     * @param array $data
     *
     * @return SubscriptionTrial
     */
    public function createTrial(array $data)
    {
        return new SubscriptionTrial($data);
    }

    /**
     * @return int
     */
    public function getRebillNumber()
    {
        return $this->getAttribute('rebillNumber');
    }

    /**
     * @return string
     */
    public function getCancelCategory()
    {
        return $this->getAttribute('cancelCategory');
    }

    /**
     * @return string
     */
    public function getCanceledBy()
    {
        return $this->getAttribute('canceledBy');
    }

    /**
     * @return string
     */
    public function getCancelDescription()
    {
        return $this->getAttribute('cancelDescription');
    }

    /**
     * @return Address
     */
    public function getBillingAddress()
    {
        return $this->getAttribute('billingAddress');
    }

    /**
     * @param Address|array $value
     *
     * @return $this
     */
    public function setBillingAddress($value)
    {
        return $this->setAttribute('billingAddress', $value);
    }

    /**
     * @param array $data
     *
     * @return Address
     */
    public function createBillingAddress(array $data)
    {
        return new Address($data);
    }

    /**
     * @return Address
     */
    public function getDeliveryAddress()
    {
        return $this->getAttribute('deliveryAddress');
    }

    /**
     * @param Address|array $value
     *
     * @return $this
     */
    public function setDeliveryAddress($value)
    {
        return $this->setAttribute('deliveryAddress', $value);
    }

    /**
     * @param array $data
     *
     * @return Address
     */
    public function createDeliveryAddress(array $data)
    {
        return new Address($data);
    }

    /**
     * @return RiskMetadata|null
     */
    public function getRiskMetadata()
    {
        return $this->getAttribute('riskMetadata');
    }

    /**
     * @param RiskMetadata|array $value
     *
     * @return $this
     */
    public function setRiskMetadata($value)
    {
        return $this->setAttribute('riskMetadata', $value);
    }

    /**
     * @param array $data
     *
     * @return RiskMetadata
     */
    public function createRiskMetadata(array $data)
    {
        return new RiskMetadata($data);
    }

    /**
     * @return array
     */
    public function getLineItems()
    {
        return $this->getAttribute('lineItems');
    }

    /**
     * @return float
     */
    public function getLineItemSubtotal()
    {
        return $this->getAttribute('lineItemSubtotal');
    }

    /**
     * @return array|Subscriptions\PlanItem[]
     */
    public function getItems()
    {
        return $this->getAttribute('items');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setItems(array $value)
    {
        return $this->setAttribute('items', $value);
    }

    /**
     * @param array $data
     *
     * @return array|Subscriptions\PlanItem[]
     */
    public function createItems(array $data)
    {
        return array_map(
            function (array $item) {
                return new Subscriptions\PlanItem($item);
            },
            $data
        );
    }

    /**
     * @return InvoiceTimeShift
     */
    public function getInvoiceTimeShift()
    {
        return $this->getAttribute('invoiceTimeShift');
    }

    /**
     * @param array|InvoiceTimeShift $value
     *
     * @return $this
     */
    public function setInvoiceTimeShift($value)
    {
        return $this->setAttribute('invoiceTimeShift', $value);
    }

    /**
     * @param array $data
     *
     * @return InvoiceTimeShift
     */
    public function createInvoiceTimeShift(array $data)
    {
        return new InvoiceTimeShift($data);
    }

    /**
     * @return RecurringInterval
     */
    public function getRecurringInterval()
    {
        return $this->getAttribute('recurringInterval');
    }

    /**
     * @param array|RecurringInterval $value
     *
     * @return $this
     */
    public function setRecurringInterval($value)
    {
        return $this->setAttribute('recurringInterval', $value);
    }

    /**
     * @return string
     */
    public function getBillingStatus()
    {
        return $this->getAttribute('billingStatus');
    }

    /**
     * @param array $data
     *
     * @return RecurringInterval
     */
    public function createRecurringInterval(array $data)
    {
        return new RecurringInterval($data);
    }

    /**
     * @return null|Website
     */
    public function getWebsite()
    {
        $data = $this->getEmbeddedResource('website');

        return $data
            ? new Website($data)
            : null;
    }

    /**
     * @return null|Customer
     */
    public function getCustomer()
    {
        $data = $this->getEmbeddedResource('customer');

        return $data
            ? new Customer($data)
            : null;
    }

    /**
     * @return null|LeadSource
     */
    public function getLeadSource()
    {
        $data = $this->getEmbeddedResource('leadSource');

        return $data
            ? new LeadSource($data)
            : null;
    }

    /**
     * @return null|Invoice
     */
    public function getRecentInvoice()
    {
        $data = $this->getEmbeddedResource('recentInvoice');

        return $data
            ? new Invoice($data)
            : null;
    }

    /**
     * @return string
     */
    public function getRevision()
    {
        return $this->getAttribute('revision');
    }
}
