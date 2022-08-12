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

declare(strict_types=1);

namespace Rebilly\Sdk\Api;

use GuzzleHttp\ClientInterface;

use function GuzzleHttp\json_decode;

use GuzzleHttp\Psr7\Request;
use Rebilly\Sdk\Model\EmailNotification;

class EmailNotificationsApi
{
    public function __construct(protected readonly ?ClientInterface $client)
    {
    }

    /**
     * @return EmailNotification[]
     */
    public function getAll(
    ): array {
        $uri = '/email-notifications';

        $request = new Request('GET', $uri);
        $response = $this->client->send($request);
        $data = json_decode((string) $response->getBody(), true);

        return array_map(fn (array $item): EmailNotification => EmailNotification::from($item), $data);
    }
}
