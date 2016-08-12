<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities\PaymentInstruments;

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
     * @return string
     */
    public function getReceivedBy()
    {
        return $this->getAttribute('receivedBy');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setReceivedBy($value)
    {
        return $this->setAttribute('receivedBy', $value);
    }

    /**
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return PaymentMethod::METHOD_CASH;
    }
}
