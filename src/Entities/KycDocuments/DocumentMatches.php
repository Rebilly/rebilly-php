<?php
/**
 * This file is part of the PHP Rebilly API package.
 *
 * (c) 2015 Rebilly SRL
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
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
