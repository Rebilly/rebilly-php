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
 * Class GatewayAccountLimit.
 */
final class GatewayAccountLimit extends Entity
{
    public const DAILY_MONEY_LIMIT_IDENTIFIER = 'daily-money';

    public const DAILY_COUNT_LIMIT_IDENTIFIER = 'daily-count';

    public const MONTHLY_MONEY_LIMIT_IDENTIFIER = 'monthly-money';

    public const MONTHLY_COUNT_LIMIT_IDENTIFIER = 'monthly-count';

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @return string
     */
    public function getFrequency()
    {
        return $this->getAttribute('frequency');
    }

    /**
     * @return int
     */
    public function getCap()
    {
        return $this->getAttribute('cap');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setCap($value)
    {
        return $this->setAttribute('cap', $value);
    }

    /**
     * @return int
     */
    public function getUsage()
    {
        return $this->getAttribute('usage');
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
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
