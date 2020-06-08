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

namespace Rebilly\Entities\DigitalWallets;

use Rebilly\Rest\Resource;

final class GooglePay extends Resource
{
    /**
     * @param array $data
     *
     * @return GooglePay
     */
    public static function createFromData(array $data = [])
    {
        if (empty($data)) {
            return new self(['isEnabled' => false]);
        }

        return new self($data);
    }

    /**
     * @return bool
     */
    public function getIsEnabled()
    {
        return $this->getAttribute('isEnabled');
    }

    /**
     * @param bool $value
     *
     * @return GooglePay
     */
    public function setIsEnabled($value)
    {
        return $this->setAttribute('isEnabled', $value);
    }

    /**
     * @return string|null
     */
    public function getMerchantName()
    {
        return $this->getAttribute('merchantName');
    }

    /**
     * @param string|null $value
     *
     * @return GooglePay
     */
    public function setMerchantName($value)
    {
        return $this->setAttribute('merchantName', $value);
    }

    /**
     * @return string|null
     */
    public function getMerchantOrigin()
    {
        return $this->getAttribute('merchantOrigin');
    }

    /**
     * @param string|null $value
     *
     * @return GooglePay
     */
    public function setMerchantOrigin($value)
    {
        return $this->setAttribute('merchantOrigin', $value);
    }
}
