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
    public static function createFromData(array $data = []): self
    {
        if (empty($data)) {
            return new self(['isEnabled' => false]);
        }

        return new self($data);
    }

    /**
     * @return bool
     */
    public function getIsEnabled(): bool
    {
        return $this->getAttribute('isEnabled');
    }

    /**
     * @param bool $isEnabled
     *
     * @return GooglePay
     */
    public function setIsEnabled(bool $isEnabled): self
    {
        return $this->setAttribute('isEnabled', $isEnabled);
    }

    /**
     * @return string|null
     */
    public function getMerchantName(): ?string
    {
        return $this->getAttribute('merchantName');
    }

    /**
     * @param string|null $merchantName
     *
     * @return GooglePay
     */
    public function setMerchantName(?string $merchantName): self
    {
        return $this->setAttribute('merchantName', $merchantName);
    }

    /**
     * @return string|null
     */
    public function getMerchantOrigin(): ?string
    {
        return $this->getAttribute('merchantOrigin');
    }

    /**
     * @param string|null $merchantOrigin
     *
     * @return GooglePay
     */
    public function setMerchantOrigin(?string $merchantOrigin): self
    {
        return $this->setAttribute('merchantOrigin', $merchantOrigin);
    }
}
