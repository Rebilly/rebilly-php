<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Rebilly\Services;

use ArrayObject;
use JsonSerializable;
use Rebilly\Entities\CustomerCredential;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class CustomerCredentialService
 *
 * @author Veaceslav Medvedev <veaceslav.medvedev@rebilly.com>
 * @version 0.1
 */
final class CustomerCredentialService extends Service
{
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
     * @throws NotFoundException The resource data does exist
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
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return CustomerCredential
     */
    public function create($data, $credentialId = null)
    {
        if (isset($credentialId)) {
            return $this->client()->put($data, 'credentials/{credentialId}', ['credentialId' => $credentialId]);
        } else {
            return $this->client()->post($data, 'credentials');
        }
    }

    /**
     * @param string $credentialId
     * @param array|JsonSerializable|CustomerCredential $data
     *
     * @throws UnprocessableEntityException The input data does not valid
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
