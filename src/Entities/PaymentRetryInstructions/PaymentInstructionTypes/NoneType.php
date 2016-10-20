<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
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
    protected function methodName()
    {
        return PaymentInstruction::NONE;
    }
}
