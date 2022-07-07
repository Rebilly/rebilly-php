<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

namespace Rebilly;

use ArrayObject;
use BadMethodCallException;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use GuzzleHttp\Psr7\Uri as GuzzleUri;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface as Logger;
use Rebilly\Http\CurlHandler;
use Rebilly\Middleware\LogHandler;
use Rebilly\Rest\File;
use RuntimeException;

/**
 * Class Client.
 *
 * This class implements a queue of middleware, which can be attached using the `attach()` method,
 * and is itself middleware.
 *
 * @see Client::createRequest()
 * @see Client::createResponse()
 *
 * Magic methods for services factories:
 *
 * @see Client::__call()
 * @see Client::service()
 *
 * @method Services\AuthenticationOptionsService authenticationOptions()
 * @method Services\AuthenticationTokenService authenticationTokens()
 * @method Services\BankAccountService bankAccounts()
 * @method Services\BlocklistService blocklists()
 * @method Services\CustomerCredentialService customerCredentials()
 * @method Services\CustomerService customers()
 * @method Services\InvoiceItemService invoiceItems()
 * @method Services\CreditMemoAllocationService creditMemoAllocations()
 * @method Services\InvoiceService invoices()
 * @method Services\CreditMemoService creditMemos()
 * @method Services\PaymentCardService paymentCards()
 * // TODO: Deprecated factory
 * @method Services\PaymentTokenService paymentCardTokens()
 * @method Services\PaymentTokenService paymentTokens()
 * @method Services\PayPalAccountService payPalAccounts()
 * @method Services\PlanService plans()
 * @method Services\ResetPasswordTokenService resetPasswordTokens()
 * @method Services\SubscriptionService subscriptions()
 * @method Services\SubscriptionCancellationService subscriptionCancellations()
 * @method Services\TransactionService transactions()
 * @method Services\PayoutService payouts()
 * @method Services\SubscriptionReactivationService subscriptionReactivations()
 * @method Services\WebsiteService websites()
 * @method Services\OrganizationService organizations()
 * @method Services\CustomFieldService customFields()
 * @method Services\GatewayAccountService gatewayAccounts()
 * @method Services\SessionService sessions()
 * @method Services\UserService users()
 * @method Services\ApiTrackingService apiTracking()
 * @method Services\ShippingRateService shippingRates()
 * @method Services\ApiKeyService apiKeys()
 * @method Services\DisputeService disputes()
 * @method Services\FileService files()
 * @method Services\AttachmentService attachments()
 * @method Services\ProductService products()
 * @method Services\CouponService coupons()
 * @method Services\RedemptionService couponsRedemptions()
 * @method Services\WebhooksService webhooks()
 * @method Services\WebhookCredentialsService webhookCredentials()
 * @method Services\PlaidCredentialsService plaidCredentials()
 * @method Services\ExperianCredentialsService experianCredentials()
 * @method Services\TaxJarCredentialsService taxjarCredentials()
 * @method Services\ValuesListService lists()
 * @method Services\ValuesListTrackingService listsTracking()
 * @method Services\WebhookTrackingService webhooksTracking()
 * @method Services\GatewayAccountDowntimeService gatewayDowntimes()
 * @method Services\GatewayAccountLimitService gatewayLimits()
 * @method Services\KycService kycDocuments()
 * @method Services\RuleService eventRules()
 * @method Services\CustomerTimelineService customerTimeline()
 * @method Services\AmlService aml()
 * @method Services\PaymentInstrumentService paymentInstruments()
 * @method Services\TagService tags()
 */
final class Client
{
    public const BASE_HOST = 'https://api.rebilly.com';

    public const SANDBOX_HOST = 'https://api-sandbox.rebilly.com';

    /**
     * @deprecated We don't use API version in URI anymore.
     */
    public const CURRENT_VERSION = 'v2.1';

    public const SDK_VERSION = '2.19.0';

