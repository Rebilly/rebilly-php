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

use DomainException;
use Rebilly\Rest\Resource;

/**
 * Class RejectionReason
 *
 * ```json
 * {
 *   "type",
 *   "message"
 * }
 * ```
 */
final class RejectionReason extends Resource
{
    const REJECT_DOCUMENT_UNREADABLE = 'document-unreadable';
    const REJECT_DOCUMENT_EXPIRED = 'document-expired';
    const REJECT_DOCUMENT_NOT_MATCHING = 'document-not-matching';
    const REJECT_UNDERAGE_PERSON = 'underage-person';
    const REJECT_OTHER = 'other';

    const MSG_REQUIRED_TYPE = 'Rejection type is required';
    const MSG_UNSUPPORTED_TYPE = 'Bad rejection type provided.';

    /**
     * @return array
     */
    public static function allowedRejectionTypes()
    {
        return [
            self::REJECT_DOCUMENT_UNREADABLE,
            self::REJECT_DOCUMENT_EXPIRED,
            self::REJECT_DOCUMENT_NOT_MATCHING,
            self::REJECT_UNDERAGE_PERSON,
            self::REJECT_OTHER,
        ];
    }

    /**
     * @param array $data
     *
     * @return RejectionReason
     */
    public static function createFromData(array $data)
    {
        if (!isset($data['type'])) {
            throw new DomainException(self::MSG_REQUIRED_TYPE);
        }

        if (!in_array($data['type'], self::allowedRejectionTypes(), true)) {
            throw new DomainException(self::MSG_UNSUPPORTED_TYPE);
        }

        return new self($data);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->getAttribute('type');
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->getAttribute('message');
    }
}
