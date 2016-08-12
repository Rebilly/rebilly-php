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
 *   "status": 'enum',
 *   "result": 'enum',
 *   "website": 'string',
 *   "customer": 'string',
 *   "amount": 'float',
 *   "currency": 'currency',
 *   "method": 'enum',
 *   "paymentInstrument": {
 *     "key": "value"
 *   },
 *   "description": 'string'
 *   "customFields": 'array'
 * }
 * ```
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Payment extends Entity
{
    /**
     * @return array
     */
    public static function methods()
    {
        return [
            PaymentMethod::METHOD_ACH,
            PaymentMethod::METHOD_CASH,
            PaymentMethod::METHOD_CHINA_UNIONPAY,
            PaymentMethod::METHOD_PAYMENT_CARD,
            PaymentMethod::METHOD_PAYPAL,
        ];
    }

    /**
     * PaymentMethodInstrument|null
     */
    private $paymentInstrument;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $data = [])
    {
        if (isset($data['paymentInstrument'])) {
            $this->paymentInstrument = PaymentMethodInstrument::createFromData($data['paymentInstrument']);
            $data['paymentInstrument'] = $this->paymentInstrument->jsonSerialize();
        }

        parent::__construct($data);
    }


    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @deprecated
     * @return string
     */
    public function getState()
    {
        return $this->getAttribute('state');
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return string
     */
    public function getResult()
    {
        return $this->getAttribute('result');
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
        return $this->getAttribute('websiteId');
    }

    /**
     * @param string $value
     *
     * @return Payment
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('websiteId', $value);
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @param string $value
     *
     * @return Payment
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
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
     * @return PaymentMethodInstrument
     */
    public function getPaymentInstrument()
    {
        return $this->paymentInstrument;
    }

    /**
     * @param PaymentMethodInstrument $value
     *
     * @return $this
     */
    public function setPaymentInstrument(PaymentMethodInstrument $value)
    {
        $this->paymentInstrument = $value;

        return $this->setAttribute('paymentInstrument', $value->jsonSerialize());
    }

    /**
     * @return array
     */
    public function getCustomFields()
    {
        return $this->getAttribute('customFields');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setCustomFields($value)
    {
        return $this->setAttribute('customFields', $value);
    }

    /**
     * @return array
     */
    public function getInvoiceIds()
    {
        return $this->getAttribute('invoiceIds');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setInvoiceIds($value)
    {
        return $this->setAttribute('invoiceIds', $value);
    }
}
