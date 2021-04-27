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

use Rebilly\Http\Exception\NotFoundException;

class GatewayAccountTest extends TestCase
{
    /**
     * @test
     */
    public function checkCredentials()
    {
        $client = $this->getClient();

        $result = $client->gatewayAccounts()->checkCredentials('payvision', [
            'memberId' => 'test',
            'memberGuid' => 'test',
        ]);

        self::assertTrue($result);
    }

    /**
     * @test
     */
    public function checkCredentialsGatewayAccountNotFound()
    {
        $client = $this->getClient();

        $this->expectException(NotFoundException::class);

        $client->gatewayAccounts()->checkCredentials('not_found', [
            'memberId' => 'test',
            'memberGuid' => 'test',
        ]);
    }
}
