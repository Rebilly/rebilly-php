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

use DomainException;
use Rebilly\Entities\PaymentMethod;
use Rebilly\Rest\Resource;

/**
 * Class BaseInstrument
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
abstract class BaseInstrument extends Resource
{
    const MSG_UNEXPECTED_METHOD = 'Unexpected method. Only %s method support';

    /**
     * @return PaymentMethod|null
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMethod($value)
    {
        if ($value === $this->methodName()) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_METHOD, $this->methodName()));
        }

        return $this->setAttribute('method', $value);
    }

    /**
     * @return string
     */
    abstract protected function methodName();
}
