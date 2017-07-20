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

use Rebilly\Rest\Resource;

/**
 * Class RiskMetadata
 *
 * ```json
 * {
 *   "ipAddress",
 *   "isHosting",
 *   "ipProxy",
 *   "ipTor",
 *   "ipVPN",
 *   "vpnServiceName",
 *   "isp"
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class RiskMetadata extends Resource
{
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
    public function getIsHosting()
    {
        return $this->getAttribute('isHosting');
    }

    /**
     * @return bool
     */
    public function getIsProxy()
    {
        return $this->getAttribute('isProxy');
    }

    /**
     * @return bool
     */
    public function getIsTor()
    {
        return $this->getAttribute('isTor');
    }

    /**
     * @return bool
     */
    public function getIsVPN()
    {
        return $this->getAttribute('isVPN');
    }

    /**
     * @return string|null
     */
    public function getVpnServiceName()
    {
        return $this->getAttribute('vpnServiceName');
    }

    /**
     * @return string|null
     */
    public function getIsp()
    {
        return $this->getAttribute('isp');
    }

    /**
     * @return string|null
     */
    public function getFingerprint()
    {
        return $this->getAttribute('fingerprint');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setFingerprint($value)
    {
        return $this->setAttribute('fingerprint', $value);
    }

    /**
     * @return array
     */
    public function getHttpHeaders()
    {
        return $this->getAttribute('httpHeaders');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setHttpHeaders($value)
    {
        return $this->setAttribute('httpHeaders', $value);
    }

    /**
     * @return string|null
     */
    public function getCountry()
    {
        return $this->getAttribute('country');
    }

    /**
     * @return string|null
     */
    public function getCity()
    {
        return $this->getAttribute('city');
    }

    /**
     * @return float|null
     */
    public function getLatitude()
    {
        return $this->getAttribute('latitude');
    }

    /**
     * @return float|null
     */
    public function getLongitude()
    {
        return $this->getAttribute('longitude');
    }

    /**
     * @return string|null
     */
    public function getPostalCode()
    {
        return $this->getAttribute('postalCode');
    }

    /**
     * @return string|null
     */
    public function getTimeZone()
    {
        return $this->getAttribute('timeZone');
    }

    /**
     * @return int|null
     */
    public function getAccuracyRadius()
    {
        return $this->getAttribute('accuracyRadius');
    }
}
