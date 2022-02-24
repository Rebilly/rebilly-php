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

namespace Rebilly\Entities\ReadyToPay;

use Rebilly\Entities\Address;
use Rebilly\Entities\ReadyToPay\Features\ReadyToPayFeature;
use Rebilly\Entities\RiskMetadata;
use Rebilly\Rest\Resource;

class ReadyToPay extends Resource
{
    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->getAttribute('method');
    }

    /**
     * @return ReadyToPayFeature|null
     */
    public function getFeature()
    {
        return $this->getAttribute('feature');
    }

    /**
     * @return array
     */
    public function getBrands()
    {
        return $this->getAttribute('brands');
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return $this->getAttribute('filters');
    }

    /**
     * @param array $data
     *
     * @return ReadyToPayFeature
     */
    public function createFeature(array $data)
    {
        return ReadyToPayFeature::createFromData($data);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCurrency($value)
    {
        return $this->setAttribute('currency', $value);
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setAmount($value)
    {
        return $this->setAttribute('amount', $value);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
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
     * @param Address|array $value
     *
     * @return $this
     */
    public function setBillingAddress($value)
    {
        return $this->setAttribute('billingAddress', $value);
    }

    /**
     * @param RiskMetadata $value
     *
     * @return $this
     */
    public function setRiskMetadata(RiskMetadata $value)
    {
        return $this->setAttribute('riskMetadata', $value);
    }

    /**
     * @param array $value
     *
     * @return $this
     */
    public function setItems(array $value)
    {
        return $this->setAttribute('items', $value);
    }
}
