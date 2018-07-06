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

use Rebilly\Rest\Resource;

/**
 * Class SubscriptionReactivation
 */
class SubscriptionReactivation extends Resource
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
