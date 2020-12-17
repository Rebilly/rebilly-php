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

use Rebilly\Entities\Transactions\PaymentInstruction;

/**
 * Class PaymentMethodsInstruction.
 */
final class PaymentMethodsInstruction extends PaymentInstruction
{
    /**
     * @param array $methods
     */
    public function __construct(array $methods)
    {
        parent::__construct(['methods' => $methods]);
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
    public function setMethods(array $value): self
    {
        return $this->setAttribute('methods', $value);
    }
}
