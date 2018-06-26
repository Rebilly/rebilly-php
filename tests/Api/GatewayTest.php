<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Tests\Api;

use Rebilly\Entities\AvsResponse;
use Rebilly\Entities\CvvResponse;
use Rebilly\Entities\Gateway;
use Rebilly\Entities\GatewayResponse;
use Rebilly\Tests\TestCase as BaseTestCase;

/**
 * Class GatewayTest.
 */
class GatewayTest extends BaseTestCase
{
    /**
     * @test
     */
    public function gateway()
    {
        $gateway = new Gateway();

        $response = $gateway->createResponse([
            'message' => 'test',
            'code' => 'code123',
            'originalMessage' => 'original message',
            'originalCode' => 'original code',
        ]);

        self::assertInstanceOf(GatewayResponse::class, $response);
        self::assertSame('test', $response->getMessage());
        self::assertSame('code123', $response->getCode());
        self::assertSame('original message', $response->getOriginalMessage());
        self::assertSame('original code', $response->getOriginalCode());

        $cvvResponse = $gateway->createCvvResponse([
            'message' => 'cvv response message',
            'code' => 'cvv response code',
        ]);

        self::assertInstanceOf(CvvResponse::class, $cvvResponse);
        self::assertSame('cvv response message', $cvvResponse->getMessage());
        self::assertSame('cvv response code', $cvvResponse->getCode());

        $avsResponse = $gateway->createAvsResponse([
            'message' => 'avs response message',
            'code' => 'avs response code',
        ]);

        self::assertInstanceOf(AvsResponse::class, $avsResponse);
        self::assertSame('avs response message', $avsResponse->getMessage());
        self::assertSame('avs response code', $avsResponse->getCode());

        $gateway = new Gateway([
            'response' => $response,
            'cvvResponse' => $cvvResponse,
            'avsResponse' => $avsResponse,
        ]);

        self::assertInstanceOf(Gateway::class, $gateway);
        self::assertEquals($response, $gateway->getResponse());
        self::assertEquals($cvvResponse, $gateway->getCvvResponse());
        self::assertEquals($avsResponse, $gateway->getAvsResponse());
    }
}
