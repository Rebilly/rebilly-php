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

class LeadSourceData extends Resource
{
    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
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
     * @return string
     */
    public function getMedium()
    {
        return $this->getAttribute('medium');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setMedium($value)
    {
        return $this->setAttribute('medium', $value);
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->getAttribute('source');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSource($value)
    {
        return $this->setAttribute('source', $value);
    }

    /**
     * @return string
     */
    public function getCampaign()
    {
        return $this->getAttribute('campaign');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCampaign($value)
    {
        return $this->setAttribute('campaign', $value);
    }

    /**
     * @return string
     */
    public function getTerm()
    {
        return $this->getAttribute('term');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setTerm($value)
    {
        return $this->setAttribute('term', $value);
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->getAttribute('content');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setContent($value)
    {
        return $this->setAttribute('content', $value);
    }

    /**
     * @return string
     */
    public function getAffiliate()
    {
        return $this->getAttribute('affiliate');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAffiliate($value)
    {
        return $this->setAttribute('affiliate', $value);
    }

    /**
     * @return string
     */
    public function getSubAffiliate()
    {
        return $this->getAttribute('subAffiliate');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSubAffiliate($value)
    {
        return $this->setAttribute('subAffiliate', $value);
    }

    /**
     * @return string
     */
    public function getSalesAgent()
    {
        return $this->getAttribute('salesAgent');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setSalesAgent($value)
    {
        return $this->setAttribute('salesAgent', $value);
    }

    /**
     * @return string
     */
    public function getClickId()
    {
        return $this->getAttribute('clickId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setClickId($value)
    {
        return $this->setAttribute('clickId', $value);
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->getAttribute('path');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPath($value)
    {
        return $this->setAttribute('path', $value);
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->getAttribute('amount');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setAmount($value)
    {
        return $this->setAttribute('amount', $value);
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
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
     * @return string
     */
    public function getReferrer()
    {
        return $this->getAttribute('referrer');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setReferrer($value)
    {
        return $this->setAttribute('referrer', $value);
    }
}
