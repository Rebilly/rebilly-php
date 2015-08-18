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
use Rebilly\Entities\AuthenticationToken;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Resource\Collection;
use Rebilly\Resource\Service;

/**
 * Class AuthenticationTokenService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class AuthenticationTokenService extends Service
{
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
     * @throws NotFoundException The resource data does exist
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
     * @param array|AuthenticationToken $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return AuthenticationToken
     */
    public function login($data)
    {
        return $this->client()->post($data, 'authentication-tokens');
    }

    /**
     * @param string $token
     *
     * @return AuthenticationToken
     */
    public function logout($token)
    {
        $this->client()->delete('authentication-tokens/{token}', ['token' => $token]);
    }
}
