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
use Rebilly\Entities\SubscriptionReactivation;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

class SubscriptionReactivationService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return SubscriptionReactivation[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'subscription-reactivations', $params);
    }

    /**
     * @param string $subscriptionId
     * @param array|JsonSerializable|SubscriptionReactivation $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return SubscriptionReactivation
     */
    public function create($data)
    {
        return $this->client()->post(
            $data,
            'subscription-reactivations'
        );
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return SubscriptionReactivation[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('subscription-reactivations', $params);
    }

    /**
     * @param string $reactivationId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return SubscriptionReactivation
     */
    public function load($reactivationId, $params = [])
    {
        return $this->client()->get(
            'subscription-reactivations/{reactivationId}',
            ['reactivationId' => $reactivationId] + (array) $params
        );
    }
}
