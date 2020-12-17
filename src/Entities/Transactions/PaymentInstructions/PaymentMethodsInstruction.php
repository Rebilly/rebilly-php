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

namespace Rebilly\Entities\Transactions\PaymentInstructions;

use InvalidArgumentException;
use Rebilly\Entities\Transactions\PaymentInstruction;

/**
 * Class PaymentMethodsInstruction.
 */
final class PaymentMethodsInstruction extends PaymentInstruction
{
    public const MSG_REQUIRED_METHODS = 'Methods is required';

    private const ATTRIBUTE_NAME = 'methods';

    public function __construct(array $data = [])
    {
        if (!isset($data[self::ATTRIBUTE_NAME])) {
            throw new InvalidArgumentException(self::MSG_REQUIRED_METHODS);
        }

        parent::__construct([self::ATTRIBUTE_NAME => $data[self::ATTRIBUTE_NAME]]);
    }

    /**
     * @return array
     */
    public function getMethods()
    {
        return $this->getAttribute(self::ATTRIBUTE_NAME);
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setMethods($value): self
    {
        return $this->setAttribute(self::ATTRIBUTE_NAME, $value);
    }
}
