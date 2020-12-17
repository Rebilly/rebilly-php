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
 * Class PaymentTokenInstruction.
 */
final class PaymentTokenInstruction extends PaymentInstruction
{
    /**
     * @return string
     */
    public function getToken()
    {
        return $this->getAttribute($this->getAttributeName());
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setToken($value): self
    {
        return $this->setAttribute($this->getAttributeName(), $value);
    }

    protected function getAttributeName()
    {
        return 'token';
    }
}
