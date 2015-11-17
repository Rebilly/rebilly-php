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
use Rebilly\Entities\GatewayAccount;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class GatewayAccountService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
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
     * @throws NotFoundException The resource data does exist
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
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return GatewayAccount
     */
    public function create($data, $gatewayAccountId = null)
    {
        if (isset($gatewayAccountId)) {
            return $this->client()->put($data, 'gateway-accounts/{gatewayAccountId}', ['gatewayAccountId' => $gatewayAccountId]);
        } else {
            return $this->client()->post($data, 'gateway-accounts');
        }
    }

    /**
     * @param string $gatewayAccountId
     * @param array|JsonSerializable|GatewayAccount $data
     *
     * @throws UnprocessableEntityException The input data does not valid
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
}
