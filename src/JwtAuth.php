<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly;

use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;
use Exception;

/**
 * Class JwtAuth
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
class JwtAuth
{
    const TOKEN_NAME = 'REB-JWT';

    public static function isExpiredJwt($token)
    {
        $token = (new Parser())->parse($token);
        return !$token->validate(new ValidationData());
    }

    public static function getJwt()
    {
        self::startSession();
        return isset($_SESSION[self::TOKEN_NAME]) ? $_SESSION[self::TOKEN_NAME] : null;
    }

    public static function saveJwt($token)
    {
        self::startSession();
        $_SESSION[self::TOKEN_NAME] = $token;
    }

    private static function startSession()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            if (!session_start()) {
                throw new Exception('Session start fail');
            }
        }
    }
}