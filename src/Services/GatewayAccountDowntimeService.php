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
use Rebilly\Entities\GatewayAccountDowntime;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class GatewayAccountDowntimeService
 *
 */
final class GatewayAccountDowntimeService extends Service
{
    /**
     * @param string $gatewayAccountId
     * @param array|ArrayObject $params
     *
     * @return GatewayAccountDowntime[][]|Collection[]|Paginator
     */
    public function paginator($gatewayAccountId, $params = [])
    {
        return new Paginator(
            $this->client(),
            'gateway-accounts/{gatewayAccountId}/downtime-schedules',
            ['gatewayAccountId' => $gatewayAccountId] + (array) $params
        );
    }

    /**
     * @param string $gatewayAccountId
     * @param array|ArrayObject $params
     *
     * @return GatewayAccountDowntime[]|Collection
     */
    public function search($gatewayAccountId, $params = [])
    {
        return $this->client()->get(
            'gateway-accounts/{gatewayAccountId}/downtime-schedules',
            ['gatewayAccountId' => $gatewayAccountId] + (array) $params
        );
    }

    /**
     * @param string $gatewayAccountId
     * @param string $downtimeId
     * @param array|ArrayObject $params
     *
     * @return GatewayAccountDowntime
     */
    public function load($gatewayAccountId, $downtimeId, $params = [])
    {
        return $this->client()->get(
            'gateway-accounts/{gatewayAccountId}/downtime-schedules/{downtimeId}',
            ['downtimeId' => $downtimeId, 'gatewayAccountId' => $gatewayAccountId] + (array) $params
        );
    }

    /**
     * @param string $gatewayAccountId
     * @param array|JsonSerializable|GatewayAccountDowntime $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return GatewayAccountDowntime
     */
    public function create($gatewayAccountId, $data)
    {
        return $this->client()->post(
            $data,
            'gateway-accounts/{gatewayAccountId}/downtime-schedules',
            ['gatewayAccountId' => $gatewayAccountId]
        );
    }

    /**
     * @param string $gatewayAccountId
     * @param string $downtimeId
     * @param array|JsonSerializable|GatewayAccountDowntime $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return GatewayAccountDowntime
     */
    public function update($gatewayAccountId, $downtimeId, $data)
    {
        return $this->client()->put(
            $data,
            'gateway-accounts/{gatewayAccountId}/downtime-schedules/{downtimeId}',
            ['downtimeId' => $downtimeId, 'gatewayAccountId' => $gatewayAccountId]
        );
    }

    /**
     * @param string $gatewayAccountId
     * @param string $downtimeId
     */
    public function delete($gatewayAccountId, $downtimeId)
    {
        $this->client()->delete(
            'gateway-accounts/{gatewayAccountId}/downtime-schedules/{downtimeId}',
            ['downtimeId' => $downtimeId, 'gatewayAccountId' => $gatewayAccountId]
        );
    }
}
