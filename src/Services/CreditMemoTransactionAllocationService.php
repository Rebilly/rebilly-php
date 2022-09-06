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
use Rebilly\Entities\CreditMemoTransactionAllocation;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CreditMemoTransactionAllocationService.
 */
final class CreditMemoTransactionAllocationService extends Service
{
    /**
     * @param string $creditMemoId
     * @param array|ArrayObject $params
     *
     * @return CreditMemoTransactionAllocation[][]|Collection[]|Paginator
     */
    public function paginator($creditMemoId, $params = [])
    {
        return new Paginator(
            $this->client(),
            'credit-memos/{creditMemoId}/transaction-allocations',
            ['creditMemoId' => $creditMemoId] + (array) $params
        );
    }

    /**
     * @param string $creditMemoId
     * @param array|ArrayObject $params
     *
     * @return CreditMemoTransactionAllocation[]|Collection
     */
    public function search($creditMemoId, $params = [])
    {
        return $this->client()->get(
            'credit-memos/{creditMemoId}/transaction-allocations',
            ['creditMemoId' => $creditMemoId] + (array) $params
        );
    }

    /**
     * @param string $creditMemoId
     * @param string $transactionId
     *
     * @return CreditMemoTransactionAllocation
     *@throws NotFoundException if resource does not exist
     *
     */
    public function load($creditMemoId, $transactionId)
    {
        return $this->client()->get(
            'credit-memos/{creditMemoId}/transaction-allocations/{transactionId}',
            ['transactionId' => $transactionId, 'creditMemoId' => $creditMemoId]
        );
    }

    /**
     * @param string $creditMemoId
     * @param string $transactionId
     * @param array|JsonSerializable|CreditMemoTransactionAllocation $data
     *
     * @return CreditMemoTransactionAllocation
     * @throws DataValidationException if input data is not valid
     *
     */
    public function update($creditMemoId, $transactionId, $data)
    {
        return $this->client()->put(
            $data,
            'credit-memos/{creditMemoId}/transaction-allocations/{transactionId}',
            ['transactionId' => $transactionId, 'creditMemoId' => $creditMemoId]
        );
    }

    /**
     * @param string $creditMemoId
     * @param string $transactionId
     */
    public function delete($creditMemoId, $transactionId)
    {
        $this->client()->delete(
            'credit-memos/{creditMemoId}/transaction-allocations/{transactionId}',
            ['transactionId' => $transactionId, 'creditMemoId' => $creditMemoId]
        );
    }
}
