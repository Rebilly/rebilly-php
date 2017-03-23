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
 * Class PaymentMethodInstrument.
 */
abstract class PaymentMethodInstrument extends Resource
{
    const MSG_UNSUPPORTED_METHOD = 'Unexpected method. Only %s methods support';
    const MSG_REQUIRED_METHOD = 'Method is required';

    protected static $supportMethods = [
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
        parent::__construct(['method' => $this->methodName()] + $data);
    }

    /**
     * @param array $data
     *
     * @return PaymentMethodInstrument
     */
    public static function createFromData(array $data)
    {
        if (!isset($data['method'])) {
            throw new DomainException(self::MSG_REQUIRED_METHOD);
        }

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
            default:
                throw new DomainException(
                    sprintf(self::MSG_UNSUPPORTED_METHOD, implode(',', self::$supportMethods))
                );
        }

        return $paymentInstrument;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
    }

    /**
     * @return string
     */
    abstract protected function methodName();
}
