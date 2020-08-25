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

use Rebilly\Rest\Resource;

/**
 * Class PaymentMethod.
 */
abstract class PaymentMethod extends Resource
{
    public const METHOD_PAYMENT_CARD = 'payment-card';

    public const METHOD_PAYPAL = 'paypal';

    public const METHOD_ACH = 'ach';

    public const METHOD_CASH = 'cash';

    public const METHOD_CHECK = 'check';

    public const METHOD_WIRE = 'wire';

    public const METHOD_CHINA_UNIONPAY = 'china-unionpay';

    public const METHOD_IDEAL = 'iDEAL';

    public const METHOD_KLARNA = 'Klarna';

    public const METHOD_INTERAC = 'Interac';

    public const METHOD_ONLINEUEBERWEISEN = 'Onlineueberweisen';

    public const METHOD_KHELOCARD = 'Khelocard';

    /**
     * Return the method name
     *
     * @return string
     */
    abstract public function name();
}
