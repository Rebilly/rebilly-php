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
use Rebilly\Entities\ThreeDSecure;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class ThreeDSecureService
 *
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
     * @throws NotFoundException The resource data does not exist
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
     * @throws DataValidationException The input data does not valid
     *
     * @return ThreeDSecure
     */
    public function create($data)
    {
        return $this->client()->post($data, '3dsecure');
    }
}
