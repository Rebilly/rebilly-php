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

use JsonSerializable;
use Rebilly\Entities\Email;
use Rebilly\Entities\Login;
use Rebilly\Entities\ResetPassword;
use Rebilly\Entities\Session;
use Rebilly\Entities\Signup;
use Rebilly\Entities\User;
use Rebilly\Http\Exception\UnprocessableEntityException;
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
}
