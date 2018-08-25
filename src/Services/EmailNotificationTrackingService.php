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
use Rebilly\Entities\EmailNotifications\EmailNotificationTracking;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class EmailNotificationTrackingService
 */
final class EmailNotificationTrackingService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return EmailNotificationTracking[]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'tracking/email-notifications', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return EmailNotificationTracking[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('tracking/email-notifications', $params);
    }

    /**
     * @param string $trackId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return EmailNotificationTracking
     */
    public function load($trackId, $params = [])
    {
        return $this->client()->get('tracking/email-notifications/{trackId}', ['trackId' => $trackId] + (array) $params);
    }
}
