<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstruction;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstruction;
use Rebilly\Rest\Resource;

/**
 * Class PaymentRetryAttempt.
 */
final class PaymentRetryAttempt extends Resource
{
    /**
     * @param ScheduleInstruction
     *
     * @return $this
     */
    public function setScheduleInstruction(ScheduleInstruction $value)
    {
        return $this->setAttribute('scheduleInstruction', $value);
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
        return ScheduleInstruction::createFromData($data);
    }

    /**
     * @param PaymentInstruction
     *
     * @return $this
     */
    public function setPaymentInstruction(PaymentInstruction $value)
    {
        return $this->setAttribute('paymentInstruction', $value);
    }

    /**
     * @return PaymentInstruction
     */
    public function getPaymentInstruction()
    {
        return $this->getAttribute('paymentInstruction');
    }

    /**
     * @param array $data
     *
     * @return PaymentInstruction
     */
    public function createPaymentInstruction(array $data)
    {
        return PaymentInstruction::createFromData($data);
    }
}
