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

use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\TooManyRequestsException;
use Rebilly\Http\Exception\UnprocessableEntityException;
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

    /**
     * @test
     */
    public function dataValidationExceptionSupportsBC()
    {
        $data = '{"invalidFields":{"couponIds.0":[{"message":"Coupon Code must exist"}]},"details":["Coupon Code must exist"]}';
        $content = json_decode($data, true);

        $exception = new DataValidationException($content);

        self::assertInstanceOf(UnprocessableEntityException::class, $exception);
        self::assertSame(['Coupon Code must exist'], $exception->getErrors());
        self::assertSame(['couponIds.0' => ['Coupon Code must exist']], $exception->getValidationErrors());
        self::assertSame('Data Validation Failed.', $exception->getMessage());
        self::assertSame(422, $exception->getStatusCode());
    }
}
