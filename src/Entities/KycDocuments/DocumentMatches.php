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

namespace Rebilly\Entities\KycDocuments;

use Rebilly\Rest\Resource;

/**
 * Class DocumentMatches
 *
 * ```json
 * {
 *   "score",
 *   "data": {
 *     "containsImage",
 *     "isIdentityDocument",
 *     "isPublishedOnline",
 *     "firstName",
 *     "lastName",
 *     "dateOfBirth",
 *     "expiryDate",
 *     "issueDate",
 *     "hasMinimalAge"
 *   }
 * }
 * ```
 */
final class DocumentMatches extends Resource
{
    /**
     * @param array $data
     *
     * @return DocumentMatches
     */
    public static function createFromData(array $data)
    {
        return new self($data);
    }

    /**
     * @return string
     */
    public function getScore()
    {
        return $this->getAttribute('score');
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->getAttribute('data');
    }
}
