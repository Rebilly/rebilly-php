<?php

/**
 * Class Organization
 * @package Rebilly\v2_1
 *
 * Usage:
 *
 * =======================
 * Get a organization
 * =======================
 * ~~~
 * $organization = new Rebilly\v2_1\Organization('organizationId');
 * $organization->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $organization->setApiKey('apiKey');
 *
 * $response = $organization->retrieve();
 * if ($response->statusCode === 200) {
 *     // Success
 * }
 * ~~~
 *
 * =======================
 * List all organizations
 * =======================
 * ~~~
 * $organization = new Rebilly\v2_1\Organization();
 * $organization->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $organization->setApiKey('apiKey');
 * $params = [
 *     "limit" => "5", // limit to 5 record
 * ];
 * $organization->setQueryParam($params);
 *
 * $response = $organization->listAll();
 * if ($response->statusCode === 200) {
 *     // Success
 * }
 * ~~~
 *
 * =======================
 * Create new organization
 * =======================
 * ~~~
 * $organization = new Rebilly\v2_1\Organization();
 * $organization->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $organization->setApiKey('apiKey');
 * $organization->name = 'My new organization';
 * $organization->address = '123 main street';
 * $organization->region = 'New York';
 * $organization->country = 'US';
 * $organization->postalCode = '12345';
 *
 * $response = $organization->create();
 * if ($response->statusCode === 201) {
 *     // Successfully created
 * }
 * ~~~
 *
 * =======================
 * Create new organization with specific ID
 * =======================
 * ~~~
 * $organization = new Rebilly\v2_1\Organization('organizationId');
 * $organization->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $organization->setApiKey('apiKey');
 * $organization->name = 'My new organization';
 * $organization->address = '123 main street';
 * $organization->region = 'New York';
 * $organization->country = 'US';
 * $organization->postalCode = '12345';
 *
 * $response = $organization->update();
 * if ($response->statusCode === 201) {
 *     // Successfully created
 * } elseif ($response->statusCode === 200) {
 *     // Successfully updated
 * }
 * ~~~
 *
 * =======================
 * Delete a organization
 * =======================
 * ~~~
 * $organization = new Rebilly\v2_1\Organization('organizationId');
 * $organization->setApiUrl(RebillyRequest::ENV_SANDBOX);
 * $organization->setApiKey('apiKey');
 *
 * $response = $organization->delete();
 * if ($response->statusCode === 204) {
 *     // Successfully deleted
 * }
 * ~~~
 */

namespace Rebilly\v2_1;
use RebillyRequest;
use Exception;

class Organization extends RebillyRequest
{
    const END_POINT = 'organizations/';

    /** @var string $name */
    public $name;
    /** @var string $address */
    public $address;
    /** @var string $address2 */
    public $address2;
    /** @var string $city */
    public $city;
    /** @var string $region */
    public $region;
    /** @var string $postalCode */
    public $postalCode;
    /** @var string $country */
    public $country;
    /** @var null|string $id */
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
     * Create new organization
     * @return RebillyResponse
     */
    public function create()
    {
        $this->setApiController(self::END_POINT);
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);

    }

    /**
     * Update or create a new organization with specific ID
     * @return RebillyResponse
     */
    public function update()
    {
        if (empty($this->id)) {
            throw new Exception('Organization id cannot be empty.');
        }
        $this->setApiController(self::END_POINT . $this->id);
        $data = $this->buildRequest($this);

        return $this->sendPutRequest($data);
    }

    /**
     * Delete a organization
     * @return RebillyResponse
     */
    public function delete()
    {
        if (empty($this->id)) {
            throw new Exception('Organization id cannot be empty.');
        }
        $this->setApiController(self::END_POINT . $this->id);
        $data = $this->buildRequest($this);

        return $this->sendDeleteRequest($data);
    }

    /**
     * Get a organization
     * @return RebillyResponse
     */
    public function retrieve()
    {
        if (empty($this->id)) {
            throw new Exception('Organization id cannot be empty.');
        }
        $this->setApiController(self::END_POINT . $this->id);

        return $this->sendGetRequest();
    }

    /**
     * List all organization
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
