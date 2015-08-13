<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Api;

use ArrayObject;
use Rebilly\Client;
use Rebilly\Resource\Entity;
use Rebilly\Resource\Collection;

/**
 * Class LeadSource.
 *
 * ```json
 * {
 *   "customerId"
 *   "medium"
 *   "source"
 *   "campaign"
 *   "term"
 *   "content"
 *   "affiliate"
 *   "subAffiliate"
 *   "salesAgent"
 *   "clickId"
 *   "path"
 *   "ipAddress"
 *   "currency"
 *   "amount"
 * }
 * ```
 *
 * @property string $customerId
 */
final class LeadSource extends Entity
{
    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

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
    public function getСontent()
    {
        return $this->getAttribute('content');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setСontent($value)
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

    /********************************************************************************
     * Lead Source API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param array|ArrayObject $params
     *
     * @return LeadSource[]|Collection
     */
    public static function search($params = [])
    {
        return Client::get('lead-sources', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $leadSourceId
     * @param array|ArrayObject $params
     *
     * @return LeadSource
     */
    public static function load($leadSourceId, $params = [])
    {
        $params['leadSourceId'] = $leadSourceId;

        return Client::get('lead-sources/{leadSourceId}', $params);
    }

    /**
     * Facade for client command
     *
     * @param array|LeadSource $data
     * @param string $leadSourceId
     *
     * @return LeadSource
     */
    public static function create($data, $leadSourceId = null)
    {
        if (isset($leadSourceId)) {
            return Client::put($data, 'lead-sources/{leadSourceId}', ['leadSourceId' => $leadSourceId]);
        } else {
            return Client::post($data, 'lead-sources');
        }
    }
}
