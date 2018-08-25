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
 * Class GatewayAccountDowntime
 *
 */
final class GatewayAccountDowntime extends Entity
{
    /**
     * @param string $value
     *
     * @return $this
     */
    public function setGatewayAccountId($value)
    {
        return $this->setAttribute('gatewayAccountId', $value);
    }

    /**
     * @return string
     */
    public function getGatewayAccountId()
    {
        return $this->getAttribute('gatewayAccountId');
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
    public function setStartTime($value)
    {
        return $this->setAttribute('startTime', $value);
    }

    /**
     * @return string
     */
    public function getStartTime()
    {
        return $this->getAttribute('startTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setEndTime($value)
    {
        return $this->setAttribute('endTime', $value);
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
    public function getReason()
    {
        return $this->getAttribute('reason');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
