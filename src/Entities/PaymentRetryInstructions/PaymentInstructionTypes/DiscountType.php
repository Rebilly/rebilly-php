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

use DomainException;
use Rebilly\Entities\PaymentRetryInstructions\PaymentInstruction;

/**
 * Class DiscountType
 */
class DiscountType extends PaymentInstruction
{
    public const UNEXPECTED_TYPE = 'Unexpected type. Only %s types are supported';

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
     * @return string
     */
    public function getType(): string
    {
        return $this->getAttribute('type');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setType($value): self
    {
        if (!in_array($value, static::types(), true)) {
            throw new DomainException(sprintf(self::UNEXPECTED_TYPE, implode(', ', static::types())));
        }

        return $this->setAttribute('type', $value);
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->getAttribute('value');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setValue($value): self
    {
        return $this->setAttribute('value', $value);
    }

    /**
     * {@inheritdoc}
     */
    protected function methodName(): string
    {
        return PaymentInstruction::DISCOUNT;
    }
}
