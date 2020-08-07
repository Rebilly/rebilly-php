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
        self::assertSame($response->jsonSerialize(), $gateway->getResponse()->jsonSerialize());
        self::assertSame($cvvResponse->jsonSerialize(), $gateway->getCvvResponse()->jsonSerialize());
        self::assertSame($avsResponse->jsonSerialize(), $gateway->getAvsResponse()->jsonSerialize());
    }
}
