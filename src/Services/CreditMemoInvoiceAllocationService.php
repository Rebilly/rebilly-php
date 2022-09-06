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
use Rebilly\Entities\CreditMemoInvoiceAllocation;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CreditMemoInvoiceAllocationService.
 */
final class CreditMemoInvoiceAllocationService extends Service
{
    /**
     * @param string $invoiceId
     * @param array|ArrayObject $params
     *
     * @return CreditMemoInvoiceAllocation[][]|Collection[]|Paginator
     */
    public function paginator($invoiceId, $params = [])
    {
        return new Paginator(
            $this->client(),
            'invoices/{invoiceId}/credit-memo-allocations',
            ['invoiceId' => $invoiceId] + (array) $params
        );
    }

    /**
     * @param string $invoiceId
     * @param array|ArrayObject $params
     *
     * @return CreditMemoInvoiceAllocation[]|Collection
     */
    public function search($invoiceId, $params = [])
    {
        return $this->client()->get(
            'invoices/{invoiceId}/credit-memo-allocations',
            ['invoiceId' => $invoiceId] + (array) $params
        );
    }

    /**
     * @param string $invoiceId
     * @param string $creditMemoId
     *
     * @return CreditMemoInvoiceAllocation
     *@throws NotFoundException if resource does not exist
     *
     */
    public function load($invoiceId, $creditMemoId)
    {
        return $this->client()->get(
            'invoices/{invoiceId}/credit-memo-allocations/{creditMemoId}',
            ['invoiceId' => $invoiceId, 'creditMemoId' => $creditMemoId]
        );
    }

    /**
     * @param string $invoiceId
     * @param string $creditMemoId
     * @param array|JsonSerializable|CreditMemoInvoiceAllocation $data
     *
     * @return CreditMemoInvoiceAllocation
     *@throws DataValidationException if input data is not valid
     *
     */
    public function update($invoiceId, $creditMemoId, $data)
    {
        return $this->client()->put(
            $data,
            'invoices/{invoiceId}/credit-memo-allocations/{creditMemoId}',
            ['invoiceId' => $invoiceId, 'creditMemoId' => $creditMemoId]
        );
    }

    /**
     * @param string $invoiceId
     * @param string $creditMemoId
     */
    public function delete($invoiceId, $creditMemoId)
    {
        $this->client()->delete(
            'invoices/{invoiceId}/credit-memo-allocations/{creditMemoId}',
            ['invoiceId' => $invoiceId, 'creditMemoId' => $creditMemoId]
        );
    }
}
