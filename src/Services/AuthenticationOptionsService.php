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
use Rebilly\Entities\AuthenticationOptions;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Rest\Service;

/**
 * Class AuthenticationOptionsService
 *
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
     * @throws DataValidationException if input data is not valid
     *
     * @return AuthenticationOptions
     */
    public function update($data)
    {
        return $this->client()->put($data, 'authentication-options');
    }
}
