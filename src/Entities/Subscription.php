<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use Rebilly\Rest\Entity;

/**
 * Class Subscription.
 */
final class Subscription extends Entity
{
    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
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
     * @return RiskMetadata
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
}