    private static $services = [
        'authenticationOptions' => Services\AuthenticationOptionsService::class,
        'authenticationTokens' => Services\AuthenticationTokenService::class,
        'bankAccounts' => Services\BankAccountService::class,
        'blocklists' => Services\BlocklistService::class,
        'customerCredentials' => Services\CustomerCredentialService::class,
        'customers' => Services\CustomerService::class,
        'invoiceItems' => Services\InvoiceItemService::class,
        'creditMemoAllocations' => Services\CreditMemoAllocationService::class,
        'invoices' => Services\InvoiceService::class,
        'creditMemos' => Services\CreditMemoService::class,
        'paymentCards' => Services\PaymentCardService::class,
        'paymentCardTokens' => Services\PaymentTokenService::class,
        'paymentTokens' => Services\PaymentTokenService::class,
        'payPalAccounts' => Services\PayPalAccountService::class,
        'plans' => Services\PlanService::class,
        'resetPasswordTokens' => Services\ResetPasswordTokenService::class,
        'subscriptions' => Services\SubscriptionService::class,
        'subscriptionCancellations' => Services\SubscriptionCancellationService::class,
        'transactions' => Services\TransactionService::class,
        'payouts' => Services\PayoutService::class,
        'subscriptionReactivations' => Services\SubscriptionReactivationService::class,
        'websites' => Services\WebsiteService::class,
        'files' => Services\FileService::class,
        'attachments' => Services\AttachmentService::class,
        'products' => Services\ProductService::class,
        'organizations' => Services\OrganizationService::class,
        'customFields' => Services\CustomFieldService::class,
        'gatewayAccounts' => Services\GatewayAccountService::class,
        'sessions' => Services\SessionService::class,
        'users' => Services\UserService::class,
        'apiTracking' => Services\ApiTrackingService::class,
        'apiKeys' => Services\ApiKeyService::class,
        'disputes' => Services\DisputeService::class,
        'coupons' => Services\CouponService::class,
        'couponsRedemptions' => Services\RedemptionService::class,
        'webhooks' => Services\WebhooksService::class,
        'webhookCredentials' => Services\WebhookCredentialsService::class,
        'lists' => Services\ValuesListService::class,
        'listsTracking' => Services\ValuesListTrackingService::class,
        'shippingRates' => Services\ShippingRateService::class,
        'webhooksTracking' => Services\WebhookTrackingService::class,
        'gatewayDowntimes' => Services\GatewayAccountDowntimeService::class,
        'gatewayLimits' => Services\GatewayAccountLimitService::class,
        'kycDocuments' => Services\KycService::class,
        'eventRules' => Services\RuleService::class,
        'customerTimeline' => Services\CustomerTimelineService::class,
        'aml' => Services\AmlService::class,
        'plaidCredentials' => Services\PlaidCredentialsService::class,
        'experianCredentials' => Services\ExperianCredentialsService::class,
        'taxjarCredentials' => Services\TaxJarCredentialsService::class,
        'paymentInstruments' => Services\PaymentInstrumentService::class,
        'tags' => Services\TagService::class,
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
     * - organizationId: (string) Specifies the Organization ID used to receive data from one of the user's organizations.
     *   required when need to receive data from non-default user organization.
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
            $sessionToken = null;
        } elseif (isset($sessionToken)) {
            $authentication = new Middleware\BearerAuthentication(
                is_callable($sessionToken) ? call_user_func($sessionToken) : $sessionToken
            );
            $apiKey = null;
        } else {
            $authentication = null;
            $apiKey = null;
            $sessionToken = null;
        }

        if (isset($baseUrl)) {
            $baseUrl = ltrim($baseUrl, '/');
        } else {
            $baseUrl = self::BASE_HOST;
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

        if (!isset($logOptions)) {
            $logOptions = [];
        }

        if (!isset($middleware)) {
            $middleware = null;
        } elseif (!is_callable($middleware)) {
            throw new RuntimeException('Middleware should be callable');
        }
        $organizationId = $organizationId ?? null;

        $this->config = compact(
            'apiKey',
            'sessionToken',
            'baseUrl',
            'httpHandler',
            'logger',
            'logOptions',
            'middleware',
            'organizationId'
        );

        // HTTP transport
        $this->transport = $httpHandler;

        // Objects factory, often depends by version
        $this->factory = new Rest\Factory(new Entities\Schema());

        // Prepare middleware stack
        $this->middleware = new Middleware\CompositeMiddleware(
            new Middleware\BaseUri($this->createUri($baseUrl), $organizationId),
            new Middleware\UserAgent(self::SDK_VERSION),
            $authentication,
            $middleware,
            $logger
        );
    }

    // This class is a final middleware

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

            throw new Http\Exception\DataValidationException($content ?? []);
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

        if (in_array($request->getMethod(), ['HEAD', 'DELETE'], true)) {
            return null;
        }

        if ($response->getStatusCode() === 204) {
            return null;
        }

        if (
            in_array($response->getStatusCode(), [301, 302, 303], true)
            && $response->hasHeader('Location')
            && empty((string) $response->getBody())
        ) {
            $baseUrl = $this->createUri($this->config['baseUrl']);
            $location = $this->createUri($response->getHeaderLine('Location'));
            if ($baseUrl->getHost() === $location->getHost()) {
                $uri = urldecode($location->getPath());
                $uri = preg_replace('#^/' . self::CURRENT_VERSION . '#', '', $uri);

                return $this->send('GET', null, $uri);
            }
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

    public function head($path, $params = [], array $headers = [])
    {
        return $this->send('HEAD', null, $path, $params, $headers);
    }

    public function get($path, $params = [], array $headers = [])
    {
        return $this->send('GET', null, $path, $params, $headers);
    }

    public function post($payload, $path, $params = [], array $headers = [])
    {
        return $this->send('POST', $payload, $path, $params, $headers);
    }

    public function put($payload, $path, $params = [], array $headers = [])
    {
        return $this->send('PUT', $payload, $path, $params, $headers);
    }

    public function patch($payload, $path, $params = [], array $headers = [])
    {
        return $this->send('PATCH', $payload, $path, $params, $headers);
    }

    public function delete($path, $params = [], array $headers = [])
    {
        return $this->send('DELETE', null, $path, $params, $headers);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param string $type
     *
     * @return mixed
     */
    private function parseJsonResponseBody(Request $request, Response $response, $type)
    {
        // Find resource type (URL) in response location or request url
        $location = $response->hasHeader('Location')
            ? $this->createUri($response->getHeaderLine('Location'))
            : $request->getUri();

        $uri = urldecode($location->getPath());

        // Remove version from URI
        $uri = preg_replace('#^/' . self::CURRENT_VERSION . '#', '', $uri);

        // Remove organization id from URI
        $uri = preg_replace('#^/organizations/[^/]+/(.+)$#', '$1', $uri);

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
    private function parseBinaryResponseBody(Request $request, Response $response, $type)
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
        return $this->config[$name] ?? null;
    }
}
