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

namespace Rebilly\Middleware;

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\StreamInterface as Stream;
use Psr\Log\LoggerInterface as Logger;
use Psr\Log\LogLevel;
use Rebilly\Middleware;
use RuntimeException;

/**
 * Class LogHandler.
 *
 */
final class LogHandler implements Middleware
{
    private static $authHeaders = [
        ApiKeyAuthentication::HEADER => '[TOKEN]',
    ];

    /** @var Logger */
    private $logger;

    /** @var string */
    private $level = LogLevel::INFO;

    /** @var int */
    private $maxStreamSize = 0;

    /** @var bool */
    private $hideAuth = true;

    /** @var callable */
    private $formatter;

    /**
     * The log handler constructor accepts the following options:
     *
     * - level: (string) Logs with an arbitrary level.
     * - maxStreamSize: (int) Maximum streams bytes allowed to log.
     * - hideAuth: (bool) Whether should hide the Authentication data.
     * - formatter: (callable) The callback function that take the request
     *   and response and prepare log message.
     *
     * @param Logger $logger
     * @param array $options
     *
     * @throws RuntimeException
     */
    public function __construct(Logger $logger, array $options = [])
    {
        $this->logger = $logger;

        if (isset($options['level'])) {
            $this->level = $options['level'];
        }

        if (isset($options['maxStreamSize'])) {
            $this->maxStreamSize = (int) $options['maxStreamSize'];
        }

        if (isset($options['hideAuth'])) {
            $this->hideAuth = (bool) $options['hideAuth'];
        }

        if (!isset($options['formatter'])) {
            $this->formatter = function (Request $request, Response $response) {
                $lines = [
                    '-> Request',
                    'Hash: ' . spl_object_hash($request),
                    'Url: ' . (string) $request->getUri(),
                    'Method: ' . $request->getMethod(),
                    'Headers:',
                    $this->dumpHeaders($request->getHeaders()),
                    'Body:',
                    $this->dumpStream($request->getBody()),
                    '-> Response',
                    'Hash: ' . spl_object_hash($response),
                    'Status Code: ' . $response->getStatusCode(),
                    'Reason Phrase: ' . $response->getReasonPhrase(),
                    'Headers:',
                    $this->dumpHeaders($response->getHeaders()),
                    'Body:',
                    $this->dumpStream($response->getBody()),
                ];

                return implode(PHP_EOL, $lines);
            };
        } elseif (is_callable($options['formatter'])) {
            $this->formatter = $options['formatter'];
        } else {
            throw new RuntimeException('Formatter should be callable');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $result = call_user_func($next, $request, $response);

        if ($result instanceof Response) {
            $response = $result;
        }

        $this->logger->log(
            $this->level,
            call_user_func($this->formatter, $request, $response),
            [
                'request' => $request,
                'response' => $request,
            ]
        );

        return $response;
    }

    /**
     * @param array $headers
     *
     * @return array
     */
    private function dumpHeaders(array $headers)
    {
        if ($this->hideAuth) {
            $headers = self::$authHeaders + $headers;
        }

        array_walk(
            $headers,
            function (&$value, $name) {
                if (is_array($value)) {
                    $value = implode('; ', $value);
                }

                $value = $name . ': ' . $value;
            }
        );

        return implode(PHP_EOL, $headers ?: ['<none>']);
    }

    /**
     * @param Stream $body
     *
     * @return string
     */
    private function dumpStream(Stream $body)
    {
        $body = $body->getSize() < $this->maxStreamSize
            ? trim($body->getContents())
            : 'stream(size=' . $body->getSize() . ')';

        return $body ?: '<empty>';
    }
}
