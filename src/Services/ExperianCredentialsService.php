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
        return $this->client()->get('service-credentials/experian');
    }

    /**
     * @param array|JsonSerializable|ExperianCredential $data
     *
     * @return ExperianCredential
     */
    public function create($data)
    {
        return $this->client()->post($data, 'service-credentials/experian');
    }

    /**
     * @param string $id
     *
     * @return ExperianCredential
     */
    public function load($id)
    {
        return $this->client()->get('service-credentials/experian/{id}', ['id' => $id]);
    }

    /**
     * @param string $id
     * @param array|JsonSerializable|ExperianCredential $data
     *
     * @return ExperianCredential
     */
    public function patch($id, $data)
    {
        return $this->client()->patch($data, 'service-credentials/experian/{id}', ['id' => $id]);
    }
}
