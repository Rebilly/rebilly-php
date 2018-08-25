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
