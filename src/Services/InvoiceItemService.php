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
use Rebilly\Entities\InvoiceItem;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Resource\Collection;
use Rebilly\Resource\Service;

/**
 * Class InvoiceItemService
 *
 * @todo Change endpoint to `invoice-items`, remove invoiceId dependency.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class InvoiceItemService extends Service
{
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
     * @throws NotFoundException The resource data does exist
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
     * @param array|InvoiceItem $data
     * @param string $invoiceId
     * @param string $invoiceItemId
     *
     * @throws UnprocessableEntityException The input data does not valid
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
        } else {
            return $this->client()->post(
                $data,
                'invoices/{invoiceId}/items',
                ['invoiceId' => $invoiceId]
            );
        }
    }
}
