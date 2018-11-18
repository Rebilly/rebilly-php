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
use Rebilly\Entities\WebhookCredential;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class WebhookCredentialsService
 */
final class WebhookCredentialsService extends Service
{
	/**
	 * @param string $hash
	 *
	 * @throws NotFoundException The resource data does exist
	 *
	 * @return WebhookCredential
	 */
	public function load($hash)
	{
		return $this->client()->get('credential-hashes/webhooks/{hash}', ['hash' => $hash]);
	}

	/**
	 * @param array|JsonSerializable|WebhookCredential $data
	 *
	 * @return WebhookCredential
	 */
	public function create($data)
	{
		return $this->client()->post($data, 'credential-hashes/webhooks');
	}
}
