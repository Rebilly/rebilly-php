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
use Rebilly\Entities\Subscription;
use Rebilly\Entities\SubscriptionCancel;
use Rebilly\Entities\SubscriptionChangePlan;
use Rebilly\Entities\SubscriptionInterimInvoice;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class SubscriptionService
 *
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
        }

        return $this->client()->post($data, 'subscriptions');
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
     * @param array|JsonSerializable|SubscriptionChangePlan $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Subscription
     */
    public function changePlan($subscriptionId, $data)
    {
        return $this->client()->post(
            $data,
            'subscriptions/{subscriptionId}/change-plan',
            ['subscriptionId' => $subscriptionId]
        );
    }

    /**
     * @param string $subscriptionId
     * @param array|JsonSerializable|SubscriptionInterimInvoice $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Invoice
     */
    public function issueInterimInvoice($subscriptionId, $data)
    {
        return $this->client()->post(
            $data,
            'subscriptions/{subscriptionId}/interim-invoice',
            ['subscriptionId' => $subscriptionId]
        );
    }
}
