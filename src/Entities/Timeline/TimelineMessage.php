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

namespace Rebilly\Entities\Timeline;

use Rebilly\Rest\Entity;

abstract class TimelineMessage extends Entity
{
    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setType($value)
    {
        $this->setAttribute('type', $value);

        return $this;
    }

    /**
     * @return string
     */
    public function getTriggeredBy()
    {
        return $this->getAttribute('triggeredBy');
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->getAttribute('message');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMessage($value)
    {
        $this->setAttribute('message', $value);

        return $this;
    }

    /**
     * @return ExtraData
     */
    public function getExtraData()
    {
        return $this->getAttribute('extraData');
    }

    /**
     * @return string
     */
    public function getOccurredTime()
    {
        return $this->getAttribute('occurredTime');
    }

    /**
     * @param array $data
     *
     * @return ExtraData
     */
    public function createExtraData(array $data)
    {
        return new ExtraData($data);
    }
}
