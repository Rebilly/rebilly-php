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
use Rebilly\Entities\WebhookTracking;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class WebhookTrackingService
 */
final class WebhookTrackingService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return WebhookTracking[]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'tracking/webhooks', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return WebhookTracking[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('tracking/webhooks', $params);
    }

    /**
     * @param string $trackId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return WebhookTracking
     */
    public function load($trackId, $params = [])
    {
        return $this->client()->get('tracking/webhooks/{trackId}', ['trackId' => $trackId] + (array) $params);
    }

    /**
     * @param string $trackId
     *
     * @throws NotFoundException The resource data does not exist
     */
    public function resend($trackId)
    {
        return $this->client()->post([], 'tracking/webhooks/{trackId}/resend', ['trackId' => $trackId]);
    }
}
