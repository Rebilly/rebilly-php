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

namespace Rebilly\Entities\Subscriptions;

use Rebilly\Rest\Resource;

final class SubscriptionTrial extends Resource
{
    public function getEnabled()
    {
        return $this->getAttribute('enabled');
    }

    public function setEnabled($value)
    {
        return $this->setAttribute('enabled', $value);
    }

    public function getEndTime()
    {
        return $this->getAttribute('endTIme');
    }

    public function setEndTime($value)
    {
        return $this->setAttribute('endTime', $value);
    }
}
