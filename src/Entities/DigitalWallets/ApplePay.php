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

final class ApplePay extends Resource
{
    /**
     * @param array $data
     *
     * @return ApplePay
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
     * @return ApplePay
     */
    public function setIsEnabled($value)
    {
        return $this->setAttribute('isEnabled', $value);
    }
}
