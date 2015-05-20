<?php
/**
 * This file is part of PHP Rebilly API.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Test;

use Exception;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Subscriber\History;
use PHPUnit_Framework_TestCase as AbstractTestCase;
use Rebilly\Test\Adapter\GuzzleAdapter;

/**
 * Class TestCase.
 *
 * @author Veaceslav Medvedev <slavcopost@gmail.com>
 */
class TestCase extends AbstractTestCase
{
    /** @var Client */
    private $client;

    /** @var Mock */
    private $responses;

    /** @var History */
    private $history;

    /** @var GuzzleAdapter */
    private $adapter;

    /**
     * @return Client
     */
    public function http()
    {
        if ($this->client === null) {
            $this->client = new Client();

            $this->responses = new Mock();
            $this->http()->getEmitter()->attach($this->responses);

            $this->history = new History();
            $this->http()->getEmitter()->attach($this->history);
        }

        return $this->client;
    }

    /**
     * @return Mock
     */
    public function server()
    {
        $this->http();
        return $this->responses;
    }

    /**
     * @return History
     */
    public function history()
    {
        $this->http();
        return $this->history;
    }

    /**
     * @return GuzzleAdapter
     */
    public function adapter()
    {
        if ($this->adapter === null) {
            $this->adapter = new GuzzleAdapter($this->http());
        }
        return $this->adapter;
    }

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();

        $annotations = $this->getAnnotations();

        if (isset($annotations['method']['expectedResponseStatus'])) {
            $status = reset($annotations['method']['expectedResponseStatus']);
        } else {
            $status = 200;
        }

        if (isset($annotations['method']['expectedResponseJson'])) {
            foreach ($annotations['method']['expectedResponseJson'] as $methodName) {
                if (!method_exists($this, $methodName)) {
                    throw new Exception('Invalid mock response provider');
                }

                $json = call_user_func([$this, $methodName]);
                $response = new Response($status, [], Stream::factory(json_encode($json)));

                $this->server()->addResponse($response);
            }
        }
    }
}
