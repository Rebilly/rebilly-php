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
use Rebilly\Entities\CustomerTimelineMessage;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

final class CustomerTimelineService extends Service
{
    /**
     * @param string $customerId
     * @param array|ArrayObject $params
     *
     * @return CustomerTimelineMessage[][]|Collection[]|Paginator
     */
    public function paginator($customerId, $params = [])
    {
        return new Paginator(
            $this->client(),
            'customers/{customerId}/timeline',
            ['customerId' => $customerId] + (array) $params
        );
    }

    /**
     * @param string $customerId
     * @param array|ArrayObject $params
     *
     * @return CustomerTimelineMessage[]|Collection
     */
    public function searchByCustomer($customerId, $params = [])
    {
        return $this->client()->get(
            'customers/{customerId}/timeline',
            ['customerId' => $customerId] + (array) $params
        );
    }

    /**
     * @param string $customerId
     * @param string $messageId
     * @param array|ArrayObject $params
     *
     * @return CustomerTimelineMessage
     */
    public function load($customerId, $messageId, $params = [])
    {
        return $this->client()->get(
            'customers/{customerId}/timeline/{messageId}',
            [
                'customerId' => $customerId,
                'messageId' => $messageId,
            ] + (array) $params
        );
    }

    /**
     * @param array|JsonSerializable|CustomerTimelineMessage $data
     * @param string $customerId
     *
     * @return CustomerTimelineMessage
     */
    public function create($data, $customerId)
    {
        return $this->client()->post(
            $data,
            'customers/{customerId}/timeline',
            ['customerId' => $customerId]
        );
    }
}
