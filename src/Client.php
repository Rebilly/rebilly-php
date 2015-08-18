<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly;

use ArrayObject;
use BadMethodCallException;
use Rebilly\Http\CurlHandler;
// use Rebilly\Middleware\Mock;
use RuntimeException;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use GuzzleHttp\Psr7\Uri as GuzzleUri;

/**
 * Class Client.
 *
 * This class implements a queue of middleware, which can be attached using the `attach()` method,
 * and is itself middleware.
 *
 * TODO: Decide use 3rd party implementation of PSR-7 or to include in the library
 *
 * @see Client::createRequest()
 * @see Client::createResponse()
 *
 * Magic facades for HTTP methods:
 *
 * @see Client::__call()
 * @see Client::send()
 * @see Client::service()
 *
 * @method mixed get($path, $params = [], $headers = [])
 * @method void head($path, $params = [], $headers = [])
 * @method mixed post($payload, $path, $params = [], $headers = [])
 * @method mixed put($payload, $path, $params = [], $headers = [])
 * @method void delete($path, $params = [], $headers = [])
 *
 * @method Services\AuthenticationOptionsService authenticationOptions()
 * @method Services\AuthenticationTokenService authenticationToken()
 * @method Services\BlacklistService blacklists()
 * @method Services\ContactService contacts()
 * @method Services\CustomerCredentialService customerCredentials()
 * @method Services\CustomerService customers()
 * @method Services\InvoiceItemService invoiceItems()
 * @method Services\InvoiceService invoices()
 * @method Services\LayoutService layouts()
 * @method Services\LeadSourceService leadSources()
 * @method Services\PaymentCardService paymentCards()
 * @method Services\PaymentCardTokenService paymentCardTokens()
 * @method Services\PaymentService payments()
 * @method Services\PlanService plans()
 * @method Services\ResetPasswordTokenService resetPasswordTokens()
 * @method Services\SubscriptionService subscriptions()
 * @method Services\TransactionService transactions()
 * @method Services\WebsiteService websites()
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Client
{
    const BASE_HOST = 'https://api.rebilly.com';
    const SANDBOX_HOST = 'https://api-sandbox.rebilly.com';
    const CURRENT_VERSION = 'v2.1';

    /** @var Configuration */
    private $config;

    /** @var Middleware */
    private $middleware;

    /** @var Resource\Factory */
    private $factory;

    /** @var Http\HttpHandler */
    private $transport;

    /** @var array */
    private $services = [];

    /**
     * Constructor
     *
     * @param array|ArrayObject $options
     */
    public function __construct($options)
    {
        if (!($options instanceof Configuration)) {
            $options = new Configuration($options);
        }

        if ($options->getApiKey() === null) {
            throw new RuntimeException('Missed API Key');
        }

        if ($options->getBaseUrl() === null) {
            $options->setBaseUrl(Client::BASE_HOST);
        }

        if ($options->getHttpHandler() === null) {
            $options->setHttpHandler(new CurlHandler([CURLOPT_FOLLOWLOCATION => false]));
        }

        $this->config = $options;

        // HTTP transport
        $this->transport = $options->getHttpHandler();

        // Objects factory, often depends by version
        $this->factory = new Resource\Factory(new Entities\Schema());

        $this->middleware = new Middleware\CompositeMiddleware();

        // Prepare middleware stack
        $this->middleware->attach(
            new Middleware\BaseUri($this->createUri($options->getBaseUrl() . '/' . Client::CURRENT_VERSION))
        );
        $this->middleware->attach(new Middleware\ApiKeyAuthentication($options->getApiKey()));

        /*
         * TODO: Implement more middleware
         *
         * $this->middleware->attach(new HttpCache(Psr\Cache\CacheItemPoolInterface $pool));
         * $this->middleware->attach(new Logger(Psr\Log\LoggerInterface $writer));
         * $this->middleware->attach(new History($max = 5));
         * $this->middleware->attach(new Debug($debug = true));
         */
    }

    /********************************************************************************
     * PSR-0 Autoloader
     *
     * Do not use if you are using Composer to autoload dependencies.
     *******************************************************************************/

    /**
     * PSR-0 autoloader
     *
     * @param string $className
     */
    public static function autoload($className)
    {
        $thisClass = str_replace(__NAMESPACE__ . '\\', '', __CLASS__);
        $baseDir = __DIR__;

        if (substr($baseDir, -strlen($thisClass)) === $thisClass) {
            $baseDir = substr($baseDir, 0, -strlen($thisClass));
        }

        $className = ltrim($className, '\\');
        $fileName = $baseDir;

        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }

        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        if (file_exists($fileName)) {
            require $fileName;
        }
    }

    /**
     * Register PSR-0 autoloader
     */
    public static function registerAutoloader()
    {
        spl_autoload_register(__CLASS__ . "::autoload");
    }

    /********************************************************************************
     * This class is a final middleware
     *******************************************************************************/

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response)
    {
        $result = $this->transport->send($request);

        return $result instanceof Response ? $result : $response;
    }

    /**
     * Magic methods support.
     *
     * @see Client::send()
     *
     * @param string $name
     * @param array $arguments
     *
     * @throws RuntimeException
     * @throws BadMethodCallException
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        switch (strtoupper($name)) {
            case 'HEAD':
            case 'GET':
            case 'DELETE':
                array_unshift($arguments, null);
                array_unshift($arguments, $name);
                return call_user_func_array([$this, 'send'], $arguments);
            case 'POST':
            case 'PUT':
                array_unshift($arguments, $name);
                return call_user_func_array([$this, 'send'], $arguments);
        }

        try {
            return $this->service(lcfirst($name));
        } catch (InvalidArgumentException $e) {
            throw new BadMethodCallException(sprintf('Call unknown method %s::%s', __CLASS__, $name));
        }
    }

    /**
     * @param string $name
     *
     * @return Resource\Service
     */
    private function service($name)
    {
        if (!isset($this->services[$name])) {
            switch ($name) {
                case 'authenticationOptions':
                    $service = Services\AuthenticationOptionsService::class;
                    break;
                case 'authenticationToken':
                    $service = Services\AuthenticationTokenService::class;
                    break;
                case 'blacklists':
                    $service = Services\BlacklistService::class;
                    break;
                case 'contacts':
                    $service = Services\ContactService::class;
                    break;
                case 'customerCredentials':
                    $service = Services\CustomerCredentialService::class;
                    break;
                case 'customers':
                    $service = Services\CustomerService::class;
                    break;
                case 'invoiceItems':
                    $service = Services\InvoiceItemService::class;
                    break;
                case 'invoices':
                    $service = Services\InvoiceService::class;
                    break;
                case 'layouts':
                    $service = Services\LayoutService::class;
                    break;
                case 'leadSources':
                    $service = Services\LeadSourceService::class;
                    break;
                case 'paymentCards':
                    $service = Services\PaymentCardService::class;
                    break;
                case 'paymentCardTokens':
                    $service = Services\PaymentCardTokenService::class;
                    break;
                case 'payments':
                    $service = Services\PaymentService::class;
                    break;
                case 'plans':
                    $service = Services\PlanService::class;
                    break;
                case 'resetPasswordTokens':
                    $service = Services\ResetPasswordTokenService::class;
                    break;
                case 'subscriptions':
                    $service = Services\SubscriptionService::class;
                    break;
                case 'transactions':
                    $service = Services\TransactionService::class;
                    break;
                case 'websites':
                    $service = Services\WebsiteService::class;
                    break;
                default:
                    throw new InvalidArgumentException(sprintf('Service %s does not implement', $name));

            }

            $this->services[$name] = new $service($this);
        }

        return $this->services[$name];
    }

    /**
     * Send request.
     *
     * @param string $method The request method.
     * @param mixed $payload The request body.
     * @param string $path The URL path or URL Template
     * @param array|ArrayObject $params The URL parameters. Parameters used for URL template or encode to query string.
     * @param array $headers The headers specific for request.
     *
     * @throws Http\Exception\ServerException
     * @throws Http\Exception\ClientException
     *
     * @return mixed|null The resulting resource or null
     */
    private function send($method, $payload, $path, $params = [], array $headers = [])
    {
        if (!is_array($params)) {
            $params = (array) $params;
        }

        // Serialize $payload
        $payload = json_encode($payload, JSON_FORCE_OBJECT);

        $headers['Content-Type'] = 'application/json';

        // Prepare request and response objects
        $uri = $this->createUri($path, $params);
        $request = $this->createRequest($method, $uri, $payload, $headers);
        $response = $this->createResponse();

        /**
         * @var Response $response Call self middleware to send request and receive response
         */
        $response = call_user_func($this->middleware, $request, $response, $this);

        switch (true) {
            case $response->getStatusCode() === 404:
                throw new Http\Exception\NotFoundException();
            case $response->getStatusCode() === 410:
                throw new Http\Exception\GoneException();
            case $response->getStatusCode() === 422:
                $content = json_decode($response->getBody()->getContents(), true);
                $content = isset($content['details']) ? $content['details'] : [];

                throw new Http\Exception\UnprocessableEntityException($content);
            case $response->getStatusCode() >= 500:
                throw new Http\Exception\ServerException(
                    $response->getStatusCode(),
                    $response->getReasonPhrase()
                );
            case $response->getStatusCode() >= 400:
                throw new Http\Exception\ClientException(
                    $response->getStatusCode(),
                    $response->getReasonPhrase()
                );
        }

        if (in_array($request->getMethod(), ['HEAD', 'DELETE'])) {
            return null;
        }

        // Find resource type (URL) in response location or request url
        $location = $response->hasHeader('Location')
            ? $this->createUri($response->getHeaderLine('Location'))
            : $request->getUri();

        $uri = $location->getPath();

        // Unserialize response body
        $content = json_decode($response->getBody()->getContents(), true);

        // Build expected resource
        $resource = $this->factory->create($uri, $content);

        return $resource;
    }

    /**
     * Factory method to create a new Request object.
     *
     * @param string $method
     * @param mixed $uri
     * @param mixed $payload
     * @param array $headers
     *
     * @return Request
     */
    public function createRequest($method, $uri, $payload, array $headers = [])
    {
        return new GuzzleRequest($method, $uri, $headers, $payload);
    }

    /**
     * Factory method to create a new Response object.
     *
     * @return Response
     */
    public function createResponse()
    {
        return new GuzzleResponse();
    }

    /**
     * Factory method to create a new Uri object.
     *
     * @param string $uri
     * @param array $params
     *
     * @return GuzzleUri
     */
    public function createUri($uri, array $params = [])
    {
        if ($uri instanceof GuzzleUri && !empty($params)) {
            return $uri->withQuery(http_build_query($params));
        }

        // If URL template given, prepare URI
        if (preg_match_all('/{[\w]+}/i', $uri, $matches)) {
            foreach (array_unique($matches[0]) as $match) {
                $param = substr($match, 1, -1);

                if (isset($params[$param])) {
                    $uri = str_replace($match, $params[$param], $uri);
                    unset($params[$param]);
                }
            }
        }

        if (!empty($params)) {
            $uri .= '?' . http_build_query($params);
        }

        return new GuzzleUri($uri);
    }
}
