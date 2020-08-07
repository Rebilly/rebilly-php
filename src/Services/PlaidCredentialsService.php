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
use Rebilly\Entities\PlaidCredential;
use Rebilly\Rest\Service;

final class PlaidCredentialsService extends Service
{
    /**
     * @param array|JsonSerializable|PlaidCredential $data
     *
     * @return PlaidCredential
     */
    public function create($data)
    {
        return $this->client()->post($data, 'credential-hashes/plaid');
    }

    /**
     * @param string $hash
     *
     * @return PlaidCredential
     */
    public function load($hash)
    {
        return $this->client()->get('credential-hashes/plaid/{hash}', ['hash' => $hash]);
    }

    /**
     * @param string $hash
     * @param array|JsonSerializable|PlaidCredential $data
     *
     * @return PlaidCredential
     */
    public function patch($hash, $data)
    {
        return $this->client()->patch($data, 'credential-hashes/plaid/{hash}', ['hash' => $hash]);
    }
}
