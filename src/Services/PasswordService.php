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
use Rebilly\Entities\Password;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class PasswordService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class PasswordService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Password[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'passwords', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Password[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('passwords', $params);
    }

    /**
     * @param string $token
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Password
     */
    public function load($token, $params = [])
    {
        return $this->client()->get('passwords/{token}', ['token' => $token] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Password $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Password
     */
    public function create($data)
    {
        return $this->client()->post($data, 'passwords');
    }
}
