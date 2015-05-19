<?php
/**
 * Interface RebillyHttpClient.
 */
interface RebillyHttpClient
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
     * @param RebillyRequest $request the request object
     *
     * @return RebillyResponse $response response back from Rebilly
     */
    public function sendRequest(RebillyRequest $request);
}
