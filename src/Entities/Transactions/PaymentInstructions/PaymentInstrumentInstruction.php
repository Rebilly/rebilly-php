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
 * Class PaymentInstrumentInstruction.
 */
final class PaymentInstrumentInstruction extends PaymentInstruction
{
    /**
     * @param string $paymentInstrumentId
     */
    public function __construct(string $paymentInstrumentId)
    {
        parent::__construct(['paymentInstrumentId' => $paymentInstrumentId]);
    }

    /**
     * @return string
     */
    public function getPaymentInstrumentId(): string
    {
        return $this->getAttribute('paymentInstrumentId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPaymentInstrumentId(string $value): self
    {
        return $this->setAttribute('paymentInstrumentId', $value);
    }
}
