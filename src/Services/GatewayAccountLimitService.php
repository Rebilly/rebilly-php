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
use Rebilly\Entities\GatewayAccountLimit;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class GatewayAccountLimitService.
 */
final class GatewayAccountLimitService extends Service
{
    /**
     * @param string $gatewayAccountId
     *
     * @return GatewayAccountLimit[]|Collection
     */
    public function search($gatewayAccountId)
    {
        return $this->client()->get(
            'gateway-accounts/{gatewayAccountId}/limits',
            ['gatewayAccountId' => $gatewayAccountId]
        );
    }

    /**
     * @param string $gatewayAccountId
     * @param string $limitId
     * @param array|ArrayObject $params
     *
     * @return GatewayAccountLimit
     */
    public function load($gatewayAccountId, $limitId, $params = [])
    {
        return $this->client()->get(
            'gateway-accounts/{gatewayAccountId}/limits/{limitId}',
            ['limitId' => $limitId, 'gatewayAccountId' => $gatewayAccountId] + (array) $params
        );
    }

    /**
     * @param string $gatewayAccountId
     * @param string $limitId
     * @param array|JsonSerializable|GatewayAccountLimit $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return GatewayAccountLimit
     */
    public function update($gatewayAccountId, $limitId, $data)
    {
        return $this->client()->put(
            $data,
            'gateway-accounts/{gatewayAccountId}/limits/{limitId}',
            ['limitId' => $limitId, 'gatewayAccountId' => $gatewayAccountId]
        );
    }

    /**
     * @param string $gatewayAccountId
     * @param string $limitId
     */
    public function delete($gatewayAccountId, $limitId)
    {
        $this->client()->delete(
            'gateway-accounts/{gatewayAccountId}/limits/{limitId}',
            ['limitId' => $limitId, 'gatewayAccountId' => $gatewayAccountId]
        );
    }
}
