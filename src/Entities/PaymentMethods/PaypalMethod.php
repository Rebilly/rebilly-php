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
 * Class PaypalMethod
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class PaypalMethod extends PaymentMethod
{
    /**
     * {@inheritdoc}
     */
    public function name()
    {
        return Payment::METHOD_PAYPAL;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPaypalKey($value)
    {
        return $this->setAttribute('paypal', $value);
    }

    /**
     * @return string
     */
    public function getPaypalKey()
    {
        return $this->getAttribute('paypal');
    }
}
