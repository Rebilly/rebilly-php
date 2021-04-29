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
use Rebilly\Entities\CustomerCredential;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CustomerCredentialService
 *
 */
final class CustomerCredentialService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return CustomerCredential[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'credentials', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return CustomerCredential[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('credentials', $params);
    }

    /**
     * @param string $credentialId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return CustomerCredential
     */
    public function load($credentialId, $params = [])
    {
        return $this->client()->get('credentials/{credentialId}', ['credentialId' => $credentialId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|CustomerCredential $data
     * @param string $credentialId
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return CustomerCredential
     */
    public function create($data, $credentialId = null)
    {
        if (isset($credentialId)) {
            return $this->client()->put($data, 'credentials/{credentialId}', ['credentialId' => $credentialId]);
        }

        return $this->client()->post($data, 'credentials');
    }

    /**
     * @param string $credentialId
     * @param array|JsonSerializable|CustomerCredential $data
     *
     * @throws DataValidationException The input data does not valid
     *
     * @return CustomerCredential
     */
    public function update($credentialId, $data)
    {
        return $this->client()->put($data, 'credentials/{credentialId}', ['credentialId' => $credentialId]);
    }

    /**
     * @param string $credentialId
     */
    public function delete($credentialId)
    {
        $this->client()->delete('credentials/{credentialId}', ['credentialId' => $credentialId]);
    }
}
