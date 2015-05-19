<?php
/**
 * This file is part of Rebilly.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\HttpClient;

use RebillyRequest as Request;
use RebillyResponse as Response;

/**
 * Interface HttpClientAdapter.
 */
interface HttpClientAdapter
{
    /**
     * Verb GET method.
     */
    const METHOD_GET = 'GET';

    /**
     * Verb POST method.
     */
    const METHOD_POST = 'POST';

    /**
     * Verb PUT method.
     */
    const METHOD_PUT = 'PUT';

    /**
     * Verb DELETE method.
     */
    const METHOD_DELETE = 'DELETE';

    /**
     * Sends request to Rebilly API, and returns prepared response.
     *
     * @param Request $request the request object
     *
     * @return Response $response response back from Rebilly
     */
    public function sendRequest(Request $request);
}
