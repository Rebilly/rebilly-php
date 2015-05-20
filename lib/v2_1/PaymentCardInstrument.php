<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) Veaceslav Medvedev <slavcopost@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\v2_1;

/**
 * Class PaymentCardInstrument.
 */
final class PaymentCardInstrument
{
    /** @var string */
    public $paymentCard;

    /** @var string */
    public $paymentGateway;

    /** @var int */
    public $gatewayTimeout;
}
