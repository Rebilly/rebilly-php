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

final class DigitalWallets extends Resource
{
    /**
     * @return ApplePay
     */
    public function getApplePay(): ApplePay
    {
        return $this->getAttribute('applePay');
    }

    /**
     * @param ApplePay $applePay
     *
     * @return DigitalWallets
     */
    public function setApplePay(ApplePay $applePay): self
    {
        return $this->setAttribute('applePay', $applePay);
    }

    /**
     * @return GooglePay
     */
    public function getGooglePay(): GooglePay
    {
        return $this->getAttribute('googlePay');
    }

    /**
     * @param GooglePay $googlePay
     *
     * @return DigitalWallets
     */
    public function setGooglePay(GooglePay $googlePay): self
    {
        return $this->setAttribute('googlePay', $googlePay);
    }

    /**
     * @param array $data
     *
     * @return ApplePay
     */
    public function createApplePay(array $data): ApplePay
    {
        return ApplePay::createFromData($data);
    }

    /**
     * @param array $data
     *
     * @return GooglePay
     */
    public function createGooglePay(array $data): GooglePay
    {
        return GooglePay::createFromData($data);
    }

    /**
     * @param array $data
     *
     * @return DigitalWallets
     */
    public static function createFromData(array $data = []): self
    {
        $object = new self($data);
        $object->setApplePay($object->createApplePay($data));
        $object->setGooglePay($object->createGooglePay($data));

        return $object;
    }
}
