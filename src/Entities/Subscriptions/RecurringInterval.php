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

use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstruction;
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

    /**
     * @return ScheduleInstruction
     */
    public function getPeriodAnchorInstruction()
    {
        return $this->getAttribute('periodAnchorInstruction');
    }

    public function setPeriodAnchorInstruction($value)
    {
        return $this->setAttribute('periodAnchorInstruction', $value);
    }

    public function createPeriodAnchorInstruction(array $data)
    {
        return ScheduleInstruction::createFromData($data);
    }
}
