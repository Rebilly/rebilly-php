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
use Rebilly\Entities\File;
use Rebilly\Http\Exception\DataValidationException;
use Rebilly\Http\Exception\NotFoundException;
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
     * @throws NotFoundException if resource does not exist
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
     * @throws DataValidationException if input data is not valid
     *
     * @return File
     */
    public function create($data)
    {
        return $this->client()->post($data, 'files');
    }

    /**
     * @param string $fileId
     * @param array|JsonSerializable|File $data
     *
     * @throws DataValidationException if input data is not valid
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
