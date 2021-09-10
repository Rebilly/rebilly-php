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
use Rebilly\Entities\TaxJarCredential;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

final class TaxJarCredentialsService extends Service
{
    /**
     * @return TaxJarCredential[]|Collection
     */
    public function search()
    {
        return $this->client()->get('credential-hashes/taxjar');
    }

    /**
     * @param array|JsonSerializable|TaxJarCredential $data
     *
     * @return TaxJarCredential
     */
    public function create($data)
    {
        return $this->client()->post($data, 'credential-hashes/taxjar');
    }

    /**
     * @param string $hash
     *
     * @return TaxJarCredential
     */
    public function load($hash)
    {
        return $this->client()->get('credential-hashes/taxjar/{hash}', ['hash' => $hash]);
    }

    /**
     * @param string $hash
     * @param array|JsonSerializable|TaxJarCredential $data
     *
     * @return TaxJarCredential
     */
    public function patch($hash, $data)
    {
        return $this->client()->patch($data, 'credential-hashes/taxjar/{hash}', ['hash' => $hash]);
    }
}
