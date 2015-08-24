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
use Rebilly\Entities\ResetPasswordToken;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class ResetPasswordTokenService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class ResetPasswordTokenService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return ResetPasswordToken[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('password-tokens', $params);
    }

    /**
     * @param string $token
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return ResetPasswordToken
     */
    public function load($token, $params = [])
    {
        return $this->client()->get('password-tokens/{token}', ['token' => $token] + (array) $params);
    }

    /**
     * @param array|ResetPasswordToken $data
     * @param string $token
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return ResetPasswordToken
     */
    public function create($data, $token = null)
    {
        if (isset($token)) {
            return $this->client()->put($data, 'password-tokens/{token}', ['token' => $token]);
        } else {
            return $this->client()->post($data, 'password-tokens');
        }
    }
}
