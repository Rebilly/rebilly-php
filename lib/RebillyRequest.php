<?php

/**
 * Class RebillyRequest
 */
abstract class RebillyRequest
{
    /**
     * Verb GET method
     */
    const METHOD_GET = 'GET';

    /**
     * Verb POST method
     */
    const METHOD_POST = 'POST';

    /**
     * Verb PUT method
     */
    const METHOD_PUT = 'PUT';

    /**
     * Verb DELETE method
     */
    const METHOD_DELETE = 'DELETE';

    /**
     * string environment
     */
    const ENV_SANDBOX    = 'sandbox';
    const ENV_PRODUCTION = 'live';
    const ENV_LIVE       = 'live';
    /**
     * @var array Key is the constant representing the environment and value is the base api endpoint url.
     */
    private $urls = array(
        self::ENV_SANDBOX => 'https://api-sandbox.rebilly.com/v2/',
        self::ENV_LIVE    => 'https://api.rebilly.com/v2/',
    );

    /**
     * @var string the environment relates to the endpoint - it defaults to development environment.
     */
    private $environment = self::ENV_SANDBOX;
    private $controller;
    private $request;

    /**
     * @var string Rebilly base API URL
     */
    private $apiUrl;

    /**
     * @var string unique key for each user to call Rebilly API
     */
    private $apiKey;

    abstract public function getPublicProperties($class);

    /**
     * Set api key
     * @param string $key
     */
    public function setApiKey($key)
    {
        $this->apiKey = $key;
    }

    /**
     * Set environment
     * @param string $env
     */
    public function setEnvironment($env)
    {
        $this->environment = $env;
    }

    /**
     * Set controller
     * @param $controller
     */
    public function setApiController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * Get URL
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * Set API url
     * @param $url
     */
    public function setApiUrl($url)
    {
        $this->apiUrl = $url;
    }

    /**
     * @return string json encoded request body after buildRequest($object) is called
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set attributes
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
     * Send a GET request
     * @return array response back from Rebilly
     */
    public function sendGetRequest()
    {
        return $this->sendRequest(self::METHOD_GET);
    }

    /**
     * Send a POST request
     * @param array $data data need to be sent to Rebilly
     * @return array response back from Rebilly
     */
    public function sendPostRequest($data)
    {
        return $this->sendRequest(self::METHOD_POST, $data);
    }

    /**
     * Send a PUT request
     * @param array $data data need to be sent to Rebilly
     * @return array response back from Rebilly
     */
    public function sendPutRequest($data)
    {
        return $this->sendRequest(self::METHOD_PUT, $data);
    }

    /**
     * Send a DELETE request
     * @param array $data data need to be sent to Rebilly
     * @return array response back from Rebilly
     */
    public function sendDeleteRequest($data)
    {
        return $this->sendRequest(self::METHOD_DELETE, $data);
    }

    /**
     * Sends request to Rebilly API, and returns prepared response.
     *
     * @param string $verb specific method for the request
     * @param string|null $data data need to be sent for POST or PUT requests body
     * @return array $response response back from Rebilly
     */
    private function sendRequest($verb, $data = null)
    {
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'REB-APIKEY:' . $this->apiKey,
        );

        if ($this->environment === null || !array_key_exists($this->environment, $this->urls)) {
            throw new Exception('Please set the correct environment.');
        }

        if (!isset($this->apiUrl)) {
            $this->apiUrl = $this->urls[$this->environment];
        }
        $this->apiUrl = $this->apiUrl . $this->controller;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_TIMEOUT, 100);

        switch ($verb) {
            case self::METHOD_GET:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::METHOD_GET);
                break;
            case self::METHOD_POST:
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
            case self::METHOD_PUT:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::METHOD_PUT);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
            case self::METHOD_DELETE:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::METHOD_DELETE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                break;
        }
        $response = curl_exec($ch);

        if ($response === false) {
            $errorNumber = curl_errno($ch);
            $this->handleError($errorNumber);
            curl_close($ch);
        }

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $rebillyResponse = new RebillyResponse($statusCode, $response);
        $rebillyResponse->prepareResponse();

        return $rebillyResponse;
    }

    /**
     * Get object of each class and build array base on the properties.
     * Encode the request in json.
     *
     * @param mixed $object
     * @return string $this->request the json encoded request
     */
    public function buildRequest($object, $asJson = true)
    {
        $data = array();
        $objectArray = is_object($object) ? $this->getPublicProperties($object) : $object;
        foreach ($objectArray as $key => $value) {
            $value = (is_array($value) || is_object($value)) ? $this->buildRequest($value, false) : $value;
            if (!empty($value)) {
                $data[$key] = $value;
            }
        }
        if (!$asJson) {
            return $data;
        }
        $this->request = json_encode($data);

        return $this->request;
    }

    /**
     * curl Error handling
     * @param int $errorNumber curl error code
     */
    private function handleError($errorNumber)
    {
        switch ($errorNumber) {
            case RebillyCurlError::$codes['CURLE_COULDNT_CONNECT'] :
            case RebillyCurlError::$codes['CURLE_COULDNT_RESOLVE_HOST'] :
            case RebillyCurlError::$codes['CURLE_OPERATION_TIMEOUTED'] :
                throw new Exception('Failed connect to Rebilly.');
            default:
                throw new Exception('An unexpected error occurred connecting with Rebilly.');
        }
    }
}
