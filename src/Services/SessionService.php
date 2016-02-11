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
use Rebilly\Entities\Session;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class AclTokenService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class SessionService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Session[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'sessions', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Session[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('sessions', $params);
    }

    /**
     * @param string $tokenId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Session
     */
    public function load($tokenId, $params = [])
    {
        return $this->client()->get('sessions/{tokenId}', ['tokenId' => $tokenId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Session $data
     * @param string $tokenId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Session
     */
    public function create($data, $tokenId = null)
    {
        if (isset($tokenId)) {
            return $this->client()->put($data, 'sessions/{tokenId}', ['tokenId' => $tokenId]);
        } else {
            return $this->client()->post($data, 'sessions');
        }
    }

    /**
     * @param string $tokenId
     * @param array|JsonSerializable|Session $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Session
     */
    public function update($tokenId, $data)
    {
        return $this->client()->put($data, 'sessions/{tokenId}', ['tokenId' => $tokenId]);
    }

    /**
     * @param string $tokenId
     */
    public function delete($tokenId)
    {
        $this->client()->delete('sessions/{tokenId}', ['tokenId' => $tokenId]);
    }
}
