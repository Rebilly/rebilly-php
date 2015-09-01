<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\PaymentMethods;

use Rebilly\Entities\Payment;
use Rebilly\Entities\PaymentMethod;

/**
 * Class PaymentCardMethod
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class PaymentCardMethod extends PaymentMethod
{
    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return Payment::METHOD_PAYMENT_CARD;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPaymentCardId($value)
    {
        return $this->setAttribute('paymentCardId', $value);
    }

    /**
     * @return string
     */
    public function getPaymentCardId()
    {
        return $this->getAttribute('paymentCardId');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setGatewayAccountId($value)
    {
        return $this->setAttribute('gatewayAccountId', $value);
    }

    /**
     * @return string
     */
    public function getGatewayAccountId()
    {
        return $this->getAttribute('gatewayAccountId');
    }

    /**
     * @param int $value
     * @return $this
     */
    public function setGatewayTimeout($value)
    {
        return $this->setAttribute('gatewayTimeout', (int) $value);
    }

    /**
     * @return int
     */
    public function getGatewayTimeout()
    {
        return $this->getAttribute('gatewayTimeout');
    }
}
