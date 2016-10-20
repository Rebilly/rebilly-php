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
