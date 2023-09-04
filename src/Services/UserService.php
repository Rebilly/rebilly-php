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
use Rebilly\Entities\Session;
use Rebilly\Entities\Signup;
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
     * @param array|JsonSerializable|ForgotPassword $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return null
     */
    public function forgotPassword($data)
    {
        return $this->client()->post($data, 'forgot-password');
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
     * @throws NotFoundException if resource does not exist
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
     * @throws DataValidationException if input data is not valid
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
     * @param array|JsonSerializable|User $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return User
     */
    public function update($userId, $data)
    {
        return $this->client()->put($data, 'users/{userId}', ['userId' => $userId]);
    }
}
