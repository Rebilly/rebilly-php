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
use Rebilly\Entities\ApiKey;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class ApiKeyService
 *
 * @author Maksim Tuzov <maksim.tuzov@rebilly.com>
 * @version 0.1
 */
final class ApiKeyService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return ApiKey[]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'api-keys', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return ApiKey[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('api-keys', $params);
    }

    /**
     * @param string $apiKeyId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return ApiKey
     */
    public function load($apiKeyId, $params = [])
    {
        return $this->client()->get('api-keys/{apiKeyId}', ['apiKeyId' => $apiKeyId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|ApiKey $data
     * @param string $apiKeyId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return ApiKey
     */
    public function create($data, $apiKeyId = null)
    {
        if (isset($apiKeyId)) {
            return $this->client()->put($data, 'api-keys/{apiKeyId}', ['apiKeyId' => $apiKeyId]);
        } else {
            return $this->client()->post($data, 'api-keys');
        }
    }

    /**
     * @param string $apiKeyId
     * @param array|JsonSerializable|ApiKey $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return ApiKey
     */
    public function update($apiKeyId, $data)
    {
        return $this->client()->put($data, 'api-keys/{apiKeyId}', ['apiKeyId' => $apiKeyId]);
    }

    /**
     * @param string $apiKeyId
     */
    public function delete($apiKeyId)
    {
        $this->client()->delete('api-keys/{apiKeyId}', ['apiKeyId' => $apiKeyId]);
    }
}
