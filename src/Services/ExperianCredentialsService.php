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
use Rebilly\Entities\ExperianCredential;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

final class ExperianCredentialsService extends Service
{
    /**
     * @return ExperianCredential[]|Collection
     */
    public function search()
    {
        return $this->client()->get('credential-hashes/experian');
    }

    /**
     * @param array|JsonSerializable|ExperianCredential $data
     *
     * @return ExperianCredential
     */
    public function create($data)
    {
        return $this->client()->post($data, 'credential-hashes/experian');
    }

    /**
     * @param string $hash
     *
     * @return ExperianCredential
     */
    public function load($hash)
    {
        return $this->client()->get('credential-hashes/experian/{hash}', ['hash' => $hash]);
    }

    /**
     * @param string $hash
     * @param array|JsonSerializable|ExperianCredential $data
     *
     * @return ExperianCredential
     */
    public function patch($hash, $data)
    {
        return $this->client()->patch($data, 'credential-hashes/experian/{hash}', ['hash' => $hash]);
    }
}
