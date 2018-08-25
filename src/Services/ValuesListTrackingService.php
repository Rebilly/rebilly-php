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
use Rebilly\Entities\ValuesList;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class ValuesListTrackingService
 */
final class ValuesListTrackingService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return ValuesList[]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'tracking/lists', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return ValuesList[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('tracking/lists', $params);
    }
}
