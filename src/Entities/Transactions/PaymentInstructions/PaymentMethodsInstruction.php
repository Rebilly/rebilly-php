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

    public function __construct(array $data = [])
    {
        if (!isset($data['methods'])) {
            throw new InvalidArgumentException(self::MSG_REQUIRED_METHODS);
        }

        parent::__construct(['methods' => $data['methods']]);
    }

    /**
     * @return array
     */
    public function getMethods()
    {
        return $this->getAttribute('methods');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setMethods($value): self
    {
        return $this->setAttribute('methods', $value);
    }
}
