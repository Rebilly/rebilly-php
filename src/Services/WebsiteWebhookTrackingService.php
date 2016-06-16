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
use Rebilly\Entities\WebsiteWebhookTracking;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class WebhookTrackingService
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class WebsiteWebhookTrackingService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return WebsiteWebhookTracking[]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'tracking/website-webhooks', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return WebsiteWebhookTracking[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('tracking/website-webhooks', $params);
    }

    /**
     * @param string $trackId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return WebsiteWebhookTracking
     */
    public function load($trackId, $params = [])
    {
        return $this->client()->get('tracking/website-webhooks/{trackId}', ['trackId' => $trackId] + (array) $params);
    }
}
