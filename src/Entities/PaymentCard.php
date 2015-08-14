<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Entities;

use ArrayObject;
use Rebilly\Client;
use Rebilly\Resource\Entity;
use Rebilly\Resource\Collection;

/**
 * Class PaymentCard.
 *
 * ```json
 * {
 *   "id": "ABCD2345",
 *   "last4": "1234",
 *   "expYear": "2017",
 *   "expMonth": "07",
 *   "status": "active",
 *   "brand": "Visa",
 *   "customer": "ABCD1234",
 *   "billingContact": "ADDRESS1",
 *   "createdTime": "2015-02-11 04:45:23",
 *   "updatedTime": "2015-02-11 04:45:23"
 * }
 * ```
 *
 * @todo Rename property `customer` to `customerId`
 * @todo Rename property `billingContact` to `billingContactId`
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class PaymentCard extends Entity
{
    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setPan($value)
    {
        return $this->setAttribute('pan', $value);
    }

    /**
     * @return string
     */
    public function getLast4()
    {
        return $this->getAttribute('last4');
    }

    /**
     * @return string
     */
    public function getExpYear()
    {
        return $this->getAttribute('expYear');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpYear($value)
    {
        return $this->setAttribute('expYear', $value);
    }

    /**
     * @return string
     */
    public function getExpMonth()
    {
        return $this->getAttribute('expMonth');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setExpMonth($value)
    {
        return $this->setAttribute('expMonth', $value);
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->getAttribute('brand');
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
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
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /********************************************************************************
     * Payment card API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param array|ArrayObject $params
     *
     * @return PaymentCard[]|Collection
     */
    public static function search($params = [])
    {
        return Client::get('payment-cards', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $cardId
     * @param array|ArrayObject $params
     *
     * @return PaymentCard
     */
    public static function load($cardId, $params = [])
    {
        $params['cardId'] = $cardId;

        return Client::get('payment-cards/{cardId}', $params);
    }

    /**
     * Facade for client command
     *
     * @param array|PaymentCard $data
     * @param string $cardId
     *
     * @return PaymentCard
     */
    public static function create($data, $cardId = null)
    {
        if (isset($cardId)) {
            return Client::put($data, 'payment-cards/{cardId}', ['cardId' => $cardId]);
        } else {
            return Client::post($data, 'payment-cards');
        }
    }

    /**
     * Facade for client command
     *
     * @param array|PaymentCardToken $data
     * @param string $cardId
     *
     * @return PaymentCard
     */
    public static function createFromToken($data, $cardId = null)
    {
        if (is_string($data)) {
            $data = ['token' => $data];
        }

        if (isset($cardId)) {
            return Client::put($data, 'payment-cards/{cardId}', ['cardId' => $cardId]);
        } else {
            return Client::post($data, 'payment-cards');
        }
    }

    /**
     * Facade for client command
     *
     * @param array|PaymentCardAuthorization $data
     * @param string $cardId
     *
     * @return PaymentCard
     *
     */
    public static function authorize($data, $cardId)
    {
        return Client::post($data, 'payment-cards/{cardId}/authorization', ['cardId' => $cardId]);
    }

    /**
     * Facade for client command
     *
     * @param string $cardId
     *
     * @return PaymentCard
     */
    public static function deactivate($cardId)
    {
        return Client::post([], 'payment-cards/{cardId}/deactivation', ['cardId' => $cardId]);
    }
}
