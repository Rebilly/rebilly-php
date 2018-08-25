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
    public const REJECT_DOCUMENT_UNREADABLE = 'document-unreadable';

    public const REJECT_DOCUMENT_EXPIRED = 'document-expired';

    public const REJECT_DOCUMENT_NOT_MATCHING = 'document-not-matching';

    public const REJECT_UNDERAGE_PERSON = 'underage-person';

    public const REJECT_OTHER = 'other';

    public const MSG_REQUIRED_TYPE = 'Rejection type is required';

    public const MSG_UNSUPPORTED_TYPE = 'Bad rejection type provided.';

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
     * @param string $value
     *
     * @return string
     */
    public function setType($value)
    {
        if (!in_array($value, self::allowedRejectionTypes(), true)) {
            throw new DomainException(self::MSG_UNSUPPORTED_TYPE);
        }

        return $this->setAttribute('type', $value);
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->getAttribute('message');
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function setMessage($value)
    {
        return $this->setAttribute('message', $value);
    }
}
