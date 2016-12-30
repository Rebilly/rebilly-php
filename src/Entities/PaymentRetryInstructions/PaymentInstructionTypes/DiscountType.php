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
 * Class DiscountType
 */
class DiscountType extends PaymentInstruction
{
    /**
     * @return float
     */
    public function getValue()
    {
        return $this->getAttribute('value');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        return $this->setAttribute('value', $value);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setType($value)
    {
        return $this->setAttribute('type', $value);
    }

    /**
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return PaymentInstruction::DISCOUNT;
    }
}
