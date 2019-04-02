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
use Rebilly\Entities\PaymentCardToken;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PaymentCardTokenService
 *
 */
final class PaymentCardTokenService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return PaymentCardToken[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'tokens', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return PaymentCardToken[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('tokens', $params);
    }

    /**
     * @param string $tokenId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return PaymentCardToken
     */
    public function load($tokenId, $params = [])
    {
        return $this->client()->get('tokens/{tokenId}', ['tokenId' => $tokenId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|PaymentCardToken $data
     * @param string $tokenId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return PaymentCardToken
     */
    public function create($data, $tokenId = null)
    {
        if (isset($tokenId)) {
            return $this->client()->put($data, 'tokens/{tokenId}', ['tokenId' => $tokenId]);
        }

        return $this->client()->post($data, 'tokens');
    }

    /**
     * @param string $tokenId
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return PaymentCardToken
     */
    public function expire($tokenId)
    {
        return $this->client()->post([], 'tokens/{tokenId}/expiration', ['tokenId' => $tokenId]);
    }
}
