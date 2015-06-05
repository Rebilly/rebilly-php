<?php

use Rebilly\HttpClient\HttpClient;
use Rebilly\HttpClient\CurlAdapter\CurlAdapter;

/**
 * Class RebillyRequest.
 */
abstract class RebillyRequest
{
    /**
     * String environment.
     */
    const ENV_SANDBOX = 'sandbox';
    const ENV_LIVE = 'live';

    /**
     * @deprecated
     */
    const ENV_PRODUCTION = 'live';

    /**
     * @var array Key is the constant representing the environment and value is the base api endpoint url.
     */
    private $urls = array(
        self::ENV_SANDBOX => 'https://api-sandbox.rebilly.com/v',
        self::ENV_LIVE => 'https://api.rebilly.com/v',
    );

    /**
     * @var string the environment relates to the endpoint - it defaults to development environment.
     */
    private $environment = self::ENV_SANDBOX;

    /** @var string */
    private $controller;

    /** @var string */
    private $requestBody;

    /** @var HttpClient */
    private $clientAdapter;

    /**
     * @var string Rebilly base API URL
     */
    private $apiUrl;

    /**
     * @var string unique key for each user to call Rebilly API
     */
    private $apiKey;

    /** @var float */
    private $apiVersion = 2;

    /**
     * @var array
     */
    private $queryParam;

    /**
     * @var string
     */
    private $method;

    /**
     * @var mixed
     */
    private $data;

    abstract public function getPublicProperties($class);

    /**
     * @return string
     */
    final public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    final public function getData()
    {
        return $this->data;
    }

    /**
     * Get api URL.
     *
     * @param bool $refresh
     *
     * @throws Exception
     *
     * @return string
     */
    final public function prepareUrl($refresh = false)
    {
        if (!isset($this->apiUrl) || $refresh) {
            if ($this->environment === null || !array_key_exists($this->environment, $this->urls)) {
                throw new Exception('Please set the correct environment.');
            }

            $this->apiUrl = $this->urls[$this->environment];
            $this->apiUrl = $this->apiUrl . $this->apiVersion . '/' . $this->controller;

            if (isset($this->queryParam)) {
                $this->apiUrl .= '?' . http_build_query($this->queryParam);
            }
        }
    }

    /**
     * Set api key.
     *
     * @param string $key
     */
    public function setApiKey($key)
    {
        $this->apiKey = $key;
    }

    /**
     * Get api key.
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set environment.
     *
     * @param string $env
     */
    public function setEnvironment($env)
    {
        $this->environment = $env;
    }

    /**
     * Set controller.
     *
     * @param $controller
     */
    public function setApiController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * Get URL.
     *
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * Set API url.
     *
     * @param $url
     */
    public function setApiUrl($url)
    {
        $this->apiUrl = $url;
    }

    /**
     * Set API version.
     *
     * @param $version
     */
    public function setVersion($version)
    {
        $this->apiVersion = $version;
    }

    /**
     * @return string json encoded request body after buildRequest($object) is called
     */
    public function getRequest()
    {
        return $this->requestBody;
    }

    public function setQueryParam(array $param)
    {
        $this->queryParam = $param;
    }

    /**
     * Set attributes.
     *
     * @param array $attributes
     */
    public function setAttributes($attributes)
    {
        if (is_array($attributes)) {
            foreach ($attributes as $key => $value) {
                if (!empty($value)) {
                    $this->{$key} = $value;
                }
            }
        }
    }

    /**
     * Send a GET request.
     *
     * @return RebillyResponse response back from Rebilly
     */
    final public function sendGetRequest()
    {
        $this->method = HttpClient::METHOD_GET;

        return $this->getHttpClient()->sendRequest($this);
    }

    /**
     * Send a POST request.
     *
     * @param array $data data need to be sent to Rebilly
     *
     * @return RebillyResponse response back from Rebilly
     */
    final public function sendPostRequest($data)
    {
        $this->method = HttpClient::METHOD_POST;
        $this->data = $data;

        return $this->getHttpClient()->sendRequest($this);
    }

    /**
     * Send a PUT request.
     *
     * @param array $data data need to be sent to Rebilly
     *
     * @return RebillyResponse response back from Rebilly
     */
    final public function sendPutRequest($data)
    {
        $this->method = HttpClient::METHOD_PUT;
        $this->data = $data;

        return $this->getHttpClient()->sendRequest($this);
    }

    /**
     * Send a DELETE request.
     *
     * @param array $data data need to be sent to Rebilly
     *
     * @return RebillyResponse response back from Rebilly
     */
    final public function sendDeleteRequest($data)
    {
        $this->method = HttpClient::METHOD_DELETE;
        $this->data = $data;

        return $this->getHttpClient()->sendRequest($this);
    }

    /**
     * Send a HEAD request.
     *
     * @return RebillyResponse response back from Rebilly
     */
    final public function sendHeadRequest()
    {
        $this->method = HttpClient::METHOD_HEAD;

        return $this->getHttpClient()->sendRequest($this);
    }

    /**
     * @param HttpClient $adapter
     */
    public function setHttpClient(HttpClient $adapter)
    {
        $this->clientAdapter = $adapter;
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        if ($this->clientAdapter === null) {
            $this->setHttpClient($this->getDefaultHttpClient());
        }
        return $this->clientAdapter;
    }

    /**
     * @return CurlAdapter
     */
    private function getDefaultHttpClient()
    {
        return new CurlAdapter();
    }

    /**
     * Get object of each class and build array base on the properties.
     * Encode the request in json.
     *
     * @param mixed $object
     * @param bool $asJson
     *
     * @return string $this->request the json encoded request
     */
    public function buildRequest($object, $asJson = true)
    {
        $data = array();
        if (is_object($object)) {
            $publicProperties = array();
            // Get all properties of the class and value
            $objectArray = $this->getPublicProperties($object);
            // Get only public properties of the class -- name only
            $reflectionClass = new ReflectionObject($object);
            $properties = $reflectionClass->getProperties(ReflectionProperty::IS_PUBLIC);
            foreach ($properties as $property) {
                $publicProperties[$property->name] = $property->name;
            }
        } else {
            $objectArray = $object;
        }

        foreach ($objectArray as $key => $value) {
            $value = is_object($value) ? $this->buildRequest($value, false) : $value;
            // assign value if it's not empty and is public property
            if (!empty($value) && isset($publicProperties[$key])) {
                $data[$key] = $value;
            }
        }

        if (!$asJson) {
            return $data;
        }
        $this->requestBody = json_encode($data);

        return $this->requestBody;
    }
}
