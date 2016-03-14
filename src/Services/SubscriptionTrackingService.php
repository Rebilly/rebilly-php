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
use Rebilly\Entities\SubscriptionTracking;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class SubscriptionTrackingService
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class SubscriptionTrackingService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return SubscriptionTracking[]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'tracking/subscriptions', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return SubscriptionTracking[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('tracking/subscriptions', $params);
    }

    /**
     * @param string $logId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return SubscriptionTracking
     */
    public function load($logId, $params = [])
    {
        return $this->client()->get('tracking/subscriptions/{logId}', ['logId' => $logId] + (array) $params);
    }
}
