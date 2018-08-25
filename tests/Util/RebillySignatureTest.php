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

namespace Rebilly\Tests\Util;

use Rebilly\Tests\TestCase;
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
            $this->assertSame('Failed to generate random string', $e->getMessage());
        }

        $nonce = RebillySignature::generateNonce(10);
        $this->assertSame(10, strlen($nonce));
    }

    /**
     * @test
     */
    public function generateSignature()
    {
        $signature = RebillySignature::generateSignature('user', 'key');

        $data = json_decode(base64_decode($signature, true), true);
        $this->assertTrue(is_array($data));
        $this->assertTrue(
            isset(
                $data['REB-APIUSER'],
                $data['REB-NONCE'],
                $data['REB-TIMESTAMP'],
                $data['REB-SIGNATURE']
            )
        );
        $this->assertSame(RebillySignature::NONCE_LENGTH, strlen($data['REB-NONCE']));
        $this->assertSame('user', $data['REB-APIUSER']);
        $this->assertNotContains('key', $data['REB-SIGNATURE']);
    }
}
