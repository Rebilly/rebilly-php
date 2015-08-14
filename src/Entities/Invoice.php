<?php
/**
 * This file is part of Rebilly.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://rebilly.com
 */

namespace Rebilly\Entities;

use ArrayObject;
use Rebilly\Client;
use Rebilly\Resource\Entity;
use Rebilly\Resource\Collection;

/**
 * Class Invoice.
 *
 * ```json
 * {
 *   "customer"
 *   "website"
 *   "currency"
 *   "dueTime"
 *   "billingContact"
 *   "deliveryContact"
 * }
 * ```
 *
 * @todo Rename property `billingContact` to `billingContactId`
 * @todo Rename property `deliveryContact` to `deliveryContactId`
 *
 */
final class Invoice extends Entity
{
    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customer');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customer', $value);
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->getAttribute('website');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('website', $value);
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->getAttribute('currency');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCurrency($value)
    {
        return $this->setAttribute('currency', $value);
    }

    /**
     * @return string
     */
    public function getDueTime()
    {
        return $this->getAttribute('dueTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDueTime($value)
    {
        return $this->setAttribute('dueTime', $value);
    }

    /**
     * @return string
     */
    public function getBillingContactId()
    {
        return $this->getAttribute('billingContact');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBillingContactId($value)
    {
        return $this->setAttribute('billingContact', $value);
    }

    /**
     * @return string
     */
    public function getDeliveryContactId()
    {
        return $this->getAttribute('deliveryContact');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDeliveryContactId($value)
    {
        return $this->setAttribute('deliveryContact', $value);
    }

    /********************************************************************************
     * Invoice API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param array|ArrayObject $params
     *
     * @return Invoice[]|Collection
     */
    public static function search($params = [])
    {
        return Client::get('invoices', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $invoiceId
     * @param array|ArrayObject $params
     *
     * @return Invoice
     */
    public static function load($invoiceId, $params = [])
    {
        $params['invoiceId'] = $invoiceId;

        return Client::get('invoices/{invoiceId}', $params);
    }

    /**
     * Facade for client command
     *
     * @param array|Invoice $data
     * @param string $invoiceId
     *
     * @return Invoice
     */
    public static function create($data, $invoiceId = null)
    {
        if (isset($invoiceId)) {
            return Client::put($data, 'invoices/{invoiceId}', ['invoiceId' => $invoiceId]);
        } else {
            return Client::post($data, 'invoices');
        }
    }

    /**
     * Facade for client command
     *
     * @param string $invoiceId
     * @param array|Invoice $data
     *
     * @return Invoice
     */
    public static function update($invoiceId, $data)
    {
        return Client::put($data, 'invoices/{invoiceId}', ['invoiceId' => $invoiceId]);
    }

    /**
     * Facade for client command
     *
     * @param string $invoiceId
     *
     * @return Invoice
     */
    public static function void($invoiceId)
    {
        return Client::post([], 'invoices/{invoiceId}/void', ['invoiceId' => $invoiceId]);
    }

    /**
     * Facade for client command
     *
     * @param string $invoiceId
     *
     * @return Invoice
     */
    public static function abandon($invoiceId)
    {
        return Client::post([], 'invoices/{invoiceId}/abandon', ['invoiceId' => $invoiceId]);
    }

    /**
     * Facade for client command
     *
     * @param string $invoiceId
     * @param string $issuedTime
     *
     * @return Invoice
     */
    public static function issue($invoiceId, $issuedTime)
    {
        return Client::post(['issuedTime' => $issuedTime], 'invoices/{invoiceId}/issue', ['invoiceId' => $invoiceId]);
    }
}
