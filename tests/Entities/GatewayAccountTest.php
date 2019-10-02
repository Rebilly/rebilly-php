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

declare(strict_types=1);

use Rebilly\Entities\GatewayAccount;
use Rebilly\Tests\TestCase;

final class GatewayAccountTest extends TestCase
{
    /**
     * @test
     */
    public function buildObjectUsingSetterToSendToServer(): void
    {
        $data = self::getDefaultData();

        $value = new GatewayAccount();
        $value->setGatewayName($data['gatewayName']);
        $value->setAcquirerName($data['acquirerName']);
        $value->setAdditionalCriteria($data['additionalCriteria']);

        $expectedJson = $data;
        // Unset read-only properties which we not set.
        unset(
            $expectedJson['id']
        );

        self::assertSame($expectedJson, $value->jsonSerialize());
    }

    /**
     * @test
     */
    public function populatePlanFromArrayReceivedFromServer(): void
    {
        $data = self::getDefaultData();

        $gatewayAccount = new GatewayAccount($data);

        self::assertSame($data['id'], $gatewayAccount->getId());
        self::assertSame($data['gatewayName'], $gatewayAccount->getGatewayName());
        self::assertSame($data['acquirerName'], $gatewayAccount->getAcquirerName());
        self::assertSame($data['additionalCriteria'], $gatewayAccount->getAdditionalCriteria()->jsonSerialize());
    }

    private static function getDefaultData(): array
    {
        return [
            'id' => 'gateway-account-1',
            'gatewayName' => 'RebillyProcess',
            'acquirerName' => 'RebillyProcess',
            'additionalCriteria' => [
                'op' => 'equals',
                'path' => '/transaction/websiteId',
                'value' => 'website-1',
            ],
        ];
    }
}
