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
 * Class AchInstrument
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
class AchInstrument extends BaseInstrument
{
    /**
     * @return string
     */
    public function getBankAccountId()
    {
        return $this->getAttribute('bankAccountId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBankAccountId($value)
    {
        return $this->setAttribute('bankAccountId', $value);
    }

    /**
     * @return string
     */
    public function getGatewayAccountId()
    {
        return $this->getAttribute('gatewayAccountId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setGatewayAccountId($value)
    {
        return $this->setAttribute('gatewayAccountId', $value);
    }

    /**
     * {@inheritdoc}
     */
    protected function methodName()
    {
        return PaymentMethod::METHOD_ACH;
    }
}
