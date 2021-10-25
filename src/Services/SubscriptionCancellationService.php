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
use Rebilly\Entities\SubscriptionCancellation;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

class SubscriptionCancellationService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return SubscriptionCancellation[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'subscription-cancellations', $params);
    }

    /**
     * @param array|JsonSerializable|SubscriptionCancellation $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return SubscriptionCancellation
     */
    public function create($data)
    {
        return $this->client()->post(
            $data,
            'subscription-cancellations'
        );
    }

    /**
     * @param string $cancellationId
     * @param array|JsonSerializable|SubscriptionCancellation $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return SubscriptionCancellation
     */
    public function update($cancellationId, $data)
    {
        return $this->client()->put(
            $data,
            'subscription-cancellations/{cancellationId}',
            ['cancellationId' => $cancellationId]
        );
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return SubscriptionCancellation[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('subscription-cancellations', $params);
    }

    /**
     * @param string $cancellationId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException if resource does not exist
     *
     * @return SubscriptionCancellation
     */
    public function load($cancellationId, $params = [])
    {
        return $this->client()->get(
            'subscription-cancellations/{cancellationId}',
            ['cancellationId' => $cancellationId] + (array) $params
        );
    }
}
