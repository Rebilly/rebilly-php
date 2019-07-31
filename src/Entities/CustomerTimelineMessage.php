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

use Rebilly\Entities\Timeline\TimelineMessage;

final class CustomerTimelineMessage extends TimelineMessage
{
    /**
     * @return string
     */
    public function getCustomEventType()
    {
        return $this->getAttribute('customEventType');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCustomEventType($value)
    {
        $this->setAttribute('customEventType', $value);

        return $this;
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setCustomData($value)
    {
        $this->setAttribute('customData', $value);

        return $this;
    }
}
