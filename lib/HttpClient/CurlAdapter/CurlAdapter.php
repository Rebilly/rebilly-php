<?php
/**
 * This file is part of Rebilly.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\HttpClient\CurlAdapter;

use Exception;
use Rebilly\HttpClient\HttpClient;
use RebillyRequest as Request;
use RebillyResponse as Response;

/**
 * Class RebillyCurlAdapter.
 */
class CurlAdapter implements HttpClient
{
    /**
     * {@inheritdoc}
     */
    public function sendRequest(Request $request)
    {
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'REB-APIKEY:' . $request->getApiKey(),
        );

        $request->prepareUrl();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request->getApiUrl());
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_TIMEOUT, 100);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

        switch ($request->getMethod()) {
            case self::METHOD_HEAD:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::METHOD_HEAD);
                curl_setopt($ch, CURLOPT_NOBODY, true);
                break;
            case self::METHOD_GET:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::METHOD_GET);
                break;
            case self::METHOD_POST:
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getData());
                break;
            case self::METHOD_PUT:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::METHOD_PUT);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getData());
                break;
            case self::METHOD_DELETE:
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, self::METHOD_DELETE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getData());
                break;
        }

        $response = curl_exec($ch);

        if ($response === false) {
            $errorNumber = curl_errno($ch);
            $this->handleError($errorNumber);
            curl_close($ch);
        }

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $rebillyResponse = new Response($statusCode, $response);
        $rebillyResponse->prepareResponse();

        return $rebillyResponse;
    }

    /**
     * Curl Error handling.
     *
     * @param int $errorNumber curl error code
     *
     * @throws Exception
     */
    private function handleError($errorNumber)
    {
        switch ($errorNumber) {
            case CurlError::$codes['CURLE_COULDNT_CONNECT'] :
            case CurlError::$codes['CURLE_COULDNT_RESOLVE_HOST'] :
            case CurlError::$codes['CURLE_OPERATION_TIMEOUTED'] :
                throw new Exception('Failed connect to Rebilly.');
            default:
                throw new Exception('An unexpected error occurred connecting with Rebilly.');
        }
    }
}
