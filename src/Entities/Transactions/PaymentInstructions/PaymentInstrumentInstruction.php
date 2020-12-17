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
 * Class PaymentInstrumentInstruction.
 */
final class PaymentInstrumentInstruction extends PaymentInstruction
{
    public const MSG_REQUIRED_ID = 'Payment instrument ID is required';

    public function __construct(array $data = [])
    {
        if (!isset($data['paymentInstrumentId'])) {
            throw new InvalidArgumentException(self::MSG_REQUIRED_ID);
        }

        parent::__construct(['paymentInstrumentId' => $data['paymentInstrumentId']]);
    }

    /**
     * @return string
     */
    public function getPaymentInstrumentId()
    {
        return $this->getAttribute('paymentInstrumentId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPaymentInstrumentId($value): self
    {
        return $this->setAttribute('paymentInstrumentId', $value);
    }
}
