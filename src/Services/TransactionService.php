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

namespace Rebilly\Services;

use ArrayObject;
use Rebilly\Entities\Transaction;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class TransactionService
 *
 */
final class TransactionService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Transaction[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'transactions', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Transaction[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('transactions', $params);
    }

    /**
     * @param string $transactionId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Transaction
     */
    public function load($transactionId, $params = [])
    {
        return $this->client()->get('transactions/{transactionId}', ['transactionId' => $transactionId] + (array) $params);
    }

    /**
     * @param string $transactionId
     * @param float $amount
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Transaction
     */
    public function refund($transactionId, $amount)
    {
        return $this->client()->post(
            ['amount' => $amount],
            'transactions/{transactionId}/refund',
            ['transactionId' => $transactionId]
        );
    }
}
