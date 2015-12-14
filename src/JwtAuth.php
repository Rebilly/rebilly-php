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
use BadMethodCallException;

/**
 * Class JwtAuth
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
class JwtAuth
{
    const HEADER = 'Authorization';
    const JWT_FILE = '.rebilly/jwt.ini';


    public static function isExpiredJwt($token)
    {
        $token = (new Parser())->parse($token);
        return !$token->validate(new ValidationData());
    }

    public static function getJwt()
    {
        if (file_exists(self::JWT_FILE)) {
            return file_get_contents(self::JWT_FILE);
        }

        return null;
    }

    public static function saveJwt($token)
    {
        file_put_contents(self::JWT_FILE, $token);
    }
}
