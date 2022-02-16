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
use Rebilly\Entities\SubscriptionPause;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

class SubscriptionPauseService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return SubscriptionPause[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'subscription-pauses', $params);
    }

    /**
     * @param array|JsonSerializable|SubscriptionPause $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return SubscriptionPause
     */
    public function create($data)
    {
        return $this->client()->post(
            $data,
            'subscription-pauses'
        );
    }

    /**
     * @param string $subscriptionPauseId
     * @param array|JsonSerializable|SubscriptionPause $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return SubscriptionPause
     */
    public function update($subscriptionPauseId, $data)
    {
        return $this->client()->put(
            $data,
            'subscription-pauses/{subscriptionPauseId}',
            ['subscriptionPauseId' => $subscriptionPauseId]
        );
    }

    public function delete(string $subscriptionPauseId): void
    {
        $this->client()->delete(
            'subscription-pauses/{subscriptionPauseId}',
            ['subscriptionPauseId' => $subscriptionPauseId]
        );
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return SubscriptionPause[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('subscription-pauses', $params);
    }

    /**
     * @param string $subscriptionPauseId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException if resource does not exist
     *
     * @return SubscriptionPause
     */
    public function load($subscriptionPauseId, $params = [])
    {
        return $this->client()->get(
            'subscription-pauses/{subscriptionPauseId}',
            ['subscriptionPauseId' => $subscriptionPauseId] + (array) $params
        );
    }
}
