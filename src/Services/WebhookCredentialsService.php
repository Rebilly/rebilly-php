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

use JsonSerializable;
use Rebilly\Entities\WebhookCredential;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Rest\Service;

/**
 * Class WebhookCredentialsService
 */
final class WebhookCredentialsService extends Service
{
    /**
     * @param string $id
     *
     * @throws NotFoundException if resource does not exist
     *
     * @return WebhookCredential
     */
    public function load($id)
    {
        return $this->client()->get('service-credentials/webhook/{id}', ['id' => $id]);
    }

    /**
     * @param array|JsonSerializable|WebhookCredential $data
     *
     * @return WebhookCredential
     */
    public function create($data)
    {
        return $this->client()->post($data, 'service-credentials/webhook');
    }
}
