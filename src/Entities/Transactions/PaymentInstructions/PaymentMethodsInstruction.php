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
     * @return array
     */
    public function getMethods()
    {
        return $this->getAttribute($this->getAttributeName());
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setMethods($value): self
    {
        return $this->setAttribute($this->getAttributeName(), $value);
    }

    protected function getAttributeName()
    {
        return 'methods';
    }
}
