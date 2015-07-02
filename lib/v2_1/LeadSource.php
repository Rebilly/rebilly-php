<?php
/**
 * Class Subscription
 * @package Rebilly\v2_1
 *
 * Usage:
 * ===========================
 * Get lead sources
 * ===========================
 * ~~~
 * $leadSource = new Rebilly\v2_1\LeadSource("customerId", "leadSourceId");
 * $leadSource->setApiKey("apiKey");
 * $leadSource->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $params = [
 *     "fields" => "medium,source,customerId", // only want to show "id", "medium", "source" and "customerId"
 *     "expand" => "customer", // expand customer object
 * ];
 * $leadSource->setQueryParam($params);
 *
 * $response = $leadSource->retrieve();
 * if ($response->statusCode === 200) {
 *     // Successfully retrieve a leadSource
 *     print_r($response->getRawResponse());
 * }
 * ~~~
 * ===========================
 * List lead sources per customer
 * ===========================
 * ~~~
 * $leadSource = new Rebilly\v2_1\LeadSource("customerId");
 * $leadSource->setApiKey("apiKey");
 * $leadSource->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $params = [
 *     "fields" => "medium,source,customerId", // only want to show "id", "medium", "source" and "customerId"
 *     "expand" => "customer", // expand customer object
 * ];
 * $leadSource->setQueryParam($params);
 *
 * $response = $leadSource->listByCustomer();
 * if ($response->statusCode === 200) {
 *     // Successfully retrieve a leadSource
 *     print_r($response->getRawResponse());
 * }
 * ~~~
 * ===========================
 * List all lead sources
 * ===========================
 * ~~~
 * $leadSource = new Rebilly\v2_1\LeadSource();
 * $leadSource->setApiKey("apiKey");
 * $leadSource->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $params = [
 *     "limit" => "5", // limit to 5 record
 *     "fields" => "medium,source,customer", // only want to show "id", "medium", "source" and "customer"
 *     "expand" => "customer", // expand customer object
 * ];
 * $leadSource->setQueryParam($params);
 *
 * $response = $leadSource->listAll();
 * if ($response->statusCode === 200) {
 *     // Successfully retrieve a leadSource
 *     print_r($response->getRawResponse());
 * }
 * ~~~
 * ===========================
 * Create new lead source
 * ===========================
 * ~~~
 * $leadSource = new Rebilly\v2_1\LeadSource("customerId");
 * $leadSource->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $leadSource->setApiKey("apiKey");
 *
 * $leadSource->medium = "search";
 * $leadSource->source = "yahoo";
 * $leadSource->campaign = "leg warmers";
 *
 * $response =  $leadSource->create();
 *
 * if ($response->statusCode === 201) {
 *     // Success
 * } else {
 *     // Something wrong -- check response for errors
 *     print_r($response->getRawResponse());
 * }
 * ~~~
 * ===========================
 * Create new lead source with ID
 * ===========================
 * ~~~
 * $leadSource = new Rebilly\v2_1\LeadSource("customerId", "leadSourceId");
 * $leadSource->setEnvironment(RebillyRequest::ENV_SANDBOX);
 * $leadSource->setApiKey("apiKey");
 *
 * $leadSource->medium = "search";
 * $leadSource->source = "yahoo";
 * $leadSource->campaign = "leg warmers";
 *
 * $response =  $leadSource->update();
 *
 * if ($response->statusCode === 201) {
 *     // Success
 * } else {
 *     // Something wrong -- check response for errors
 *     print_r($response->getRawResponse());
 * }
 * ~~~
 */

namespace Rebilly\v2_1;

use RebillyRequest;
use RebillyResponse;
use Exception;

class LeadSource extends RebillyRequest
{
    const LEAD_END_POINT = 'lead-sources/';
    const CUSTOMER_END_POINT = 'customers/';

    /** @var string $medium */
    public $medium;
    /** @var string $source */
    public $source;
    /** @var string $campaign */
    public $campaign;
    /** @var string $term */
    public $term;
    /** @var string $content */
    public $content;
    /** @var string $affiliate */
    public $affiliate;
    /** @var string $subAffiliate */
    public $subAffiliate;
    /** @var string $salesAgent */
    public $salesAgent;
    /** @var string $currency */
    public $currency;
    /** @var string $amount */
    public $amount;
    /** @var string $createdTime */
    public $createdTime;
    /** @var string $updatedTime */
    public $updatedTime;
    /** @var string $path */
    public $path;
    /** @var string $clickId */
    public $clickId;
    /** @var string $ipAddress */
    public $ipAddress;
    /** @var string $customer */
    public $customer;

    /** @var string $customerId */
    private $customerId;
    /** @var string $id */
    private $id;

    /**
     * Set version
     */
    public function __construct($customerId = null, $id = null)
    {
        if (!empty($customerId)) {
            $this->customerId = $customerId;
        }
        if (!empty($id)) {
            $this->id = $id;
        }
        $this->setVersion(2.1);
    }

    /**
     * Create new lead source
     * @return RebillyResponse
     * @throws Exception
     */
    public function create()
    {
        if (empty($this->customerId)) {
            throw new Exception('customerId cannot be empty.');
        }
        $this->setApiController(self::LEAD_END_POINT);
        $data = $this->buildRequest($this);

        return $this->sendPostRequest($data);
    }

    /**
     * Create with ID
     * @return RebillyResponse
     * @throws Exception
     */
    public function update()
    {
        if (empty($this->customerId)) {
            throw new Exception('customerId cannot be empty.');
        }
        $this->setApiController(self::LEAD_END_POINT);
        $data = $this->buildRequest($this);

        return $this->sendPutRequest($data);
    }

    /**
     * Get lead source
     * @return RebillyResponse
     * @throws Exception
     */
    public function retrieve()
    {
        if (empty($this->customerId)) {
            throw new Exception('customerId cannot be empty.');
        }
        $this->setApiController(self::LEAD_END_POINT);

        return $this->sendGetRequest();
    }

    /**
     * List all lead source per customer
     * @return RebillyResponse
     * @throws Exception
     */
    public function listByCustomer()
    {
        if (empty($this->customerId)) {
            throw new Exception('customerId cannot be empty.');
        }
        $this->setApiController(self::CUSTOMER_END_POINT . $this->customerId . '/' . self::LEAD_END_POINT);

        return $this->sendGetRequest();
    }

    /**
     * List all lead source
     * @return RebillyResponse
     */
    public function listAll()
    {
        $this->setApiController(self::LEAD_END_POINT);

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
