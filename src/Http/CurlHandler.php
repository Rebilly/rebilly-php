<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Http;

use RuntimeException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class CurlHandler
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
class CurlHandler implements HttpHandler
{
    /** @var array The base options */
    private $options = [];

    /** @var resource The reference to opened session */
    private $reference;

    /**
     * Constructor
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = array_merge(
            // Default CURL options
            [
                CURLOPT_USERAGENT => @$_SERVER['HTTP_USER_AGENT'] ?: 'Curl/PHP' . PHP_VERSION,
            ],
            $options
        );

        register_shutdown_function(
            function () {
                $this->closeSession();
            }
        );
    }

    /**
     * Close opened CURL session.
     */
    public function __destruct()
    {
        $this->closeSession();
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function send(Request $request)
    {
        $this->closeSession();

        /*
         * Options for session
         * @see http://php.net/manual/en/function.curl-setopt.php
         */
        $options = $this->options;

        // Required options
        $options[CURLOPT_RETURNTRANSFER] = true;
        $options[CURLOPT_HEADER] = true;

        /*
         * Ensuring security options
         * @link http://stackoverflow.com/questions/13740933/
         */
        $options[CURLOPT_SSL_VERIFYPEER] = 1;
        $options[CURLOPT_SSL_VERIFYHOST] = 2;

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

        $this->openSession($options);

        ob_start();
        $result = curl_exec($this->reference);
        ob_end_clean();

        if ($result === false) {
            /*
             * @see http://curl.haxx.se/libcurl/c/libcurl-errors.html
             */
            new Exception\TransferException(
                curl_error($this->reference),
                curl_errno($this->reference)
            );
        }

        $headerSize = curl_getinfo($this->reference, CURLINFO_HEADER_SIZE);
        $headerLines = preg_split("#\r\n#", substr($result, 0, $headerSize), -1, PREG_SPLIT_NO_EMPTY);
        $body = substr($result, $headerSize);
        $headers = [];

        // Extract the version and status from the first header
        preg_match('#HTTP/(\d\.\d)\s(\d\d\d)\s(.*)#', array_shift($headerLines), $matches);
        array_shift($matches);
        list($protocolVersion, $statusCode, $reasonPhrase) = $matches;

        foreach ($headerLines as $line) {
            list($name, $values) = preg_split('#\s*:\s*#', $line, 2, PREG_SPLIT_NO_EMPTY);
            $headers[$name] = preg_split('#\s*,\s*#', $values, -1, PREG_SPLIT_NO_EMPTY);
        }

        $response = new \GuzzleHttp\Psr7\Response($statusCode, $headers, $body, $protocolVersion, $reasonPhrase);

        $this->closeSession();

        return $response;
    }

    /**
     * Initialize a cURL session.
     *
     * @param array $options
     */
    private function openSession(array $options = [])
    {
        $reference = curl_init();

        if (!is_resource($reference)) {
            throw new RuntimeException('Cannot initialize a cURL session');
        }

        $this->reference = $reference;;
        curl_setopt_array($this->reference, $options);
    }

    /**
     * Close opened session.
     */
    private function closeSession()
    {
        if (is_resource($this->reference)) {
            curl_close($this->reference);
        }
    }
}
