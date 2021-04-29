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
use Rebilly\Entities\Session;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Rest\Service;

/**
 * Class SessionService
 *
 */
final class SessionService extends Service
{
    /**
     * @param string $tokenId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
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
     * @throws DataValidationException The input data does not valid
     *
     * @return Session
     */
    public function create($data, $tokenId = null)
    {
        if (isset($tokenId)) {
            return $this->client()->put($data, 'sessions/{tokenId}', ['tokenId' => $tokenId]);
        }

        return $this->client()->post($data, 'sessions');
    }

    /**
     * @param string $tokenId
     * @param array|JsonSerializable|Session $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return Session
     */
    public function update($tokenId, $data)
    {
        return $this->client()->put($data, 'sessions/{tokenId}', ['tokenId' => $tokenId]);
    }

    public function logout()
    {
        $this->client()->post([], 'logout');
    }
}
