<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Util;

use PHPUnit_Framework_TestCase as TestCase;
use Rebilly\Util\RebillySignature;
use RuntimeException;

/**
 * Class RebillySignatureTest.
 */
class RebillySignatureTest extends TestCase
{
    /**
     * @test
     */
    public function generateNonce()
    {
        try {
            RebillySignature::generateNonce(-1);
        } catch (RuntimeException $e) {
            $this->assertEquals('Failed to generate random string', $e->getMessage());
        }

        $nonce = RebillySignature::generateNonce(10);
        $this->assertEquals(10, strlen($nonce));
    }

    /**
     * @test
     */
    public function generateSignature()
    {
        $signature = RebillySignature::generateSignature('user', 'key');

        $data = json_decode(base64_decode($signature), true);
        $this->assertTrue(is_array($data));
        $this->assertTrue(
            isset(
                $data['REB-APIUSER'],
                $data['REB-NONCE'],
                $data['REB-TIMESTAMP'],
                $data['REB-SIGNATURE']
            )
        );
        $this->assertEquals(RebillySignature::NONCE_LENGTH, strlen($data['REB-NONCE']));
        $this->assertEquals('user', $data['REB-APIUSER']);
        $this->assertNotContains('key', $data['REB-SIGNATURE']);
    }
}
