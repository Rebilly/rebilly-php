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

use DomainException;
use Rebilly\Rest\Entity;

/**
 * Class GatewayAccount
 *
 * ```json
 * {
 *   "id"
 *   "gatewayName",
 *   "merchantCategoryCode",
 *   "descriptor",
 *   "city",
 *   "organizationId",
 *   "websites",
 *   "acquirerName'"
 *   "monthlyLimit",
 *   "acceptedCurrencies",
 *   "downtimeStart",
 *   "downtimeEnd",
 *   "gatewayConfig",
 * }
 * ```
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class GatewayAccount extends Entity
{
    /**
     * @return string
     */
    public function getGatewayName()
    {
        return $this->getAttribute('gatewayName');
    }

    /**
     * @return int
     */
    public function getMerchantCategoryCode()
    {
        return $this->getAttribute('merchantCategoryCode');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setMerchantCategoryCode($value)
    {
        return $this->setAttribute('merchantCategoryCode', $value);
    }

    /**
     * @return string
     */
    public function getDescriptor()
    {
        return $this->getAttribute('descriptor');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDescriptor($value)
    {
        return $this->setAttribute('descriptor', $value);
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->getAttribute('city');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCity($value)
    {
        return $this->setAttribute('city', $value);
    }

    /**
     * @return string
     */
    public function getOrganizationId()
    {
        return $this->getAttribute('organizationId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setOrganizationId($value)
    {
        return $this->setAttribute('organizationId', $value);
    }

    /**
     * @return array
     */
    public function getWebsites()
    {
        return $this->getAttribute('websites');
    }

    /**
     * @param array $value
     *
     * @return $this
     * @throws DomainException
     */
    public function setWebsites($value)
    {
        $websites = [];
        if (!is_array($value)) {
            throw new DomainException('Websites must be an array');
        }
        foreach ($value as $website) {
            if ($website instanceof Website) {
                $websites[] = $website->getId();
            } elseif (is_string($website)) {
                $websites[] = $website;
            } else {
                throw new DomainException('Each website must be string identifier or Website entity object');
            }
        }

        return $this->setAttribute('websites', $value);
    }

    /**
     * @return string
     */
    public function getAcquirerName()
    {
        return $this->getAttribute('acquirerName');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAcquirerName($value)
    {
        return $this->setAttribute('acquirerName', $value);
    }

    /**
     * @return float
     */
    public function getMonthlyLimit()
    {
        return $this->getAttribute('monthlyLimit');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setMonthlyLimit($value)
    {
        return $this->setAttribute('monthlyLimit', $value);
    }

    /**
     * @return array
     */
    public function getAcceptedCurrencies()
    {
        return $this->getAttribute('acceptedCurrencies');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setAcceptedCurrencies($value)
    {
        return $this->setAttribute('acceptedCurrencies', $value);
    }

    /**
     * @return string
     */
    public function getDowntimeStart()
    {
        return $this->getAttribute('downtimeStart');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDowntimeStart($value)
    {
        return $this->setAttribute('downtimeStart', $value);
    }

    /**
     * @return string
     */
    public function getDowntimeEnd()
    {
        return $this->getAttribute('downtimeEnd');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDowntimeEnd($value)
    {
        return $this->setAttribute('downtimeEnd', $value);
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setGatewayConfig($value)
    {
        return $this->setAttribute('gatewayConfig', $value);
    }
}
