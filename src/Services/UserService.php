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
use Rebilly\Entities\Email;
use Rebilly\Entities\Login;
use Rebilly\Entities\ResetPassword;
use Rebilly\Entities\Session;
use Rebilly\Entities\Signup;
use Rebilly\Entities\User;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class UserService
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class UserService extends Service
{
    /**
     * @param array|JsonSerializable|Login $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Session
     */
    public function login($data)
    {
        return $this->client()->post($data, 'users/login');
    }

    /**
     * @param array|JsonSerializable|Signup $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return User
     */
    public function signup($data)
    {
        return $this->client()->post($data, 'users/signup');
    }

    /**
     * @param array|JsonSerializable|Email $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Email
     */
    public function forgotPassword($data)
    {
        return $this->client()->put($data, 'users/forgot-password');
    }

    /**
     * @param array|JsonSerializable|ResetPassword $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return User
     */
    public function resetPassword($data)
    {
        return $this->client()->put($data, 'users/reset-password');
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return User[]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'users', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return User[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('users', $params);
    }

    /**
     * @param string $userId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return User
     */
    public function load($userId, $params = [])
    {
        return $this->client()->get('users/{userId}', ['userId' => $userId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|User $data
     * @param string $userId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return User
     */
    public function create($data, $userId = null)
    {
        if (isset($userId)) {
            return $this->client()->put($data, 'users/{userId}', ['userId' => $userId]);
        } else {
            return $this->client()->post($data, 'users');
        }
    }

    /**
     * @param string $userId
     * @param array|JsonSerializable|User $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return User
     */
    public function update($userId, $data)
    {
        return $this->client()->put($data, 'users/{userId}', ['userId' => $userId]);
    }

    /**
     * @param string $userId
     */
    public function delete($userId)
    {
        $this->client()->delete('users/{userId}', ['userId' => $userId]);
    }
}
