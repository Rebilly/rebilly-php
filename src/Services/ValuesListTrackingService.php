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
