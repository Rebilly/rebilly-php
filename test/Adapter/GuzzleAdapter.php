<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Test\Adapter;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Stream\Stream;
use Rebilly\HttpClient\HttpClient;
use RebillyRequest as Request;
use RebillyResponse as Response;

/**
 * Class GuzzleAdapter.
 */
final class GuzzleAdapter implements HttpClient
{
    /** @var Client */
    private $client;

    /**
     * Create new adapter.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function sendRequest(Request $request)
    {
        $request->prepareUrl();

        $guzzleRequest = $this->client->createRequest(
            $request->getMethod(),
            $request->getApiUrl(),
            []
        );

        if (in_array($request->getMethod(), [self::METHOD_POST, self::METHOD_PUT, self::METHOD_DELETE])) {
            $guzzleRequest->setBody(Stream::factory($request->getData()));
        }

        try {
            $guzzleResponse = $this->client->send($guzzleRequest);
        } catch (ClientException $e) {
            $guzzleResponse = $e->getResponse();
        }

        $response = new Response(
            $guzzleResponse->getStatusCode(),
            (string) $guzzleResponse->getBody()
        );

        $response->prepareResponse();

        return $response;
    }
}
