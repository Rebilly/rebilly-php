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
use Rebilly\Rest\Resource;

/**
 * Class SubscriptionPause.
 */
class SubscriptionPause extends Resource
{
    public const UNEXPECTED_PAUSE_SOURCE = 'Unexpected pause source. Only %s pause sources are supported';

    public const SOURCE_MERCHANT = 'merchant';

    public const SOURCE_CUSTOMER = 'customer';

    /**
     * @return array
     */
    public static function pausedBySources()
    {
        return [
            self::SOURCE_MERCHANT,
            self::SOURCE_CUSTOMER,
        ];
    }

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
    public function getSubscriptionId()
    {
        return $this->getAttribute('subscriptionId');
    }

    /**
     * @param string $value
     *
     * @return SubscriptionPause
     */
    public function setSubscriptionId($value)
    {
        return $this->setAttribute('subscriptionId', $value);
    }

    /**
     * @return string
     */
    public function getPausedBy()
    {
        return $this->getAttribute('pausedBy');
    }

    /**
     * @param string $value
     *
     * @throws DomainException
     *
     * @return SubscriptionPause
     */
    public function setPausedBy($value)
    {
        if (!in_array($value, self::pausedBySources(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_PAUSE_SOURCE, implode(', ', self::pausedBySources())));
        }

        return $this->setAttribute('pausedBy', $value);
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
     * @return SubscriptionPause
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return string
     */
    public function getEffectiveTime()
    {
        return $this->getAttribute('effectiveTime');
    }

    /**
     * @param string $value
     *
     * @return SubscriptionPause
     */
    public function setEffectiveTime($value)
    {
        return $this->setAttribute('effectiveTime', $value);
    }

    /**
     * @return string
     */
    public function getEndTime()
    {
        return $this->getAttribute('endTime');
    }

    /**
     * @param string $value
     *
     * @return SubscriptionPause
     */
    public function setEndTime($value)
    {
        return $this->setAttribute('endTime', $value);
    }

    /**
     * @return string
     */
    public function getTimeRemaining()
    {
        return $this->getAttribute('timeRemaining');
    }

    /**
     * @param string $value
     *
     * @return SubscriptionPause
     */
    public function setTimeRemaining($value)
    {
        return $this->setAttribute('timeRemaining', $value);
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getUpdatedTime()
    {
        return $this->getAttribute('updatedTime');
    }
}
