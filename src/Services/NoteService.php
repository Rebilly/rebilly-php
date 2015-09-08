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
use Rebilly\Entities\Note;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

/**
 * Class NoteService
 *
 * @author Arman Tuyakbayev <arman.tuyakbayev@rebilly.com>
 * @version 0.1
 */
final class NoteService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Note[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('notes', $params);
    }

    /**
     * @param string $noteId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does exist
     *
     * @return Note
     */
    public function load($noteId, $params = [])
    {
        return $this->client()->get('notes/{noteId}', ['noteId' => $noteId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Note $data
     * @param string $noteId
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Note
     */
    public function create($data, $noteId = null)
    {
        if (isset($noteId)) {
            return $this->client()->put($data, 'notes/{noteId}', ['noteId' => $noteId]);
        } else {
            return $this->client()->post($data, 'notes/');
        }
    }

    /**
     * @param string $noteId
     * @param array|JsonSerializable|Note $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Note
     */
    public function update($noteId, $data)
    {
        return $this->client()->put($data, 'notes/{noteId}', ['noteId' => $noteId]);
    }
}
