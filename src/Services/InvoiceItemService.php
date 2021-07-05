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
use Rebilly\Entities\InvoiceItem;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class InvoiceItemService
 *
 * @todo Change endpoint to `invoice-items`, remove invoiceId dependency.
 *
 */
final class InvoiceItemService extends Service
{
    /**
     * @param string $invoiceId
     * @param array|ArrayObject $params
     *
     * @return InvoiceItem[][]|Collection[]|Paginator
     */
    public function paginator($invoiceId, $params = [])
    {
        return new Paginator(
            $this->client(),
            'invoices/{invoiceId}/items',
            ['invoiceId' => $invoiceId] + (array) $params
        );
    }

    /**
     * @param string $invoiceId
     * @param array|ArrayObject $params
     *
     * @return InvoiceItem[]|Collection
     */
    public function search($invoiceId, $params = [])
    {
        return $this->client()->get(
            'invoices/{invoiceId}/items',
            ['invoiceId' => $invoiceId] + (array) $params
        );
    }

    /**
     * @param string $invoiceId
     * @param string $invoiceItemId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return InvoiceItem
     */
    public function load($invoiceId, $invoiceItemId, $params = [])
    {
        return $this->client()->get(
            'invoices/{invoiceId}/items/{invoiceItemId}',
            ['invoiceId' => $invoiceId, 'invoiceItemId' => $invoiceItemId] + (array) $params
        );
    }

    /**
     * @param array|JsonSerializable|InvoiceItem $data
     * @param string $invoiceId
     * @param string $invoiceItemId
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return InvoiceItem
     */
    public function create($data, $invoiceId, $invoiceItemId = null)
    {
        if (isset($invoiceItemId)) {
            return $this->client()->put(
                $data,
                'invoices/{invoiceId}/items/{invoiceItemId}',
                ['invoiceId' => $invoiceId, 'invoiceItemId' => $invoiceItemId]
            );
        }

        return $this->client()->post(
            $data,
            'invoices/{invoiceId}/items',
            ['invoiceId' => $invoiceId]
        );
    }

    /**
     * @param array|JsonSerializable|InvoiceItem $data
     * @param string $invoiceId
     * @param string $invoiceItemId
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return InvoiceItem
     */
    public function update($data, $invoiceId, $invoiceItemId)
    {
        return $this->client()->put(
            $data,
            'invoices/{invoiceId}/items/{invoiceItemId}',
            ['invoiceId' => $invoiceId, 'invoiceItemId' => $invoiceItemId]
        );
    }

    /**
     * @param array|JsonSerializable|InvoiceItem $data
     * @param string $invoiceId
     * @param string $invoiceItemId
     *
     * @return InvoiceItem
     */
    public function delete($data, $invoiceId, $invoiceItemId)
    {
        return $this->client()->delete(
            'invoices/{invoiceId}/items/{invoiceItemId}',
            ['invoiceId' => $invoiceId, 'invoiceItemId' => $invoiceItemId]
        );
    }
}
