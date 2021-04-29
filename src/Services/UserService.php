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
use Rebilly\Entities\ForgotPassword;
use Rebilly\Entities\Login;
use Rebilly\Entities\ResetPassword;
use Rebilly\Entities\Session;
use Rebilly\Entities\Signup;
use Rebilly\Entities\UpdatePassword;
use Rebilly\Entities\User;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class UserService
 *
 */
final class UserService extends Service
{
    /**
     * @param array|JsonSerializable|Login $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return Session
     */
    public function signin($data)
    {
        return $this->client()->post($data, 'signin');
    }

    /**
     * @param array|JsonSerializable|Signup $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return User
     */
    public function signup($data)
    {
        return $this->client()->post($data, 'signup');
    }

    /**
     * @param array|JsonSerializable|ForgotPassword $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return null
     */
    public function forgotPassword($data)
    {
        return $this->client()->post($data, 'forgot-password');
    }

    /**
     * @param string $token
     * @param array|JsonSerializable|ResetPassword $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return User
     */
    public function resetPassword($token, $data)
    {
        return $this->client()->post($data, 'reset-password/{token}', ['token' => $token]);
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
     * @throws NotFoundException The resource data does not exist
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
     * @throws DataValidationException The input data does not valid
     *
     * @return User
     */
    public function create($data, $userId = null)
    {
        if (isset($userId)) {
            return $this->client()->put($data, 'users/{userId}', ['userId' => $userId]);
        }

        return $this->client()->post($data, 'users');
    }

    /**
     * @param string $userId
     *
     * @return User
     */
    public function resetTotp($userId)
    {
        return $this->client()->post([], 'users/{userId}/totp-reset/', ['userId' => $userId]);
    }

    /**
     * @param string $token
     *
     * @throws DataValidationException The token is not valid
     *
     * @return User
     */
    public function activate($token)
    {
        return $this->client()->post([], 'activation/{token}', ['token' => $token]);
    }

    /**
     * @param string $userId
     * @param array|JsonSerializable|User $data
     *
     * @throws DataValidationException The input data does not valid
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

    /**
     * @param string $userId
     * @param array|JsonSerializable|UpdatePassword $data
     *
     * @return User
     */
    public function updatePassword($userId, $data)
    {
        return $this->client()->post(
            $data,
            'users/{userId}/password',
            [
                'userId' => $userId,
            ]
        );
    }
}
