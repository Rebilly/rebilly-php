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

namespace Rebilly\Tests\Api;

use Rebilly\Entities\TrackingUser;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class UserTest.
 */
class UserTest extends BaseTestCase
{
    /**
     * @test
     */
    public function userTracking()
    {
        $trackingUser = new TrackingUser([
            'userId' => 'myUserId',
            'apiKeyId' => 'key123',
            'email' => 'test@email.com',
            'firstName' => 'John',
            'lastName' => 'Doe',
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla',
            'fingerprint' => '123456',
            'isSupport' => false,
        ]);

        self::assertInstanceOf(TrackingUser::class, $trackingUser);
        self::assertSame('myUserId', $trackingUser->getUserId());
        self::assertSame('key123', $trackingUser->getApiKeyId());
        self::assertSame('test@email.com', $trackingUser->getEmail());
        self::assertSame('John', $trackingUser->getFirstName());
        self::assertSame('Doe', $trackingUser->getLastName());
        self::assertSame('127.0.0.1', $trackingUser->getIpAddress());
        self::assertSame('Mozilla', $trackingUser->getUserAgent());
        self::assertSame('123456', $trackingUser->getFingerprint());
        self::assertSame(false, $trackingUser->getIsSupport());
    }
}
