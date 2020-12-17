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
 * Class PaymentTokenInstruction.
 */
final class PaymentTokenInstruction extends PaymentInstruction
{
    public const MSG_REQUIRED_TOKEN = 'Token is required';

    public function __construct(array $data = [])
    {
        if (!isset($data['token'])) {
            throw new InvalidArgumentException(self::MSG_REQUIRED_TOKEN);
        }

        parent::__construct(['token' => $data['token']]);
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->getAttribute('token');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setToken($value): self
    {
        return $this->setAttribute('token', $value);
    }
}
