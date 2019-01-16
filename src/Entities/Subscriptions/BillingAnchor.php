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

final class BillingAnchor extends Resource
{
    public function getChronology()
    {
        return $this->getAttribute('chronology');
    }

    public function setChronology($value)
    {
        return $this->setAttribute('chronology', $value);
    }

    /**
     * @return ScheduleInstruction
     */
    public function getBillingAnchorInstruction()
    {
        return $this->getAttribute('billingAnchorInstruction');
    }

    public function setBillingAnchorInstruction($value)
    {
        return $this->setAttribute('billingAnchorInstruction', $value);
    }

    public function createBillingAnchorInstruction(array $data)
    {
        return ScheduleInstruction::createFromData($data);
    }
}
