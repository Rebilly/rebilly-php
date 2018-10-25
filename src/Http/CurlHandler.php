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

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Rebilly\Http\Exception\TransferException;
use RuntimeException;

/**
 * Class CurlHandler
 *
 */
class CurlHandler implements HttpHandler
{
    /**
     * @var array The base options
     */
    private $options = [];

    /**
     * Constructor
     *
     * @see http://php.net/manual/en/function.curl-setopt.php
     *
     * @param array $options The base options
     */
    public function __construct(array $options = [])
    {
        $this->options = array_replace(
            // Default CURL options
            [
                CURLOPT_USERAGENT => @$_SERVER['HTTP_USER_AGENT'] ?: 'Curl/PHP' . PHP_VERSION,
            ],
            $options,
            // Required options
            [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => true,
            ],
            /*
             * Ensuring security options
             * @link http://stackoverflow.com/questions/13740933/
             */
            [
                CURLOPT_SSL_VERIFYPEER => 1,
                CURLOPT_SSL_VERIFYHOST => 2,
            ]
        );
    }

    /**
     * @param Request $request
     *
     * @throws RuntimeException
     * @throws TransferException
     *
     * @return Response
     */
    public function __invoke(Request $request)
    {
        $options = [];

        // Headers
        $headerLines = [];
        foreach ($request->getHeaders() as $name => $values) {
            $headerLines[] = sprintf('%s: %s', $name, implode(', ', $values));
        }
        $options[CURLOPT_HTTPHEADER] = $headerLines;

        // Url
        $options[CURLOPT_URL] = (string) $request->getUri();

        switch ($request->getMethod()) {
            case 'HEAD':
                $options[CURLOPT_NOBODY] = true;

                break;
            case 'GET':
                $options[CURLOPT_HTTPGET] = true;

                break;
            case 'POST':
                $options[CURLOPT_POST] = true;
                $options[CURLOPT_POSTFIELDS] = (string) $request->getBody();

                // Don't duplicate the Content-Length header
                $request = $request->withoutHeader('Content-Length');
                $request = $request->withoutHeader('Transfer-Encoding');

                break;
            case 'PUT':
                // Write to memory/temp
                $file = fopen('php://temp/' . spl_object_hash($request), 'w+');
                $bytes = fwrite($file, (string) $request->getBody());
                rewind($file);

                $options[CURLOPT_PUT] = true;
                $options[CURLOPT_INFILE] = $file;
                $options[CURLOPT_INFILESIZE] = $bytes;

                $request = $request->withoutHeader('Content-Length');

                break;
            case 'PATCH':
                $options[CURLOPT_CUSTOMREQUEST] = 'PATCH';
                $options[CURLOPT_POSTFIELDS] = (string) $request->getBody();

                // Don't duplicate the Content-Length header
                $request = $request->withoutHeader('Content-Length');
                $request = $request->withoutHeader('Transfer-Encoding');

                break;
            default:
                $options[CURLOPT_CUSTOMREQUEST] = $request->getMethod();
        }

        // If the Expect header is not present, prevent curl from adding it
        if (!$request->hasHeader('Expect')) {
            $options[CURLOPT_HTTPHEADER][] = 'Expect:';
        }

        // cURL sometimes adds a content-type by default. Prevent this.
        if (!$request->hasHeader('Content-Type')) {
            $options[CURLOPT_HTTPHEADER][] = 'Content-Type:';
        }

        [$body, $headerLines] = $this->execute($options);

        $headerLines = preg_split("#\r\n#", $headerLines, -1, PREG_SPLIT_NO_EMPTY);

        $headers = [];

        // Extract the version and status from the first header
        preg_match('#HTTP/(\d\.\d)\s(\d\d\d)\s(.*)#', array_shift($headerLines), $matches);
        array_shift($matches);
        [$protocolVersion, $statusCode, $reasonPhrase] = $matches;

        foreach ($headerLines as $line) {
            [$name, $values] = preg_split('#\s*:\s*#', $line, 2, PREG_SPLIT_NO_EMPTY);
            $headers[$name] = preg_split('#\s*,\s*#', $values, -1, PREG_SPLIT_NO_EMPTY);
        }

        $response = new \GuzzleHttp\Psr7\Response($statusCode, $headers, $body, $protocolVersion, $reasonPhrase);

        return $response;
    }

    /**
     * Execute cURL session.
     *
     * @param array $options
     *
     * @throws RuntimeException
     * @throws TransferException
     *
     * @return array
     */
    protected function execute(array $options = [])
    {
        $session = $this->createSession();
        $result = [];

        try {
            if ($session->open() === false) {
                throw new RuntimeException('Cannot initialize a cURL session');
            }

            $session->setOptions($options + $this->options);

            $result = $session->execute();

            if ($result === false) {
                throw new TransferException($session->getErrorMessage(), $session->getErrorCode());
            }

            $headerSize = $session->getInfo(CURLINFO_HEADER_SIZE);

            if (strlen($result) < $headerSize) {
                throw new TransferException(
                    'Header size(' . $headerSize . ') does not match result: ' . $result
                );
            }

            $result = [
                substr($result, $headerSize) ?: null,
                substr($result, 0, $headerSize) ?: null,
            ];
        } finally {
            $session->close();
        }

        return $result;
    }

    /**
     * @return CurlSession
     */
    protected function createSession()
    {
        return new CurlSession();
    }
}
