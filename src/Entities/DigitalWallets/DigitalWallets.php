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
    public function getApplePay()
    {
        return $this->getAttribute('applePay');
    }

    /**
     * @param ApplePay $value
     *
     * @return DigitalWallets
     */
    public function setApplePay($value)
    {
        return $this->setAttribute('applePay', $value);
    }

    /**
     * @return GooglePay
     */
    public function getGooglePay()
    {
        return $this->getAttribute('googlePay');
    }

    /**
     * @param GooglePay $value
     *
     * @return DigitalWallets
     */
    public function setGooglePay($value)
    {
        return $this->setAttribute('googlePay', $value);
    }

    /**
     * @param array $data
     *
     * @return ApplePay
     */
    public function createApplePay(array $data)
    {
        return ApplePay::createFromData($data);
    }

    /**
     * @param array $data
     *
     * @return GooglePay
     */
    public function createGooglePay(array $data)
    {
        return GooglePay::createFromData($data);
    }

    /**
     * @param array $data
     *
     * @return DigitalWallets
     */
    public static function createFromData(array $data = [])
    {
        $object = new self($data);
        $object->setApplePay($object->createApplePay($data));
        $object->setGooglePay($object->createGooglePay($data));

        return $object;
    }
}
