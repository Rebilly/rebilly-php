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
use Rebilly\Entities\GatewayAccount;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class GatewayAccountService
 *
 */
final class GatewayAccountService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return GatewayAccount[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'gateway-accounts', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return GatewayAccount[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('gateway-accounts', $params);
    }

    /**
     * @param string $gatewayAccountId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return GatewayAccount
     */
    public function load($gatewayAccountId, $params = [])
    {
        return $this->client()->get('gateway-accounts/{gatewayAccountId}', ['gatewayAccountId' => $gatewayAccountId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|GatewayAccount $data
     * @param string $gatewayAccountId
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return GatewayAccount
     */
    public function create($data, $gatewayAccountId = null)
    {
        if (isset($gatewayAccountId)) {
            return $this->client()->put($data, 'gateway-accounts/{gatewayAccountId}', ['gatewayAccountId' => $gatewayAccountId]);
        }

        return $this->client()->post($data, 'gateway-accounts');
    }

    /**
     * @param string $gatewayAccountId
     * @param array|JsonSerializable|GatewayAccount $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return GatewayAccount
     */
    public function update($gatewayAccountId, $data)
    {
        return $this->client()->put($data, 'gateway-accounts/{gatewayAccountId}', ['gatewayAccountId' => $gatewayAccountId]);
    }

    /**
     * @param string $gatewayAccountId
     */
    public function delete($gatewayAccountId)
    {
        $this->client()->delete('gateway-accounts/{gatewayAccountId}', ['gatewayAccountId' => $gatewayAccountId]);
    }

    /**
     * @param string $gatewayAccountId
     * @param array|JsonSerializable $data
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return bool
     */
    public function checkCredentials($gatewayAccountId, $data = [])
    {
        try {
            return empty($this->client()->post($data, 'gateway-accounts/{gatewayAccountId}/check-credentials', ['gatewayAccountId' => $gatewayAccountId]));
        } catch (DataValidationException $ex) {
            return false;
        }
    }
}
