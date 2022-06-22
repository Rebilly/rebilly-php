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

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class CreditMemo.
 */
final class CreditMemo extends Entity
{
    public const MSG_UNEXPECTED_REASON = 'Unexpected reason. Only %s reasons supported';

    public const REASON_RETURN = 'return';

    public const REASON_PRODUCT_UNSATISFACTORY = 'product-unsatisfactory';

    public const REASON_ORDER_CHANGE = 'order-change';

    public const REASON_ORDER_CANCELLATION = 'order-cancellation';

    public const REASON_CHARGEBACK = 'chargeback';

    public const REASON_WRITE_OFF = 'write-off';

    public const REASON_WAIVER = 'waiver';

    public const REASON_CUSTOMER_CREDIT = 'customer-credit';

    public const REASON_OTHER = 'other';

    /**
     * @return string[]
     */
    public static function reasons()
    {
        return [
            self::REASON_RETURN,
            self::REASON_PRODUCT_UNSATISFACTORY,
            self::REASON_ORDER_CHANGE,
            self::REASON_ORDER_CANCELLATION,
            self::REASON_CHARGEBACK,
            self::REASON_WRITE_OFF,
            self::REASON_WAIVER,
            self::REASON_CUSTOMER_CREDIT,
            self::REASON_OTHER,
        ];
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
     * @return $this
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
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
     * @return $this
     */
    public function setCurrency($value)
    {
        return $this->setAttribute('currency', $value);
    }

    /**
     * @return string|null
     */
    public function getInvoiceId()
    {
        return $this->getAttribute('invoiceId');
    }

    /**
     * @param string|null $value
     *
     * @return $this
     */
    public function setInvoiceId($value)
    {
        return $this->setAttribute('invoiceId', $value);
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->getAttribute('number');
    }

    /**
     * @return CreditMemoItem[]
     */
    public function getItems()
    {
        return $this->getAttribute('items');
    }

    /**
     * @param CreditMemoItem[]|array $value
     *
     * @return $this
     */
    public function setItems($value)
    {
        return $this->setAttribute('items', $value);
    }

    /**
     * @param array $data
     *
     * @return array|CreditMemoItem[]
     */
    public function createItems(array $data)
    {
        return array_map(function ($element) {
            return new CreditMemoItem($element);
        }, $data);
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
    public function getReason()
    {
        return $this->getAttribute('reason');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setReason($value)
    {
        if (!in_array($value, self::reasons(), true)) {
            throw new DomainException(sprintf(self::MSG_UNEXPECTED_REASON, implode(', ', self::reasons())));
        }

        return $this->setAttribute('reason', $value);
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
     * @return float
     */
    public function getShippingAmount()
    {
        return $this->getAttribute('shippingAmount');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setShippingAmount($value)
    {
        return $this->setAttribute('shippingAmount', $value);
    }

    /**
     * @return float
     */
    public function getTaxAmount()
    {
        return $this->getAttribute('taxAmount');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setTaxAmount($value)
    {
        return $this->setAttribute('taxAmount', $value);
    }

    /**
     * @return float
     */
    public function getTotalAmount()
    {
        return $this->getAttribute('totalAmount');
    }

    /**
     * @return float
     */
    public function getUnusedAmount()
    {
        return $this->getAttribute('unusedAmount');
    }

    /**
     * @return int
     */
    public function getRevision()
    {
        return $this->getAttribute('revision');
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
