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

namespace Rebilly\Entities\PaymentRetryInstructions\PaymentInstructionTypes;

use Rebilly\Entities\PaymentRetryInstructions\PaymentInstruction;

/**
 * Class NoneType
 */
class NoneType extends PaymentInstruction
{
    /**
     * {@inheritdoc}
     */
    protected function methodName(): string
    {
        return PaymentInstruction::NONE;
    }
}
