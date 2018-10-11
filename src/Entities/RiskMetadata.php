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
 *   "fingerprint"
 *   "httpHeaders"
 *   "country"
 *   "region"
 *   "city"
 *   "latitude"
 *   "longitude"
 *   "postalCode"
 *   "timeZone"
 *   "accuracyRadius"
 *   "distance"
 * }
 * ```
 *
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
    public function getIsVpn()
    {
        return $this->getAttribute('isVpn');
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
    public function getRegion()
    {
        return $this->getAttribute('region');
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

    /**
     * @return int|null
     */
    public function getDistance()
    {
        return $this->getAttribute('distance');
    }
}
