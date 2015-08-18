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
use Rebilly\Client;
use Rebilly\Resource\Collection;
use Rebilly\Resource\Entity;

/**
 * Class Subscription.
 *
 * ```json
 * {
 *   "id"
 *   "customerId"
 *   "plan"
 *   "website"
 *   "invoice"
 *   "billingAddress"
 *   "deliveryAddress"
 *   "quantity"
 * }
 * ```
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class Subscription extends Entity
{
    /********************************************************************************
     * Resource Getters and Setters
     *******************************************************************************/

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
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @param string $value
     *
     * @return Subscription
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
    }

    /**
     * @return string
     */
    public function getPlanId()
    {
        return $this->getAttribute('plan');
    }

    /**
     * @param string $value
     *
     * @return Subscription
     */
    public function setPlanId($value)
    {
        return $this->setAttribute('plan', $value);
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
     * @return Subscription
     */
    public function setWebsiteId($value)
    {
        return $this->setAttribute('website', $value);
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
     * @return Subscription
     */
    public function setQuantity($value)
    {
        return $this->setAttribute('quantity', (int) $value);
    }

    /**
     * @return string
     */
    public function getBillingAddressId()
    {
        return $this->getAttribute('billingAddress');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setBillingAddressId($value)
    {
        return $this->setAttribute('billingAddress', $value);
    }

    /**
     * @return string
     */
    public function getDeliveryAddressId()
    {
        return $this->getAttribute('deliveryAddress');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDeliveryAddressId($value)
    {
        return $this->setAttribute('deliveryAddress', $value);
    }

    /**
     * @return string
     */
    public function getStartTime()
    {
        return $this->getAttribute('startTime');
    }

    /**
     * @return string
     */
    public function getEndTime()
    {
        return $this->getAttribute('endTime');
    }

    /**
     * @return string
     */
    public function getCancelledTime()
    {
        return $this->getAttribute('cancelledTime');
    }

    /**
     * @return string
     */
    public function getRenewalTime()
    {
        return $this->getAttribute('renewalTime');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setRenewalTime($value)
    {
        return $this->setAttribute('renewalTime', $value);
    }

    /********************************************************************************
     * Subscription API Facades
     *******************************************************************************/

    /**
     * Facade for client command
     *
     * @param array|ArrayObject $params
     *
     * @return Subscription[]|Collection
     */
    public static function search($params = [])
    {
        return Client::get('subscriptions', $params);
    }

    /**
     * Facade for client command
     *
     * @param string $subscriptionId
     * @param array|ArrayObject $params
     *
     * @return Subscription
     */
    public static function load($subscriptionId, $params = [])
    {

        $params['subscriptionId'] = $subscriptionId;

        return Client::get('subscriptions/{subscriptionId}', $params);
    }

    /**
     * Facade for client command
     *
     * @param array|Subscription $data
     * @param string $subscriptionId
     *
     * @return Subscription
     */
    public static function create($data, $subscriptionId = null)
    {
        if (isset($subscriptionId)) {
            return Client::put($data, 'subscriptions/{subscriptionId}', ['subscriptionId' => $subscriptionId]);
        } else {
            return Client::post($data, 'subscriptions');
        }
    }

    /**
     * Facade for client command
     *
     * @param string $subscriptionId
     * @param array|Subscription $data
     *
     * @return Subscription
     */
    public static function update($subscriptionId, $data)
    {
        return Client::put($data, 'subscriptions/{subscriptionId}', ['subscriptionId' => $subscriptionId]);
    }

    /**
     * Facade for client command
     *
     * @param string $subscriptionId
     * @param array|SubscriptionCancel $data
     *
     * @return Subscription
     */
    public static function cancel($subscriptionId, $data)
    {
        return Client::post(
            $data,
            'subscriptions/{subscriptionId}/cancel',
            ['subscriptionId' => $subscriptionId]
        );
    }

    /**
     * Facade for client command
     *
     * @param string $subscriptionId
     * @param array|SubscriptionSwitch $data
     *
     * @return Subscription
     */
    public static function switchTo($subscriptionId, $data)
    {
        return Client::post(
            $data,
            'subscriptions/{subscriptionId}/switch',
            ['subscriptionId' => $subscriptionId]
        );
    }
}
