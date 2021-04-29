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
use Rebilly\Entities\AuthenticationToken;
use Rebilly\Entities\Session;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class AuthenticationTokenService
 *
 */
final class AuthenticationTokenService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return AuthenticationToken[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'authentication-tokens', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return AuthenticationToken[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('authentication-tokens', $params);
    }

    /**
     * @param string $token
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return AuthenticationToken
     */
    public function load($token, $params = [])
    {
        return $this->client()->get('authentication-tokens/{token}', ['token' => $token] + (array) $params);
    }

    /**
     * @param string $token
     *
     * @return bool
     */
    public function verify($token)
    {
        try {
            $this->client()->head('authentication-tokens/{token}', ['token' => $token]);

            return true;
        } catch (NotFoundException $e) {
            return false;
        }
    }

    /**
     * @param array|JsonSerializable|AuthenticationToken $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return AuthenticationToken
     */
    public function login($data)
    {
        return $this->client()->post($data, 'authentication-tokens');
    }

    /**
     * @param string $token
     */
    public function logout($token)
    {
        $this->client()->delete('authentication-tokens/{token}', ['token' => $token]);
    }

    /**
     * @param string $token
     * @param array|JsonSerializable|AuthenticationToken $data
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return Session
     */
    public function exchange($token, $data)
    {
        return $this->client()->post($data, 'authentication-tokens/{token}/exchange', ['token' => $token]);
    }
}
