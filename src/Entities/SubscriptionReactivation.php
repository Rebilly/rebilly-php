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

use Rebilly\Rest\Entity;

/**
 * Class SubscriptionReactivation.
 */
class SubscriptionReactivation extends Entity
{
    /**
     * @return string
     */
    public function getSubscriptionId()
    {
        return $this->getAttribute('subscriptionId');
    }

    /**
     * @param string $value
     *
     * @return SubscriptionReactivation
     */
    public function setSubscriptionId($value)
    {
        return $this->setAttribute('subscriptionId', $value);
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
     * @return SubscriptionReactivation
     */
    public function setRenewalTime($value)
    {
        return $this->setAttribute('renewalTime', $value);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @param string $value
     *
     * @return SubscriptionReactivation
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return string
     */
    public function getCancellationId()
    {
        return $this->getAttribute('cancellationId');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
