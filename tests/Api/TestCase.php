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

namespace Rebilly\Tests\Api;

use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class TestCase.
 *
 */
abstract class TestCase extends BaseTestCase
{
    /** @var Client */
    private $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        if (!getenv(ApiKeyProvider::ENV_APIKEY)) {
            $this->markTestSkipped();
        } else {
            $this->client = new Client(
                [
                    'apiKey' => ApiKeyProvider::env(),
                    'baseUrl' => Client::SANDBOX_HOST,
                    'httpHandler' => null,
                ]
            );
        }
    }

    /**
     * @return Client
     */
    final public function getClient()
    {
        return $this->client;
    }
}
