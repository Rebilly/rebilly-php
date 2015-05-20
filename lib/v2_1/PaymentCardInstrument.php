<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
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
