<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\CustomerPaymentInstruments;

use Rebilly\Entities\PaymentMethod;

/**
 * Class CashInstrument
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
class CashInstrument extends BaseInstrument
{
    /**
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return PaymentMethod::METHOD_CASH;
    }
}
