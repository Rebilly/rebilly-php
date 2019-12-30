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

use Rebilly\Rest\Entity;

/**
 * Class CheckoutPage.
 */
final class CheckoutPage extends Entity
{
    /**
     * @return string
     */
    public function getName()
    {
        return $this->getAttribute('name');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setName($value)
    {
        return $this->setAttribute('name', $value);
    }

    /**
     * @deprecated use getUrlPathSegment instead
     * @return string
     */
    public function getUriPath()
    {
        return $this->getAttribute('urlPathSegment');
    }

    /**
     * @deprecated use setUrlPathSegment instead
     * @param string $value
     *
     * @return $this
     */
    public function setUriPath($value)
    {
        return $this->setAttribute('urlPathSegment', $value);
    }

    /**
     * @return string
     */
    public function getUrlPathSegment()
    {
        return $this->getAttribute('urlPathSegment');
    }

    /**
     * @param string $value

     * @return $this
     */
    public function setUrlPathSegment($value)
    {
        return $this->setAttribute('urlPathSegment', $value);
    }

    /**
     * @return string
     */
    public function getPlanId()
    {
        return $this->getAttribute('planId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPlanId($value)
    {
        return $this->setAttribute('planId', $value);
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('websiteId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('websiteId', $value);
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->getAttribute('redirectUrl');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRedirectUrl($value)
    {
        $timeout = $this->getRedirect()['timeout'] ?? 5;

        return $this->setAttribute('redirect', ['url' => $value, 'timeout' => $timeout]);
    }

    /**
     * @return array
     */
    public function getRedirect()
    {
        return $this->getAttribute('redirect');
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setRedirect($value)
    {
        return $this->setAttribute('redirect', $value);
    }

    /**
     * @return int
     */
    public function getRedirectTimeout()
    {
        return $this->getAttribute('redirectTimeout');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setRedirectTimeout($value)
    {
        $url = $this->getRedirect()['url'] ?? '';

        return $this->setAttribute('redirect', ['url' => $url, 'timeout' => $value]);
    }

    /**
     * @deprecated use getStatus instead
     * @return bool
     */
    public function getIsActive()
    {
        return $this->getAttribute('status') === 'active';
    }

    /**
     * @deprecated use setStatus instead
     * @param bool $value
     *
     * @return $this
     */
    public function setIsActive($value)
    {
        return $this->setAttribute('status', $value ? 'active' : 'inactive');
    }

    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setStatus($value)
    {
        return $this->setAttribute('status', $value);
    }

    /**
     * @deprecated use getIsCustomCustomerIdAllowed instead
     * @return bool
     */
    public function getAllowCustomCustomerId()
    {
        return $this->getAttribute('isCustomCustomerIdAllowed');
    }

    /**
     * @deprecated use setIsCustomCustomerIdAllowed instead
     * @param bool $value
     *
     * @return $this
     */
    public function setAllowCustomCustomerId($value)
    {
        return $this->setAttribute('isCustomCustomerIdAllowed', $value);
    }

    /**
     * @return bool
     */
    public function getIsCustomCustomerIdAllowed()
    {
        return $this->getAttribute('isCustomCustomerIdAllowed');
    }

    /**
     * @param bool $value
     *
     * @return $this
     */
    public function setIsCustomCustomerIdAllowed($value)
    {
        return $this->setAttribute('isCustomCustomerIdAllowed', $value);
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
