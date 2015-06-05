<?php
namespace Rebilly\v2_1;

use RebillyRequest;

/**
 * Class Blacklist
 * @package Rebilly\v2_1
 * 
 * Usage:
 * =======================
 * Create new blacklist
 * =======================
 * ~~~
 * $blacklist = new Rebilly\v2_1\Blacklist();
 * $blacklist->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $blacklist->setApiKey('apiKey');
 * $blacklist->type = 'customerId';
 * $blacklist->items = [
 *     'value' => 'customer123ABC',
 *     'ttl' => 36000 // optional
 * ];
 *
 * $response = $blacklist->create();
 * if ($response.statusCode === 201) {
 *     // Success
 * }
 * ~~~
 * =======================
 * Delete a blacklist
 * =======================
 * ~~~
 * $blacklist = new Rebilly\v2_1\Blacklist();
 * $blacklist->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $blacklist->setApiKey('apiKey');
 * $blacklist->type = 'customerId';
 * $blacklist->items = [
 *     'value' => 'customer123ABC',
 * ];
 *
 * $response = $blacklist->delete();
 * if ($response.statusCode === 204) {
 *     // Success
 * }
 * ~~~
 */
class Blacklist extends RebillyRequest
{
    /** public const */
    const TYPE_EMAIL = 'email';
    const TYPE_CUSTOMERID = 'customerId';
    const TYPE_IPADDRESS = 'ipAddress';
    const TYPE_COUNTRY = 'country';
    const TYPE_BIN = 'bin';
    const TYPE_PAYMENTCARD = 'paymentCard';
    /** end point */
    const END_POINT = 'blacklists/';

    /** @var string $type */
    public $type;
    /** @var array $items */
    public $items;

    /**
     * Set version and endpoint
     */
    public function __construct()
    {
        $this->setApiController(self::END_POINT);
        $this->setVersion(2.1);
    }

    /**
     * Create new blacklist
     * @return RebillyResponse
     */
    public function create()
    {
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Delete a blacklist
     * @return RebillyResponse
     */
    public function delete()
    {
        $data = $this->buildRequest($this);

        return $this->sendDeleteRequest($data);
    }

    /**
     * List all blacklist
     * @return RebillyResponse
     */
    public function listAll()
    {
        $this->setApiController(isset($this->type) ? self::END_POINT . $this->type : self::END_POINT);

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
