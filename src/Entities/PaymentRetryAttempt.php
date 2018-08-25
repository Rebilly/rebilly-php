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

use Rebilly\Entities\PaymentRetryInstructions\PaymentInstruction;
use Rebilly\Entities\PaymentRetryInstructions\ScheduleInstruction;
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
        return ScheduleInstruction::createFromData($data);
    }

    /**
     * @param PaymentInstruction
     *
     * @return $this
     */
    public function setPaymentInstruction(PaymentInstruction $value)
    {
        return $this->setAttribute('paymentInstruction', $value->jsonSerialize());
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
