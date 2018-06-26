<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Http;

use Rebilly\Http\Exception\TooManyRequestsException;
use Rebilly\Tests\TestCase;

/**
 * Class ExceptionTest.
 */
class ExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function tooManyRequestsException()
    {
        $retryAfter = date('Y-m-d H:i:s', strtotime('tomorrow'));
        $rateLimit = 1;
        $message = "Too many requests, retry after {$retryAfter}";
        $code = 429;

        $exception = new TooManyRequestsException($retryAfter, $rateLimit, $message, $code);

        self::assertSame($retryAfter, $exception->getRetryAfter());
        self::assertSame($rateLimit, $exception->getRateLimit());
        self::assertSame($message, $exception->getMessage());
        self::assertSame($code, $exception->getCode());
    }
}
