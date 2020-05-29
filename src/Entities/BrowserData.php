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

use Rebilly\Entities\Contact\Email;
use Rebilly\Entities\Contact\PhoneNumber;
use Rebilly\Rest\Resource;

/**
 * Class BrowserData.
 */
class BrowserData extends Resource
{
    /**
     * @param array $data
     *
     * @return BrowserData
     */
    public static function createFromData(array $data)
    {
        return new self($data);
    }

    /**
     * @return string
     */
    public function getAcceptHeader()
    {
        return $this->getAttribute('acceptHeader');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAcceptHeader($value)
    {
        return $this->setAttribute('acceptHeader', $value);
    }

    /**
     * @return int
     */
    public function getColorDepth()
    {
        return $this->getAttribute('colorDepth');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setColorDepth($value)
    {
        return $this->setAttribute('colorDepth', $value);
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->getAttribute('ipAddress');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setIpAddress($value)
    {
        return $this->setAttribute('ipAddress', $value);
    }

    /**
     * @return bool
     */
    public function getJavaEnabled()
    {
        return $this->getAttribute('javaEnabled');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setJavaEnabled($value)
    {
        return $this->setAttribute('javaEnabled', $value);
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->getAttribute('language');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setLanguage($value)
    {
        return $this->setAttribute('language', $value);
    }

    /**
     * @return int
     */
    public function getScreenHeight()
    {
        return $this->getAttribute('screenHeight');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setScreenHeight($value)
    {
        return $this->setAttribute('screenHeight', $value);
    }

    /**
     * @return int
     */
    public function getScreenWidth()
    {
        return $this->getAttribute('screenWidth');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setScreenWidth($value)
    {
        return $this->setAttribute('screenWidth', $value);
    }

    /**
     * @return int
     */
    public function getTimeZoneOffset()
    {
        return $this->getAttribute('timeZoneOffset');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setTimeZoneOffset($value)
    {
        return $this->setAttribute('timeZoneOffset', $value);
    }

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->getAttribute('userAgent');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setUserAgent($value)
    {
        return $this->setAttribute('userAgent', $value);
    }

    /**
     * @return string
     */
    public function getDeviceFingerprintHash()
    {
        return $this->getAttribute('deviceFingerprintHash');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDeviceFingerprintHash($value)
    {
        return $this->setAttribute('deviceFingerprintHash', $value);
    }
}
