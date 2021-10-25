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
use Rebilly\Entities\ApiTracking;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class ApiTrackingService
 *
 */
final class ApiTrackingService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return ApiTracking[]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'tracking/api', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return ApiTracking[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('tracking/api', $params);
    }

    /**
     * @param string $logId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException if resource does not exist
     *
     * @return ApiTracking
     */
    public function load($logId, $params = [])
    {
        return $this->client()->get('tracking/api/{logId}', ['logId' => $logId] + (array) $params);
    }
}
