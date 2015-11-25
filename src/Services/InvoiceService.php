<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\Invoice;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;
use Rebilly\Rest\File;

/**
 * Class InvoiceService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
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
     * @throws NotFoundException The resource data does exist
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
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Invoice
     */
    public function create($data, $invoiceId = null)
    {
        if (isset($invoiceId)) {
            return $this->client()->put($data, 'invoices/{invoiceId}', ['invoiceId' => $invoiceId]);
        } else {
            return $this->client()->post($data, 'invoices');
        }
    }

    /**
     * @param string $invoiceId
     * @param array|JsonSerializable|Invoice $data
     *
     * @throws UnprocessableEntityException The input data does not valid
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
     * @param string $issuedTime
     *
     * @return Invoice
     */
    public function issue($invoiceId, $issuedTime)
    {
        return $this->client()->post(['issuedTime' => $issuedTime], 'invoices/{invoiceId}/issue', ['invoiceId' => $invoiceId]);
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
}
