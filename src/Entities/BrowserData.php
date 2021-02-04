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
     * @return bool
     */
    public function getIsJavaEnabled()
    {
        return $this->getAttribute('isJavaEnabled');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setIsJavaEnabled($value)
    {
        return $this->setAttribute('isJavaEnabled', $value);
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
}
