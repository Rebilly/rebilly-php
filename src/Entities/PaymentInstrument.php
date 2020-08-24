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

namespace Rebilly\Entities;

use InvalidArgumentException;
use Rebilly\Entities\PaymentInstruments\BankAccountPaymentInstrument;
use Rebilly\Entities\PaymentInstruments\PaymentCardPaymentInstrument;
use Rebilly\Rest\Resource;

abstract class PaymentInstrument extends Resource
{
    private const ERROR_UNSUPPORTED_METHOD = 'Unexpected method';

    private const ERROR_REQUIRED_METHOD = 'Method is required';

    public function __construct(array $data = [])
    {
        parent::__construct(['method' => $this->name()] + $data);
    }

    public static function createFromData(array $data)
    {
        if (!isset($data['method'])) {
            throw new InvalidArgumentException(self::ERROR_REQUIRED_METHOD);
        }

        switch ($data['method']) {
            case PaymentMethod::METHOD_ACH:
                return new BankAccountPaymentInstrument($data);
            case PaymentMethod::METHOD_PAYMENT_CARD:
                return new PaymentCardPaymentInstrument($data);
            default:
                throw new InvalidArgumentException(self::ERROR_UNSUPPORTED_METHOD);
        }
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
    }

    /**
     * Return the method name
     *
     * @return string
     */
    abstract public function name();
}
