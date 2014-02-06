<?php
/**
 * Class RebillyBlacklist
 *
 * Usage: example to create a blacklist (customerId)
 * <pre>
 *     // Please checkout our documentation for more examples
 *     $blacklist = new RebillyBlacklist(RebillyBlacklist::TYPE_CUSTOMERID);
 *     $blacklist->setEnvironment(RebillyRequest::ENV_STAGING);
 *     $blacklist->setApiKey('apiKey');
 *     $blacklist->value = 'cust123';
 *     $response = $blacklist->create();
 *     $rawResponse = $response->getRawResponse();
 *
 *     if ($rawResponse->action === RebillyResponse::BLACKLIST_ENTRY_CREATE && $rawResponse->status === RebillyResponse::STATUS_SUCCESS) {
 *          // Successfully created blacklist
 *     }
 * </pre>
 *
 * Available attributes:
 * @var string $value
 * @var integer $ttl
 * @var string $pan
 * @var integer $expMonth
 * @var integer $expYear
 */

class RebillyBlacklist extends RebillyRequest
{
    /**
     * Blacklist Type
     */
    const TYPE_EMAIL       = 'email';
    const TYPE_CUSTOMERID  = 'customerId';
    const TYPE_IPADDRESS   = 'ipAddress';
    const TYPE_COUNTRY     = 'country';
    const TYPE_BIN         = 'bin';
    const TYPE_PAYMENTCARD = 'paymentCard';

    /**
     * @var string $value
     */
    public $value;
    /**
     * @var integer $ttl
     */
    public $ttl;
    /**
     * @var string $pan
     */
    public $pan;
    /**
     * @var integer $expMonth
     */
    public $expMonth;
    /**
     * @var integer $expYear
     */
    public $expYear;

    public function __construct($type)
    {
        $this->setApiController('blacklists/' . $type);
    }

    /**
     * Create black or gray list
     * @return array Rebilly response
     */
    public function create()
    {
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Delete black or gray list
     * @return array Rebilly response
     */
    public function delete()
    {
        $data = $this->buildRequest($this);

        return $this->sendDeleteRequest($data);
    }

    /**
     * Get black or gray list
     * @return array Rebilly response
     */
    public function retrieve()
    {
        return $this->sendGetRequest();
    }

    /**
     * Return all the property of this class
     * @param $class
     * @return array
     */
    public function getPublicProperties($class)
    {
        return get_object_vars($class);
    }
}
