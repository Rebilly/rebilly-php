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
use Rebilly\Entities\Subscription;
use Rebilly\Entities\SubscriptionCancel;
use Rebilly\Entities\SubscriptionSwitch;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class SubscriptionService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class SubscriptionService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Subscription[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'subscriptions', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Subscription[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('subscriptions', $params);
    }

    /**
     * @param string $subscriptionId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Subscription
     */
    public function load($subscriptionId, $params = [])
    {
        return $this->client()->get('subscriptions/{subscriptionId}', ['subscriptionId' => $subscriptionId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Subscription $data
     * @param string $subscriptionId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Subscription
     */
    public function create($data, $subscriptionId = null)
    {
        if (isset($subscriptionId)) {
            return $this->client()->put($data, 'subscriptions/{subscriptionId}', ['subscriptionId' => $subscriptionId]);
        } else {
            return $this->client()->post($data, 'subscriptions');
        }
    }

    /**
     * @param string $subscriptionId
     * @param array|JsonSerializable|Subscription $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Subscription
     */
    public function update($subscriptionId, $data)
    {
        return $this->client()->put($data, 'subscriptions/{subscriptionId}', ['subscriptionId' => $subscriptionId]);
    }

    /**
     * @param string $subscriptionId
     * @param array|JsonSerializable|SubscriptionCancel $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Subscription
     */
    public function cancel($subscriptionId, $data)
    {
        return $this->client()->post(
            $data,
            'subscriptions/{subscriptionId}/cancel',
            ['subscriptionId' => $subscriptionId]
        );
    }

    /**
     * @param string $subscriptionId
     * @param array|JsonSerializable|SubscriptionSwitch $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Subscription
     */
    public function switchTo($subscriptionId, $data)
    {
        return $this->client()->post(
            $data,
            'subscriptions/{subscriptionId}/switch',
            ['subscriptionId' => $subscriptionId]
        );
    }
}
