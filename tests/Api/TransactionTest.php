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

namespace Rebilly\Tests\Api;

use Rebilly\Rest\Collection;

class TransactionTest extends TestCase
{
    /**
     * @test
     */
    public function searchTransaction()
    {
        $client = $this->getClient();

        $transactions = $client->transactions()->search();

        $this->assertInstanceOf(Collection::class, $transactions);
        $this->assertGreaterThan(0, count($transactions));

        return $transactions[0];
    }
}
