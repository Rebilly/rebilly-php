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

namespace Rebilly\Rest;

use Rebilly\Client;

/**
 * Class Service
 *
 */
abstract class Service
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Constructor
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    final protected function client()
    {
        return $this->client;
    }
}
