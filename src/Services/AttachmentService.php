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
use Rebilly\Entities\Attachment;
use Rebilly\Http\Exception\NotFoundException;
use Rebilly\Http\Exception\UnprocessableEntityException;
use Rebilly\Paginator;
use Rebilly\Rest\Collection;
use Rebilly\Rest\Service;

final class AttachmentService extends Service
{
    /**
     * @param array|ArrayObject $params
     *
     * @return Attachment[][]|Collection[]|Paginator
     */
    public function paginator($params = [])
    {
        return new Paginator($this->client(), 'attachments', $params);
    }

    /**
     * @param array|ArrayObject $params
     *
     * @return Attachment[]|Collection
     */
    public function search($params = [])
    {
        return $this->client()->get('attachments', $params);
    }

    /**
     * @param string $attachmentId
     * @param array|ArrayObject $params
     *
     * @throws NotFoundException The resource data does not exist
     *
     * @return Attachment
     */
    public function load($attachmentId, $params = [])
    {
        return $this->client()->get('attachments/{attachmentId}', ['attachmentId' => $attachmentId] + (array) $params);
    }

    /**
     * @param array|JsonSerializable|Attachment $data
     * @param null $attachmentId
     *
     * @return Attachment The input data does not valid
     */
    public function create($data, $attachmentId = null)
    {
        if (isset($attachmentId)) {
            return $this->client()->put($data, 'attachments/{attachmentId}', ['attachmentId' => $attachmentId]);
        }

        return $this->client()->post($data, 'attachments');
    }

    /**
     * @param string $attachmentId
     * @param array|JsonSerializable|Attachment $data
     *
     * @throws UnprocessableEntityException The input data does not valid
     *
     * @return Attachment
     */
    public function update($attachmentId, $data)
    {
        return $this->client()->put($data, 'attachments/{attachmentId}', ['attachmentId' => $attachmentId]);
    }

    /**
     * @param string $attachmentId
     */
    public function delete($attachmentId)
    {
        $this->client()->delete('attachments/{attachmentId}', ['attachmentId' => $attachmentId]);
    }
}
