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

namespace Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes;

use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstruction;

/**
 * Class DateIntervalType
 */
class DateIntervalType extends ScheduleInstruction
{
    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->getAttribute('duration');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setDuration($value)
    {
        return $this->setAttribute('duration', $value);
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->getAttribute('unit');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setUnit($value)
    {
        return $this->setAttribute('unit', $value);
    }

    /**
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return ScheduleInstruction::DATE_INTERVAL;
    }
}
