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

namespace Rebilly\Entities\InvoiceRetryInstructions;

use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstruction;
use Rebilly\Rest\Resource;

final class RetryInstructionAttempt extends Resource
{
    /**
     * @param ScheduleInstruction $value
     *
     * @return $this
     */
    public function setScheduleInstruction($value)
    {
        return $this->setAttribute('scheduleInstruction', $value->jsonSerialize());
    }

    /**
     * @return ScheduleInstruction
     */
    public function getScheduleInstruction()
    {
        return $this->getAttribute('scheduleInstruction');
    }

    /**
     * @param array $data
     *
     * @return ScheduleInstruction
     */
    public function createScheduleInstruction(array $data)
    {
        return RetryScheduleInstruction::createFromData($data);
    }
}
