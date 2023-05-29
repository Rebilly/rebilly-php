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
        return $this->client()->post($data, 'service-credentials/plaid');
    }

    /**
     * @param string $id
     *
     * @return PlaidCredential
     */
    public function load($id)
    {
        return $this->client()->get('service-credentials/plaid/{id}', ['id' => $id]);
    }

    /**
     * @param string $id
     * @param array|JsonSerializable|PlaidCredential $data
     *
     * @return PlaidCredential
     */
    public function patch($id, $data)
    {
        return $this->client()->patch($data, 'service-credentials/plaid/{id}', ['id' => $id]);
    }
}
