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
use Rebilly\Entities\Webhook;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class WebhooksService
 */
final class WebhooksService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Webhook[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'webhooks', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Webhook[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('webhooks', $params);
    }

    /**
     * @param string $webhookId
     *
     * @throws NotFoundException if resource does not exist
     *
     * @return Webhook
     */
    public function load($webhookId)
    {
        return $this->client()->get('webhooks/{webhookId}', ['webhookId' => $webhookId]);
    }

    /**
     * @param array|JsonSerializable|Webhook $data
     * @param string|null $webhookId
     *
     * @return Webhook
     */
    public function create($data, $webhookId = null)
    {
        if (isset($webhookId)) {
            return $this->client()->put($data, 'webhooks/{webhookId}', ['webhookId' => $webhookId]);
        }

        return $this->client()->post($data, 'webhooks');
    }

    /**
     * @param string $webhookId
     * @param array|JsonSerializable|Webhook $data
     *
     * @throws DataValidationException if input data is not valid
     *
     * @return Webhook
     */
    public function update($webhookId, $data)
    {
        return $this->client()->put($data, 'webhooks/{webhookId}', ['webhookId' => $webhookId]);
    }

    /**
     * @param array|JsonSerializable|Webhook $data
     *
     * @return Webhook
     */
    public function preview($data)
    {
        return $this->client()->post($data, 'previews/webhooks');
    }
}
