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

final class RecurringInterval extends Resource
{
    public function getUnit()
    {
        return $this->getAttribute('unit');
    }

    public function setUnit($value)
    {
        return $this->setAttribute('unit', $value);
    }

    public function getLength()
    {
        return $this->getAttribute('length');
    }

    public function setLength($value)
    {
        return $this->setAttribute('length', $value);
    }

    public function getLimit()
    {
        return $this->getAttribute('limit');
    }

    public function setLimit($value)
    {
        return $this->setAttribute('limit', $value);
    }
}
