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
     * @param string $token
     */
    public function __construct(string $token)
    {
        parent::__construct(['token' => $token]);
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->getAttribute('token');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setToken(string $value): self
    {
        return $this->setAttribute('token', $value);
    }
}
