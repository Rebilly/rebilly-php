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
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
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
     * @return Webkook[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'webhooks', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Webkook[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('webhooks', $params);
    }

    /**
     * @param string $webhookId
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Webkook
     */
    public function load($webhookId)
    {
        return $this->client()->get('webhooks/{webhookId}', ['webhookId' => $webhookId]);
    }

    /**
     * @param array|JsonSerializable|Webkook $data
     * @param null $webhookId
     *
     * @return Webkook
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
     * @param array|JsonSerializable|Webkook $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Webkook
     */
    public function update($webhookId, $data)
    {
        return $this->client()->put($data, 'webhooks/{webhookId}', ['webhookId' => $webhookId]);
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function preview($data)
    {
        return $this->client()->post($data, 'previews/webhooks');
    }
}
