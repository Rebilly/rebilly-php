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
use JsonSerializable;
use Rebilly\Entities\Transaction;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
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
     * @throws NotFoundException The resource data does not exist
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
     * @param null|string $description
     * @param bool $isProcessedOutside
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return Transaction
     */
    public function refund($transactionId, $amount, $description = null, $isProcessedOutside = false)
    {
        return $this->client()->post(
            [
                'amount' => $amount,
                'description' => $description,
                'isProcessedOutside' => $isProcessedOutside,
            ],
            'transactions/{transactionId}/refund',
            ['transactionId' => $transactionId]
        );
    }

    /**
     * @param array|JsonSerializable|Transaction $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return Transaction
     */
    public function create($data)
    {
        return $this->client()->post(
            $data,
            'transactions'
        );
    }

    /**
     * @param string $transactionId
     * @param array|JsonSerializable|Transaction $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return Transaction
     */
    public function patch($transactionId, $data)
    {
        return $this->client()->patch($data, 'transactions/{transactionId}', ['transactionId' => $transactionId]);
    }
}
