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
use Rebilly\Entities\Invoice;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\File;
use Rebilly\Rest\Service;

/**
 * Class InvoiceService
 *
 */
final class InvoiceService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Invoice[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'invoices', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Invoice[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('invoices', $params);
    }

    /**
     * @param string $invoiceId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException if resource does not exist
     *
     * @return Invoice
     */
    public function load($invoiceId, $params = [])
    {
        return $this->client()->get('invoices/{invoiceId}', ['invoiceId' => $invoiceId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Invoice $data
     * @param string $invoiceId
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return Invoice
     */
    public function create($data, $invoiceId = null)
    {
        if (isset($invoiceId)) {
            return $this->client()->put($data, 'invoices/{invoiceId}', ['invoiceId' => $invoiceId]);
        }

        return $this->client()->post($data, 'invoices');
    }

    /**
     * @param string $invoiceId
     * @param array|JsonSerializable|Invoice $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return Invoice
     */
    public function update($invoiceId, $data)
    {
        return $this->client()->put($data, 'invoices/{invoiceId}', ['invoiceId' => $invoiceId]);
    }

    /**
     * @param string $invoiceId
     *
     * @return Invoice
     */
    public function void($invoiceId)
    {
        return $this->client()->post([], 'invoices/{invoiceId}/void', ['invoiceId' => $invoiceId]);
    }

    /**
     * @param string $invoiceId
     *
     * @return Invoice
     */
    public function abandon($invoiceId)
    {
        return $this->client()->post([], 'invoices/{invoiceId}/abandon', ['invoiceId' => $invoiceId]);
    }

    /**
     * @param string $invoiceId
     * @param string|null $issuedTime
     * @param string|null $dueTime
     *
     * @return Invoice
     */
    public function issue($invoiceId, $issuedTime = null, $dueTime = null)
    {
        return $this->client()->post(
            [
                'issuedTime' => $issuedTime,
                'dueTime' => $dueTime,
            ],
            'invoices/{invoiceId}/issue',
            [
                'invoiceId' => $invoiceId,
            ]
        );
    }

    /**
     * @param string $invoiceId
     * @param string|null $dueTime
     *
     * @return Invoice
     */
    public function reissue($invoiceId, $dueTime = null)
    {
        return $this->client()->post(
            [
                'dueTime' => $dueTime,
            ],
            'invoices/{invoiceId}/reissue',
            [
                'invoiceId' => $invoiceId,
            ]
        );
    }

    /**
     * @param string $invoiceId
     * @param array $params
     *
     * @return File
     */
    public function loadPdf($invoiceId, $params = [])
    {
        return $this->client()->get(
            'invoices/{invoiceId}',
            ['invoiceId' => $invoiceId] + (array) $params,
            ['accept' => 'application/pdf']
        );
    }

    /**
     * @param string $invoiceId
     *
     * @return Invoice
     */
    public function recalculate($invoiceId)
    {
        return $this->client()->post(
            [],
            'invoices/{invoiceId}/recalculate',
            [
                'invoiceId' => $invoiceId,
            ]
        );
    }
}
