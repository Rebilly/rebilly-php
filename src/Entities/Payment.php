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

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class Payment.
 *
 * ```json
 * {
 *   "id": 'string',
 *   "createdTime": 'datetime',
 *   "updatedTime": 'datetime',
 *   "state": 'enum',
 *   "website": 'string',
 *   "customer": 'string',
 *   "amount": 'float',
 *   "currency": 'currency',
 *   "method": 'enum',
 *   "paymentInstrument": {
 *     "key": "value"
 *   },
 *   "description": 'string'
 * }
 * ```
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Payment extends Entity
{
    const MSG_UNEXPECTED_METHOD = 'Unexpected method. Only %s methods support';

    const METHOD_PAYMENT_CARD = 'payment_card';

    /**
     * @return array
     */
    public static function methods()
    {
        return [
            Payment::METHOD_PAYMENT_CARD,
        ];
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->getAttribute('state');
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('website');
    }

    /**
     * @param string $value
     *
     * @return Payment
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('website', $value);
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customer');
    }

    /**
     * @param string $value
     *
     * @return Payment
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customer', $value);
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @param float $value
     *
     * @return Payment
     */
    public function setAmount($value)
    {
        return $this->setAttribute('amount', $value);
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @param string $value
     *
     * @return Payment
     */
    public function setCurrency($value)
    {
        return $this->setAttribute('currency', $value);
    }

    /**
     * @return PaymentMethods\PaymentCardMethod
     */
    public function getMethod()
    {
        if ($this->getAttribute('method') === null) {
            return null;
        }

        switch ($this->getAttribute('method')) {
            case self::METHOD_PAYMENT_CARD:
                return new PaymentMethods\PaymentCardMethod((array) $this->getAttribute('paymentInstrument'));
            default:
                throw new DomainException(sprintf(self::MSG_UNEXPECTED_METHOD, implode(', ', Payment::methods())));
        }
    }

    /**
     * @param PaymentMethod $value
     *
     * @return Payment
     */
    public function setMethod(PaymentMethod $value)
    {
        if (!in_array($value->name(), Payment::methods())) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_METHOD, implode(', ', Payment::methods())));
        }

        return $this
            ->setAttribute('method', $value->name())
            ->setAttribute('paymentInstrument', $value->jsonSerialize());
    }
}
