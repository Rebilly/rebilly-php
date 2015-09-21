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
use Rebilly\Entities\Organization;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class OrganizationService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class OrganizationService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Organization[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'organizations', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Organization[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('organizations', $params);
    }

    /**
     * @param string $organizationId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Organization
     */
    public function load($organizationId, $params = [])
    {
        return $this->client()->get('organizations/{organizationId}', ['organizationId' => $organizationId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Organization $data
     * @param string $organizationId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Organization
     */
    public function create($data, $organizationId = null)
    {
        if (isset($organizationId)) {
            return $this->client()->put($data, 'organizations/{organizationId}', ['organizationId' => $organizationId]);
        } else {
            return $this->client()->post($data, 'organizations');
        }
    }

    /**
     * @param string $organizationId
     * @param array|JsonSerializable|Organization $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Organization
     */
    public function update($organizationId, $data)
    {
        return $this->client()->put($data, 'organizations/{organizationId}', ['organizationId' => $organizationId]);
    }

    /**
     * @param string $organizationId
     */
    public function delete($organizationId)
    {
        $this->client()->delete('organizations/{organizationId}', ['organizationId' => $organizationId]);
    }
}
