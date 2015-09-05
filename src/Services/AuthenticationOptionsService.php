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
use Rebilly\Entities\AuthenticationOptions;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Rest\Service;

/**
 * Class AuthenticationOptionsService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class AuthenticationOptionsService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return AuthenticationOptions
     */
    public function load($params = [])
    {
        return $this->client()->get('authentication-options', $params);
    }

    /**
     * @param array|JsonSerializable|AuthenticationOptions $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return AuthenticationOptions
     */
    public function update($data)
    {
        return $this->client()->put($data, 'authentication-options');
    }
}
