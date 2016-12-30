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
use Rebilly\Entities\File;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

final class FileService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return File[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'files', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return File[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('files', $params);
    }

    /**
     * @param string $fileId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return File
     */
    public function load($fileId, $params = [])
    {
        return $this->client()->get('files/{fileId}', ['fileId' => $fileId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|string|File $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return File
     */
    public function create($data)
    {
        if (!empty($data->url) || isset($data['url'])) {
            return $this->client()->post($data, 'files');
        }

        return $this->client()->postRaw($data, 'files');
    }

    /**
     * @param string $fileId
     * @param array|JsonSerializable|File $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return File
     */
    public function update($fileId, $data)
    {
        return $this->client()->put($data, 'files/{fileId}', ['fileId' => $fileId]);
    }

    /**
     * @param string $fileId
     */
    public function delete($fileId)
    {
        $this->client()->delete('files/{fileId}', ['fileId' => $fileId]);
    }
}
