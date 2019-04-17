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
 * Class DiscountType
 */
class DiscountType extends PaymentInstruction
{
    public const TYPE_PERCENT = 'percent';

    public const TYPE_FIXED = 'fixed';

    /**
     * @return string[]|array
     */
    public static function types(): array
    {
        return [
            self::TYPE_PERCENT,
            self::TYPE_FIXED,
        ];
    }

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
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return PaymentInstruction::DISCOUNT;
    }
}
