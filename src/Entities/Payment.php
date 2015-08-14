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
use Rebilly\Client;
use Rebilly\Resource\Entity;
use Rebilly\Resource\Collection;

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
 *     ""
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
    const METHOD_PAYMENT_CARD = 'payment_card';
    const METHOD_PAYPAL = 'paypal';

    /**
     * @return array
     */
    public static function methods()
    {
        return [
            Payment::METHOD_PAYMENT_CARD,
            Payment::METHOD_PAYPAL,
        ];
    }

    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

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
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
    }

    /**
     * @param string $value
     *
     * @return Payment
     */
    public function setMethod($value)
    {
        if (!in_array($value, Payment::methods())) {
            throw new DomainException('Only "' . implode(', ', Payment::methods()) . ' method supports');
        }

        return $this->setAttribute('method', $value);
    }

    /**
     * @return array
     */
    public function getPaymentInstrument()
    {
        return $this->getAttribute('paymentInstrument');
    }

    /**
     * @param array $value
     *
     * @return Payment
     */
    public function setPaymentInstrument($value)
    {
        return $this->setAttribute('paymentInstrument', (array) $value);
    }

    /********************************************************************************
     * Payment API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @return Payment[]|Collection
     */
    public static function search()
    {
        return Client::get('payments');
    }

    /**
     * Facade for client command
     *
     * @param string $paymentId
     *
     * @return Payment
     */
    public static function load($paymentId)
    {
        return Client::get('payments/{paymentId}', ['paymentId' => $paymentId]);
    }

    /**
     * Facade for client command
     *
     * @param array|Payment $payment
     * @param string|null $paymentId
     *
     * @return Payment|ScheduledPayment
     */
    public static function create($payment, $paymentId = null)
    {
        if (isset($paymentId)) {
            return Client::put($payment, 'payments/{paymentId}', ['paymentId' => $paymentId]);
        } else {
            return Client::post($payment, 'payments');
        }
    }
}
