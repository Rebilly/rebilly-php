<?php
/**
 * Class RebillyBlacklist
 *
 */

class RebillyBlacklist extends RebillyRequest
{
    public $value;
    public $ttl;
    public $pan;
    public $expMonth;
    public $expYear;

    const TYPE_EMAIL       = 'email';
    const TYPE_CUSTOMERID  = 'customerId';
    const TYPE_IPADDRESS   = 'ipAddress';
    const TYPE_COUNTRY     = 'country';
    const TYPE_BIN         = 'bin';
    const TYPE_PAYMENTCARD = 'paymentCard';

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
