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
 * Class DayOfWeekType
 */
class DayOfWeekType extends ScheduleInstruction
{
    /**
     * @return string
     */
    public function getDay()
    {
        return $this->getAttribute('day');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDay($value)
    {
        return $this->setAttribute('day', $value);
    }

    /**
     * @return string
     */
    public function getWeek()
    {
        return $this->getAttribute('week');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWeek($value)
    {
        return $this->setAttribute('week', $value);
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->getAttribute('time');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setTime($value)
    {
        return $this->setAttribute('time', $value);
    }

    /**
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return ScheduleInstruction::DAY_OF_WEEK;
    }
}
