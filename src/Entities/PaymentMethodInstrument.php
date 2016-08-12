<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use DomainException;
use Rebilly\Entities\PaymentInstruments\AchInstrument;
use Rebilly\Entities\PaymentInstruments\CashInstrument;
use Rebilly\Entities\PaymentInstruments\PaymentCardInstrument;
use Rebilly\Entities\PaymentInstruments\PayPalInstrument;
use Rebilly\Rest\Resource;

/**
 * Class BaseInstrument
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
abstract class PaymentMethodInstrument extends Resource
{
    const MSG_UNEXPECTED_METHOD = 'Unexpected method. Only %s method support';
    const MSG_UNSUPPORTED_METHOD = 'Unexpected method. Only %s methods support';
    const MSG_REQUIRED_METHOD = 'Method is required';

    const SUPPORT_METHODS = [
        PaymentMethod::METHOD_ACH,
        PaymentMethod::METHOD_CASH,
        PaymentMethod::METHOD_PAYMENT_CARD,
        PaymentMethod::METHOD_PAYPAL,
    ];

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        if (!isset($data['method']) || $data['method'] !== $this->methodName()) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_METHOD, $this->methodName()));
        }

        parent::__construct($data);
    }

    public static function createFromData(array $data)
    {
        if (!isset($data['method'])) {
            throw new DomainException(self::MSG_REQUIRED_METHOD);
        }

        $paymentInstrument = null;
        switch ($data['method']) {
            case PaymentMethod::METHOD_ACH:
                $paymentInstrument = new AchInstrument($data);
                break;
            case PaymentMethod::METHOD_CASH:
                $paymentInstrument = new CashInstrument($data);
                break;
            case PaymentMethod::METHOD_PAYMENT_CARD:
                $paymentInstrument = new PaymentCardInstrument($data);
                break;
            case PaymentMethod::METHOD_PAYPAL:
                $paymentInstrument = new PayPalInstrument($data);
                break;
        }

        if (null === $paymentInstrument) {
            throw new DomainException(sprintf(self::MSG_UNSUPPORTED_METHOD, implode(',', self::MSG_UNSUPPORTED_METHOD)));
        }

        return $paymentInstrument;
    }

    /**
     * @return string
     */
    abstract protected function methodName();
}
