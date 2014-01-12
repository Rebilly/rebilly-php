<?php

/**
 * Class RebillySignature
 *
 * The signature authentication scheme is an alternative that allows requests to be
 * authenticated without revealing the secret key.  The nonce, timestamp and signature
 * would most likely be used in conjunction with the Rebilly jquery library.
 *
 */
class RebillySignature
{

    const NONCE_LENGTH = 30;

    /**
     * This method returns an array with the header name and header values for the nonce, timestamp and signature.
     *
     * @param $apiUser
     * @param $apiKey
     * @return array
     */
    public function generateSignature($apiUser, $apiKey)
    {
        $nonce = $this->generateNonce(self::NONCE_LENGTH);
        date_default_timezone_set('UTC');
        $time = time();
        $data = $apiUser . $nonce . $time;
        $signature = hash_hmac('sha1', $data, $apiKey);
        $arr = array(
            'REB-APIUSER' => $apiUser,
            'REB-NONCE' => $nonce,
            'REB-TIMESTAMP' => $time,
            'REB-SIGNATURE' => $signature,
        );
        return base64_encode(json_encode($arr));
    }

    /**
     * Generate a random cryptopgraphic base64 nonce (number used only once)
     *
     * @param integer $len
     * @return string A random string (base64 characters only)
     */
    private function generateNonce($len)
    {
        $bytes = openssl_random_pseudo_bytes($len, $strong);

        if ($bytes === false || !$strong) {
            throw new Exception('Failed to generate random string');
        }
        return substr(base64_encode($bytes), 0, $len);
    }

}
