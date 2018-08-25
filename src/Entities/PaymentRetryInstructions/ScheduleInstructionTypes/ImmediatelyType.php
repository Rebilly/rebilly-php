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
 * Class ImmediatelyType
 */
class ImmediatelyType extends ScheduleInstruction
{
    /**
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return ScheduleInstruction::IMMEDIATELY;
    }
}
