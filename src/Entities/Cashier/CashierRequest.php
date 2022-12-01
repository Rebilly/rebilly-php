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

declare(strict_types=1);

namespace Rebilly\Entities\Cashier;

use Rebilly\Rest\Entity;

class CashierRequest extends Entity
{
    public const STATUS_CREATED = 'created';

    public const STATUS_PENDING = 'pending';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_EXPIRED = 'expired';

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('websiteId');
    }

    /**
     * @param string $value
     * @return $this
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
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->getAttribute('redirectUrl');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setRedirectUrl($value)
    {
        return $this->setAttribute('redirectUrl', $value);
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
    public function getTransactionId()
    {
        return $this->getAttribute('transactionId');
    }

    /**
     * @return float[]
     */
    public function getAmounts()
    {
        return$this->getAttribute('amounts');
    }

    /**
     * @param float[] $value
     * @return $this
     */
    public function setAmounts($value)
    {
        return $this->setAttribute('amounts', $value);
    }

    /**
     * @return CashierCustomAmount|null
     */
    public function getCustomAmount()
    {
        return $this->getAttribute('customAmount');
    }

    /**
     * @param array $value
     * @return $this
     */
    public function setCustomAmount($value)
    {
        return $this->setAttribute('customAmount', $value);
    }

    /**
     * @param array $data
     * @return CashierCustomAmount
     */
    public function createCustomAmount($data)
    {
        return new CashierCustomAmount($data);
    }

    /**
     * @return string
     */
    public function getExpirationTime()
    {
        return $this->getAttribute('expirationTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpirationTime($value)
    {
        return $this->setAttribute('expirationTime', $value);
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
    public function getUpdatedTime()
    {
        return $this->getAttribute('updatedTime');
    }
}
