<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Api;

use ArrayObject;
use DomainException;
use Rebilly\Client;
use Rebilly\Resource\Entity;
use Rebilly\Resource\Collection;

/**
 * Class InvoiceItem.
 *
 * ```json
 * {
 *   "type"
 *   "unitPrice"
 *   "quantity"
 *   "description"
 *   "periodStartTime"
 *   "periodEndTime"
 * }
 * ```
 *
 * @todo Change endpoint to `invoice-items`, remove invoiceId dependency.
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class InvoiceItem extends Entity
{
    /**
     * @return array
     */
    public static function types()
    {
        return ['credit', 'debit'];
    }

    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @param string $value
     *
     * @return $this
     * @throws DomainException
     */
    public function setType($value)
    {
        if (!in_array($value, self::types())) {
            throw new DomainException('Only "' . implode(', ', self::types()) . ' type supports');
        }

        return $this->setAttribute('type', $value);
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->getAttribute('unitPrice');
    }

    /**
     * @param float $value
     *
     * @return $this
     */
    public function setUnitPrice($value)
    {
        return $this->setAttribute('unitPrice', $value);
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->getAttribute('quantity');
    }

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setQuantity($value)
    {
        return $this->setAttribute('quantity', (int) $value);
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->getAttribute('description');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setAttribute('description', $value);
    }

    /**
     * @return string
     */
    public function getPeriodStartTime()
    {
        return $this->getAttribute('periodStartTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPeriodStartTime($value)
    {
        return $this->setAttribute('periodStartTime', $value);
    }

    /**
     * @return string
     */
    public function getPeriodEndTime()
    {
        return $this->getAttribute('periodEndTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPeriodEndTime($value)
    {
        return $this->setAttribute('periodEndTime', $value);
    }

    /********************************************************************************
     * Invoice Item API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param string $invoiceId
     * @param array|ArrayObject $params
     *
     * @return InvoiceItem[]|Collection
     */
    public static function search($invoiceId, $params = [])
    {
        $params['invoiceId'] = $invoiceId;

        return Client::get('invoices/{invoiceId}/items', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $invoiceId
     * @param string $invoiceItemId
     * @param array|ArrayObject $params
     *
     * @return InvoiceItem
     */
    public static function load($invoiceId, $invoiceItemId, $params = [])
    {
        $params['invoiceId'] = $invoiceId;
        $params['invoiceItemId'] = $invoiceItemId;

        return Client::get('invoices/{invoiceId}/items/{invoiceItemId}', $params);
    }

    /**
     * Facade for client command
     *
     * @param array|InvoiceItem $data
     * @param string $invoiceId
     * @param string $invoiceItemId
     *
     * @return InvoiceItem
     */
    public static function create($data, $invoiceId, $invoiceItemId = null)
    {
        if (isset($invoiceItemId)) {
            return Client::put(
                $data,
                'invoices/{invoiceId}/items/{invoiceItemId}',
                ['invoiceId' => $invoiceId, 'invoiceItemId' => $invoiceItemId]
            );
        } else {
            return Client::post(
                $data,
                'invoices/{invoiceId}/items',
                ['invoiceId' => $invoiceId]
            );
        }
    }
}
