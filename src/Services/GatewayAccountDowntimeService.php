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
use Rebilly\Entities\GatewayAccountDowntime;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class GatewayAccountDowntimeService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
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
            ['downtimeId' => $downtimeId, 'gatewayAccountId' => $gatewayAccountId] + (array) $params);
    }

    /**
     * @param string $gatewayAccountId
     * @param array|JsonSerializable|GatewayAccountDowntime $data
     *
     * @throws UnprocessableEntityException The input data does not valid
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
     * @throws UnprocessableEntityException The input data is not valid
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
