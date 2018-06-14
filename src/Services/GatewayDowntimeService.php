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
use Rebilly\Entities\GatewayDowntime;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class GatewayDowntimeService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 */
final class GatewayDowntimeService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return GatewayDowntime[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'gateway-account-downtimes', (array) $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return GatewayDowntime[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('gateway-account-downtimes', (array) $params);
    }

    /**
     * @param string $downtimeId
     * @param array|ArrayObject $params
     *
     * @return GatewayDowntime
     */
    public function load($downtimeId, $params = [])
    {
        return $this->client()->get(
            'gateway-account-downtimes/{downtimeId}',
            ['downtimeId' => $downtimeId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|GatewayDowntime $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return GatewayDowntime
     */
    public function create($data)
    {
        return $this->client()->post($data, 'gateway-account-downtimes');
    }

    /**
     * @param string $downtimeId
     * @param array|JsonSerializable|GatewayDowntime $data
     *
     * @throws UnprocessableEntityException The input data is not valid
     *
     * @return GatewayDowntime
     */
    public function update($downtimeId, $data)
    {
        return $this->client()->put($data, 'gateway-account-downtimes/{downtimeId}', ['downtimeId' => $downtimeId]);
    }

    /**
     * @param string $downtimeId
     */
    public function delete($downtimeId)
    {
        $this->client()->delete(
            'gateway-account-downtimes/{downtimeId}',
            ['downtimeId' => $downtimeId]
        );
    }
}
