<?php
namespace Rebilly\v2_1;

use RebillyRequest;
use Exception;

/**
 * Class Blacklist
 * @package Rebilly\v2_1
 *
 * Usage:
 *
 * =======================
 * Get a blacklist
 * =======================
 * ~~~
 * $blacklist = new Rebilly\v2_1\Blacklist('blacklistId');
 * $blacklist->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $blacklist->setApiKey('apiKey');
 *
 * $response = $blacklist->retrieve();
 * if ($response.statusCode === 200) {
 *     // Success
 * }
 * ~~~
 *
 * =======================
 * List all blacklists
 * =======================
 * ~~~
 * $blacklist = new Rebilly\v2_1\Blacklist('blacklistId');
 * $blacklist->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $blacklist->setApiKey('apiKey');
 * $params = [
 *     "limit" => "5", // limit to 5 record
 * ];
 * $blacklist->setQueryParam($params);
 *
 * $response = $blacklist->listAll();
 * if ($response.statusCode === 200) {
 *     // Success
 * }
 * ~~~
 *
 * =======================
 * Create new blacklist
 * =======================
 * ~~~
 * $blacklist = new Rebilly\v2_1\Blacklist();
 * $blacklist->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $blacklist->setApiKey('apiKey');
 * $blacklist->type = 'customerId';
 * $blacklist->value = 'customer123ABC';
 * $blacklist->ttl = 36000;
 *
 * $response = $blacklist->create();
 * if ($response.statusCode === 201) {
 *     // Successfully created
 * }
 * ~~~
 *
 * =======================
 * Create new blacklist with specific ID
 * =======================
 * ~~~
 * $blacklist = new Rebilly\v2_1\Blacklist('blacklistId');
 * $blacklist->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $blacklist->setApiKey('apiKey');
 * $blacklist->type = 'customerId';
 * $blacklist->value = 'customer123ABC';
 * $blacklist->ttl = 36000;
 *
 * $response = $blacklist->create();
 * if ($response.statusCode === 201) {
 *     // Successfully created
 * }
 * ~~~
 *
 * =======================
 * Delete a blacklist
 * =======================
 * ~~~
 * $blacklist = new Rebilly\v2_1\Blacklist('blacklistId');
 * $blacklist->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $blacklist->setApiKey('apiKey');
 *
 * $response = $blacklist->delete();
 * if ($response.statusCode === 204) {
 *     // Successfully deleted
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
    /** @var string $value */
    public $value;
    /** @var integer $ttl time to live */
    public $ttl;
    /** @var string $id */
    private $id;

    /**
     * Set version and endpoint
     * @param string|null $id
     */
    public function __construct($id = null)
    {
        $this->setVersion(2.1);
        if ($id !== null) {
            $this->id = $id;
        }
    }

    /**
     * Create new blacklist
     * @return RebillyResponse
     */
    public function create()
    {
        $data = $this->buildRequest($this);
        if ($this->id) {
            $this->setApiController(self::END_POINT . $this->id);

            return $this->sendPutRequest($data);
        }

        $this->setApiController(self::END_POINT);

        return $this->sendPostRequest($data);

    }

    /**
     * Delete a blacklist
     * @return RebillyResponse
     */
    public function delete()
    {
        if (empty($this->id)) {
            throw new Exception('Blacklist id cannot be empty.');
        }
        $this->setApiController(self::END_POINT . $this->id);
        $data = $this->buildRequest($this);

        return $this->sendDeleteRequest($data);
    }

    /**
     * Get a blacklist
     * @return RebillyResponse
     */
    public function retrieve()
    {
        if (empty($this->id)) {
            throw new Exception('Blacklist id cannot be empty.');
        }
        $this->setApiController(self::END_POINT . $this->id);

        return $this->sendGetRequest();
    }

    /**
     * List all blacklist
     * @return RebillyResponse
     */
    public function listAll()
    {
        $this->setApiController(self::END_POINT);

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
