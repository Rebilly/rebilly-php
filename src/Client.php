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
use Rebilly\Middleware\LogHandler;
use Rebilly\Rest\File;
use RuntimeException;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface as Logger;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use GuzzleHttp\Psr7\Uri as GuzzleUri;

/**
 * Class Client.
 *
 * This class implements a queue of middleware, which can be attached using the `attach()` method,
 * and is itself middleware.
 *
 * @see Client::createRequest()
 * @see Client::createResponse()
 *
 * Magic facades for HTTP methods:
 *
 * @see Client::__call()
 * @see Client::send()
 *
 * @method mixed get($path, $params = [], $headers = [])
 * @method void head($path, $params = [], $headers = [])
 * @method mixed post($payload, $path, $params = [], $headers = [])
 * @method mixed put($payload, $path, $params = [], $headers = [])
 * @method void delete($path, $params = [], $headers = [])
 *
 * Magic methods for services factories:
 *
 * @see Client::__call()
 * @see Client::service()
 *
 * @method Services\AuthenticationOptionsService authenticationOptions()
 * @method Services\AuthenticationTokenService authenticationTokens()
 * @method Services\BankAccountService bankAccounts()
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
 * @method Services\PayPalAccountService payPalAccounts()
 * @method Services\PlanService plans()
 * @method Services\ResetPasswordTokenService resetPasswordTokens()
 * @method Services\SubscriptionService subscriptions()
 * @method Services\TransactionService transactions()
 * @method Services\WebsiteService websites()
 * @method Services\NoteService notes()
 * @method Services\OrganizationService organizations()
 * @method Services\CustomFieldService customFields()
 * @method Services\GatewayAccountService gatewayAccounts()
 * @method Services\SessionService sessions()
 * @method Services\UserService users()
 * @method Services\ThreeDSecureService threeDSecure()
 * @method Services\SubscriptionTrackingService subscriptionTracking()
 * @method Services\ApiTrackingService apiTracking()
 * @method Services\ShippingZoneService shippingZones()
 * @method Services\SchedulePaymentService scheduledPayments()
 * @method Services\ApiKeyService apiKeys()
 * @method Services\CheckoutPageService checkoutPages()
 * @method Services\DisputeService disputes()
 * @method Services\PaymentCardMigrationsService paymentCardMigrations()
 * @method Services\FileService files()
 * @method Services\AttachmentService attachments()
 * @method Services\ProductService products()
 * @method Services\CouponService coupons()
 * @method Services\RedemptionService couponsRedemptions()
 * @method Services\WebhooksService webhooks()
 * @method Services\ValuesListService lists()
 * @method Services\ValuesListTrackingService listsTracking()
 * @method Services\WebhookTrackingService webhooksTracking()
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Client
{
    const BASE_HOST = 'https://api.rebilly.com';
    const SANDBOX_HOST = 'https://api-sandbox.rebilly.com';
    const CURRENT_VERSION = 'v2.1';
    const SDK_VERSION = '2.0.7';

    private static $services = [
        'authenticationOptions' => Services\AuthenticationOptionsService::class,
        'authenticationTokens' => Services\AuthenticationTokenService::class,
        'bankAccounts' => Services\BankAccountService::class,
        'blacklists' => Services\BlacklistService::class,
        'contacts' => Services\ContactService::class,
        'customerCredentials' => Services\CustomerCredentialService::class,
        'customers' => Services\CustomerService::class,
        'invoiceItems' => Services\InvoiceItemService::class,
        'invoices' => Services\InvoiceService::class,
        'layouts' => Services\LayoutService::class,
        'leadSources' => Services\LeadSourceService::class,
        'paymentCards' => Services\PaymentCardService::class,
        'paymentCardTokens' => Services\PaymentCardTokenService::class,
        'payments' => Services\PaymentService::class,
        'payPalAccounts' => Services\PayPalAccountService::class,
        'scheduledPayments' => Services\SchedulePaymentService::class,
        'plans' => Services\PlanService::class,
        'resetPasswordTokens' => Services\ResetPasswordTokenService::class,
        'subscriptions' => Services\SubscriptionService::class,
        'transactions' => Services\TransactionService::class,
        'websites' => Services\WebsiteService::class,
        'files' => Services\FileService::class,
        'attachments' => Services\AttachmentService::class,
        'products' => Services\ProductService::class,
        'notes' => Services\NoteService::class,
        'organizations' => Services\OrganizationService::class,
        'customFields' => Services\CustomFieldService::class,
        'gatewayAccounts' => Services\GatewayAccountService::class,
        'sessions' => Services\SessionService::class,
        'users' => Services\UserService::class,
        'threeDSecure' => Services\ThreeDSecureService::class,
        'subscriptionTracking' => Services\SubscriptionTrackingService::class,
        'apiTracking' => Services\ApiTrackingService::class,
        'apiKeys' => Services\ApiKeyService::class,
        'checkoutPages' => Services\CheckoutPageService::class,
        'disputes' => Services\DisputeService::class,
        'paymentCardMigrations' => Services\PaymentCardMigrationsService::class,
        'coupons' => Services\CouponService::class,
        'couponsRedemptions' => Services\RedemptionService::class,
        'webhooks' => Services\WebhooksService::class,
        'lists' => Services\ValuesListService::class,
        'listsTracking' => Services\ValuesListTrackingService::class,
        'shippingZones' => Services\ShippingZoneService::class,
        'webhooksTracking' => Services\WebhookTrackingService::class,
    ];

    /** @var array */
    private $config = [];

    /** @var Middleware */
    private $middleware;

    /** @var Rest\Factory */
    private $factory;

    /** @var Http\HttpHandler */
    private $transport;

    /** @var array */
    private $registry = [];

    /**
     * The client constructor accepts the following options:
     *
     * - apiKey: (callable|string) Specifies the APIKEY used to sign requests.
     *   A callable provider should return APIKEY string.
     * - sessionToken: (callable|string) Specifies the JWT token used to sign requests.
     *   A callable provider should return JWT token string.
     * - baseUrl: (string) The full URI of the webservice. This is only
     *   required when connecting to a custom endpoint (e.g., a tests).
     * - httpHandler: (callable) An HTTP handler is a Closure that accepts a PSR-7 request object
     *   and returns a PSR-7 response object or rejected with an exception.
     * - logger: (Psr\Log\LoggerInterface) A PSR-3 logger object
     * - logOptions: (array) An associative array. See LogHandler documentation to check available options.
     * - middleware: (callable|Middleware) Middleware is code that can take the incoming request,
     *   perform actions based on it, and pass delegation on to the HTTP handler.
     *   Also can take the response from HTTP handler and perform actions on it.
     *
     * @see ApiKeyProvider
     *
     * @param array $options
     *
     * @throws RuntimeException
     */
    public function __construct(array $options)
    {
        extract($options, EXTR_SKIP);

        if (isset($apiKey)) {
            $authentication = new Middleware\ApiKeyAuthentication(
                is_callable($apiKey) ? call_user_func($apiKey) : $apiKey
            );
        } elseif (isset($sessionToken)) {
            $authentication = new Middleware\BearerAuthentication(
                is_callable($sessionToken) ? call_user_func($sessionToken) : $sessionToken
            );
        } else {
            $authentication = null;
        }

        if (isset($baseUrl)) {
            $baseUrl = ltrim($baseUrl, '/');
        } else {
            $baseUrl = Client::BASE_HOST;
        }

        if (!isset($httpHandler)) {
            $httpHandler = new CurlHandler([CURLOPT_FOLLOWLOCATION => false]);
        } elseif (!is_callable($httpHandler)) {
            throw new RuntimeException('HTTP handler should be callable');
        }

        if (!isset($logger)) {
            $logger = null;
        } elseif ($logger instanceof Logger) {
            $logger = new LogHandler($logger, isset($logOptions) ? (array) $logOptions : []);
        } else {
            throw new RuntimeException('Logger should implement PSR-3 LoggerInterface');
        }

        if (!isset($middleware)) {
            $middleware = null;
        } elseif (!is_callable($middleware)) {
            throw new RuntimeException('Middleware should be callable');
        }

        $this->config = compact(
            'apiKey',
            'sessionToken',
            'baseUrl',
            'httpHandler',
            'logger',
            'logOptions',
            'middleware'
        );

        // HTTP transport
        $this->transport = $httpHandler;

        // Objects factory, often depends by version
        $this->factory = new Rest\Factory(new Entities\Schema());

        // Prepare middleware stack
        $this->middleware = new Middleware\CompositeMiddleware(
            new Middleware\BaseUri($this->createUri($baseUrl . '/' . Client::CURRENT_VERSION)),
            new Middleware\UserAgent(self::SDK_VERSION),
            $authentication,
            $middleware,
            $logger
        );
    }

    /********************************************************************************
     * PSR-0 Autoloader
     *
     * Do not use if you are using Composer to autoload dependencies.
     *******************************************************************************/

    /**
     * PSR-0 autoloader
     *
     * @param string $class
     */
    public static function autoload($class)
    {
        $class = ltrim($class, '\\');

        if (strpos($class, __NAMESPACE__) === 0) {
            $lastNsPos = strripos($class, '\\');

            $namespace = substr($class, 0, $lastNsPos + 1);
            $namespace = substr($namespace, strlen(__NAMESPACE__));
            $namespace = str_replace('\\', DIRECTORY_SEPARATOR, $namespace);

            $class = substr($class, $lastNsPos + 1);
            $class = str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';

            $filename = __DIR__ . $namespace . $class;

            if (file_exists($filename)) {
                require $filename;
            }
        }
    }

    /**
     * Register PSR-0 autoloader
     */
    public static function registerAutoloader()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    /**
     * Unregister PSR-0 autoloader
     */
    public static function unregisterAutoloader()
    {
        spl_autoload_unregister([__CLASS__, 'autoload']);
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
        $result = call_user_func($this->transport, $request);

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
            // Expect this kind of exceptions
        }

        throw new BadMethodCallException(sprintf('Call unknown method %s::%s', __CLASS__, $name));
    }

    /**
     * @param string $name
     *
     * @return Rest\Service
     */
    private function service($name)
    {
        if (!isset($this->registry[$name])) {
            if (isset(self::$services[$name])) {
                $this->registry[$name] = new self::$services[$name]($this);
            } else {
                throw new InvalidArgumentException(sprintf('Service %s does not implement', $name));
            }
        }

        return $this->registry[$name];
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
    public function send($method, $payload, $path, $params = [], array $headers = [])
    {
        if (!is_array($params)) {
            $params = (array) $params;
        }

        $data = json_encode($payload, JSON_FORCE_OBJECT);
        if ($data === false) {
            $data = $payload;
        }

        $headers['Content-Type'] = 'application/json';

        // Prepare request and response objects
        $uri = $this->createUri($path, $params);
        $request = $this->createRequest($method, $uri, $data, $headers);
        $response = $this->createResponse();

        /**
         * @var Response $response Call self middleware to send request and receive response
         */
        $response = call_user_func($this->middleware, $request, $response, $this);

        if ($response->getStatusCode() === 404) {
            throw new Http\Exception\NotFoundException();
        }

        if ($response->getStatusCode() === 410) {
            throw new Http\Exception\GoneException();
        }

        if ($response->getStatusCode() === 422) {
            $content = json_decode($response->getBody()->getContents(), true);
            $content = isset($content['details']) ? $content['details'] : [];
            throw new Http\Exception\UnprocessableEntityException($content);
        }

        if ($response->getStatusCode() === 429) {
            throw new Http\Exception\TooManyRequestsException(
                $response->getHeaderLine('Retry-After'),
                $response->getHeaderLine('Rate-Limit-Limit'),
                'Too many requests, retry after ' . $response->getHeaderLine('Retry-After')
            );
        }

        if ($response->getStatusCode() >= 500) {
            throw new Http\Exception\ServerException(
                $response->getStatusCode(),
                $response->getReasonPhrase()
            );
        }

        if ($response->getStatusCode() >= 400) {
            throw new Http\Exception\ClientException(
                $response->getStatusCode(),
                $response->getReasonPhrase()
            );
        }

        if (in_array($request->getMethod(), ['HEAD', 'DELETE'])) {
            return null;
        }

        if ($response->getStatusCode() === 204) {
            return null;
        }

        $responseParsers = [
            'application/json' => [$this, 'parseJsonResponseBody'],
            'application/pdf' => [$this, 'parseBinaryResponseBody'],
        ];

        $mediaTypePattern = '/^([a-z0-9]+\/[a-z0-9]+).*/i';

        if (preg_match($mediaTypePattern, $response->getHeaderLine('Content-Type'), $matches)) {
            $contentType = strtolower($matches[1]);
        } else {
            $contentType = 'application/json';
        }

        if (!isset($responseParsers[$contentType])) {
            throw new InvalidArgumentException(sprintf('Unsupported "%s" response', $contentType));
        }

        return call_user_func($responseParsers[$contentType], $request, $response, $contentType);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param string $type
     *
     * @return mixed
     */
    protected function parseJsonResponseBody(Request $request, Response $response, $type)
    {
        // Find resource type (URL) in response location or request url
        $location = $response->hasHeader('Location')
            ? $this->createUri($response->getHeaderLine('Location'))
            : $request->getUri();

        $uri = urldecode($location->getPath());

        // Remove version from URI
        $uri = preg_replace('#^/' . self::CURRENT_VERSION . '#', '', $uri);

        // Unserialize response body
        $content = json_decode((string) $response->getBody(), true) ?: [];

        // Build expected resource
        $resource = $this->factory->create($uri, []);

        if ($resource instanceof Rest\Collection) {
            $content = [
                'data' => $content,
                '_metadata' => [
                    'uri' => $uri,
                    'limit' => (int) $response->getHeaderLine('Pagination-Limit'),
                    'offset' => (int) $response->getHeaderLine('Pagination-Offset'),
                    'total' => (int) $response->getHeaderLine('Pagination-Total'),
                ],
            ];
        } else {
            $content['_metadata'] = [
                'uri' => $uri,
            ];
        }

        $resource->populate($content);

        return $resource;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param string $type
     *
     * @return File
     */
    protected function parseBinaryResponseBody(Request $request, Response $response, $type)
    {
        $body = $response->getBody();

        return new File($type, (string) $body, $body->getSize());
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
        if ($uri instanceof GuzzleUri) {
            if (!empty($params)) {
                $uri = $uri->withQuery(http_build_query($params));
            }

            return $uri;
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

    /**
     * Returns a client option.
     *
     * @param string $name
     *
     * @return mixed|null
     */
    public function getOption($name)
    {
        return isset($this->config[$name]) ? $this->config[$name] : null;
    }
}
