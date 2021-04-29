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
use Rebilly\Entities\PaymentToken;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

final class PaymentTokenService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return PaymentToken[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'tokens', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return PaymentToken[]|Collection
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
     * @return PaymentToken
     */
    public function load($tokenId, $params = [])
    {
        return $this->client()->get('tokens/{tokenId}', ['tokenId' => $tokenId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|PaymentToken $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return PaymentToken
     */
    public function create($data)
    {
        return $this->client()->post($data, 'tokens');
    }

    /**
     * @param string $tokenId
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return PaymentToken
     */
    public function expire($tokenId)
    {
        return $this->client()->post([], 'tokens/{tokenId}/expiration', ['tokenId' => $tokenId]);
    }
}
