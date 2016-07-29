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

use Rebilly\Rest\Resource;

/**
 * Class PaymentMethod
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
abstract class PaymentMethod extends Resource
{
    const METHOD_PAYMENT_CARD = 'payment-card';
    const METHOD_PAYPAL = 'paypal';
    const METHOD_ACH = 'ach';
    const METHOD_CASH = 'cash';
    const METHOD_CHECK = 'check';
    const METHOD_WIRE = 'wire';
    const METHOD_CHINA_UNIONPAY = 'china-unionpay';

    /**
     * Return the method name
     *
     * @return string
     */
    abstract public function name();
}
