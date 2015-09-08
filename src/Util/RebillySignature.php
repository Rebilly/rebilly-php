<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Util;

use RuntimeException;

/**
 * Class RebillySignature.
 *
 * The signature authentication scheme is an alternative that allows requests to be
 * authenticated without revealing the secret key.  The nonce, timestamp and signature
 * would most likely be used in conjunction with the Rebilly jquery library.
 *
 * @version 2.0
 */
final class RebillySignature
{
    const NONCE_LENGTH = 30;

    /**
     * This method returns an array with the header name and header values for the nonce,
     * timestamp and signature.
     *
     * @param string $apiUser
     * @param string $apiKey
     *
     * @return string
     */
    public static function generateSignature($apiUser, $apiKey)
    {
        $serverTimezone = date_default_timezone_get();
        date_default_timezone_set('UTC');

        $nonce = self::generateNonce(self::NONCE_LENGTH);
        $time = time();
        $signature = hash_hmac('sha1', $apiUser . $nonce . $time, $apiKey);

        $data = [
            'REB-APIUSER' => $apiUser,
            'REB-NONCE' => $nonce,
            'REB-TIMESTAMP' => $time,
            'REB-SIGNATURE' => $signature,
        ];

        date_default_timezone_set($serverTimezone);

        return base64_encode(json_encode($data));
    }

    /**
     * Generate a random cryptographic base64 nonce (number used only once)
     *
     * @param int $length
     * @param bool $strong
     *
     * @throws RuntimeException
     *
     * @return string A random string (base64 characters only)
     */
    public static function generateNonce($length, $strong = true)
    {
        $bytes = openssl_random_pseudo_bytes($length, $strong);

        if ($bytes === false || !$strong) {
            throw new RuntimeException('Failed to generate random string');
        }

        return substr(base64_encode($bytes), 0, $length);
    }
}
