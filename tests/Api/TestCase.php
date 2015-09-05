<?php
/**
 * This file is part of Rebilly.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Tests\Api;

use Rebilly\ApiKeyProvider;
use Rebilly\Client;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class TestCase.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 */
abstract class TestCase extends BaseTestCase
{
    /** @var Client */
    private $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();


        if (!getenv(ApiKeyProvider::ENV_APIKEY)) {
            $this->markTestSkipped();
        } else {
            $this->client = new Client([
                'apiKey' => ApiKeyProvider::env(),
                'baseUrl' => Client::SANDBOX_HOST,
                'httpHandler' => null,
            ]);
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
