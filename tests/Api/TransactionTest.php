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

use Rebilly\Entities\Transaction;
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

    /**
     * @test
     */
    public function createTransaction()
    {
        $form = new Transaction();
        $form->setAmount(5.99);
        $form->setCurrency('USD');
        $form->setWebsiteId('demo-website');
        $form->setCustomerId('demo-customer');
        $form->setType('sale');

        $client = $this->getClient();
        $transaction = $client->transactions()->create($form);

        $this->assertInstanceOf(Transaction::class, $transaction);
        $this->assertSame($form->getCustomerId(), $transaction->getCustomerId());
        $this->assertSame($form->getWebsiteId(), $transaction->getWebsiteId());
        $this->assertSame($form->getAmount(), $transaction->getAmount());
        $this->assertSame($form->getType(), $transaction->getType());
    }
}
