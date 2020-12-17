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

    private const ATTRIBUTE_NAME = 'token';

    public function __construct(array $data = [])
    {
        if (!isset($data[self::ATTRIBUTE_NAME])) {
            throw new InvalidArgumentException(self::MSG_REQUIRED_TOKEN);
        }

        parent::__construct([self::ATTRIBUTE_NAME => $data[self::ATTRIBUTE_NAME]]);
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->getAttribute(self::ATTRIBUTE_NAME);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setToken($value): self
    {
        return $this->setAttribute(self::ATTRIBUTE_NAME, $value);
    }
}
