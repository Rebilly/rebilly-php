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
use Rebilly\Entities\ThreeDSecure;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class ThreeDSecureService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class ThreeDSecureService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return ThreeDSecure[]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), '3dsecure', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return ThreeDSecure[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('3dsecure', $params);
    }

    /**
     * @param string $websiteId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return ThreeDSecure
     */
    public function load($websiteId, $params = [])
    {
        return $this->client()->get('3dsecure/{3dsecureId}', ['3dsecureId' => $websiteId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|ThreeDSecure $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return ThreeDSecure
     */
    public function create($data)
    {
        return $this->client()->post($data, '3dsecure');
    }
}
