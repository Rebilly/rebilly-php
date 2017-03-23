<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\PaymentRetryInstructions\ScheduleInstructionTypes;

use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstruction;

/**
 * Class DayOfMonthType
 */
class DayOfMonthType extends ScheduleInstruction
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
