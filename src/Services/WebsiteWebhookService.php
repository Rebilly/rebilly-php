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
use Rebilly\Entities\WebsiteWebhook;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class WebsiteWebhookService
 */
final class WebsiteWebhookService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return WebsiteWebhook[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'websites', $params);
    }

    /**
     * @param string $websiteId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return WebsiteWebhook
     */
    public function load($websiteId, $params = [])
    {
        return $this->client()->get('websites/{websiteId}/webhook', ['websiteId' => $websiteId] + (array) $params);
    }

    /**
     * @param string $websiteId
     * @param array|JsonSerializable|WebsiteWebhook $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return WebsiteWebhook
     */
    public function update($websiteId, $data)
    {
        return $this->client()->put($data, 'websites/{websiteId}/webhook', ['websiteId' => $websiteId]);
    }

    /**
     * @param string $websiteId
     */
    public function delete($websiteId)
    {
        $this->client()->delete('websites/{websiteId}/webhook', ['websiteId' => $websiteId]);
    }
}
