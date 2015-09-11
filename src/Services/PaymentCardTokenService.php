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
use Rebilly\Entities\PaymentCardToken;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PaymentCardTokenService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class PaymentCardTokenService extends Service
{
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
        } else {
            return $this->client()->post($data, 'tokens');
        }
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
     * @throws NotFoundException The resource data does exist
     *
     * @return PaymentCardToken
     */
    public function load($tokenId, $params = [])
    {
        return $this->client()->get('tokens/{tokenId}', ['tokenId' => $tokenId] + (array) $params);
    }

    /**
     * @param string $tokenId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return PaymentCardToken
     */
    public function expire($tokenId, $params = [])
    {
        return $this->client()->post(['tokenId' => $tokenId] + (array) $params, 'tokens/'.$tokenId.'/expiration');
    }
}
