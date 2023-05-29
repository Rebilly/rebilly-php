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
        return $this->client()->get('service-credentials/taxjar');
    }

    /**
     * @param array|JsonSerializable|TaxJarCredential $data
     *
     * @return TaxJarCredential
     */
    public function create($data)
    {
        return $this->client()->post($data, 'service-credentials/taxjar');
    }

    /**
     * @param string $id
     *
     * @return TaxJarCredential
     */
    public function load($id)
    {
        return $this->client()->get('service-credentials/taxjar/{id}', ['id' => $id]);
    }

    /**
     * @param string $id
     * @param array|JsonSerializable|TaxJarCredential $data
     *
     * @return TaxJarCredential
     */
    public function patch($id, $data)
    {
        return $this->client()->patch($data, 'service-credentials/taxjar/{id}', ['id' => $id]);
    }
}
