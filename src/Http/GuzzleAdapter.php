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

namespace Rebilly\Http;

use GuzzleHttp\ClientInterface as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Psr\Http\Message\RequestInterface as Request;

/**
 * Class GuzzleAdapter.
 *
 */
final class GuzzleAdapter implements HttpHandler
{
    /** @var GuzzleClient */
    private $wrappedClient;

    /**
     * Create new adapter.
     *
     * @param GuzzleClient $guzzle
     */
    public function __construct(GuzzleClient $guzzle)
    {
        $this->wrappedClient = $guzzle;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(Request $request)
    {
        try {
            $response = $this->wrappedClient->send($request);

            return $response;
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if (!isset($response)) {
                /*
                 * TODO: Decide kind of response
                 *
                 * 100 / CONTINUE - The client SHOULD continue with its request
                 * 444 / NO RESPONSE - The server returns no information to the client and closes the connection
                */
                $response = new GuzzleResponse(444);
            }

            return $response;
        }
    }
}
