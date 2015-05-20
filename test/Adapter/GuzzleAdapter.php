<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) Veaceslav Medvedev <slavcopost@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Test\Adapter;

use GuzzleHttp\Client;
use GuzzleHttp\Stream\Stream;
use Rebilly\HttpClient\HttpClient;
use RebillyRequest as Request;
use RebillyResponse as Response;

/**
 * Class GuzzleAdapter.
 *
 * @author Veaceslav Medvedev <slavcopost@gmail.com>
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

        $guzzleResponse = $this->client->send($guzzleRequest);

        $response = new Response(
            $guzzleResponse->getStatusCode(),
            (string) $guzzleResponse->getBody()
        );

        $response->prepareResponse();

        return $response;
    }
}
