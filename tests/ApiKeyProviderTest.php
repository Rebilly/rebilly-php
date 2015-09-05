<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests;

use BadMethodCallException;
use Rebilly\ApiKeyProvider;
use RuntimeException;
use UnexpectedValueException;

/**
 * Class ApiKeyProviderTest.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
class ApiKeyProviderTest extends TestCase
{
    /**
     * @param string $expected
     * @param callable $provider
     */
    protected function assertApiKey($expected, callable $provider)
    {
        $this->assertEquals($expected, call_user_func($provider));
    }

    /**
     * @test
     */
    public function provideApiKeyFromEnv()
    {
        $bak = getenv(ApiKeyProvider::ENV_APIKEY);

        $this->assertTrue(putenv(ApiKeyProvider::ENV_APIKEY . '=QWERTY'));
        $this->assertApiKey('QWERTY', ApiKeyProvider::env());
        $this->assertTrue(putenv(ApiKeyProvider::ENV_APIKEY . '=' . $bak));
    }

    /**
     * @test
     */
    public function provideApiKeyFromIni()
    {
        try {
            $this->assertApiKey('QWERTY', ApiKeyProvider::ini());
        } catch (RuntimeException $e) {
            $this->assertStringStartsWith('Cannot read credentials from', $e->getMessage());
        }

        $this->assertTrue(putenv('HOME='));


        $this->assertTrue(putenv('HOMEDRIVE=' . __DIR__));
        $this->assertTrue(putenv('HOMEPATH=' . '/..'));

        try {
            $this->assertApiKey('QWERTY', ApiKeyProvider::ini());
        } catch (RuntimeException $e) {
            $this->assertStringStartsWith('Cannot read credentials from', $e->getMessage());
        }

        $this->assertTrue(putenv('HOMEPATH='));

        try {
            $this->assertApiKey('QWERTY', ApiKeyProvider::ini());
        } catch (BadMethodCallException $e) {
            $this->assertStringStartsWith('Cannot establish the home directory', $e->getMessage());
        }

        try {
            $this->assertApiKey('QWERTY', ApiKeyProvider::ini(null, __DIR__ . '/../README.md'));
        } catch (UnexpectedValueException $e) {
            $this->assertStringStartsWith('Invalid credentials file', $e->getMessage());
        }

        try {
            $this->assertApiKey('QWERTY', ApiKeyProvider::ini('missed', __DIR__ . '/Stub/credentials.ini'));
        } catch (UnexpectedValueException $e) {
            $this->assertStringEndsWith('not found in credentials file', $e->getMessage());
        }

        try {
            $this->assertApiKey('QWERTY', ApiKeyProvider::ini('invalid', __DIR__ . '/Stub/credentials.ini'));
        } catch (UnexpectedValueException $e) {
            $this->assertStringStartsWith('No APIKEY present in INI profile', $e->getMessage());
        }

        $this->assertApiKey('QWERTY', ApiKeyProvider::ini(null, __DIR__ . '/Stub/credentials.ini'));
    }
}
