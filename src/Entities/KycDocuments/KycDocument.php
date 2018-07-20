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
use Rebilly\Rest\Entity;

/**
 * Class KycDocument
 *
 * ```json
 * {
 *   "id",
 *   "customerId",
 *   "fileId",
 *   "documentType",
 *   "status",
 *   "rejectionReason",
 *   "documentMatches",
 *   "createdTime",
 *   "updatedTime",
 *   "processedTime",
 * }
 * ```
 */
final class KycDocument extends Entity
{
    const TYPE_IDENTITY_PROOF = 'identity-proof';
    const TYPE_ADDRESS_PROOF = 'address-proof';

    const STATUS_PENDING = 'pending';
    const STATUS_IN_PROGRESS = 'in-progress';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'rejected';

    const MSG_BAD_DOCUMENT_TYPE = 'Bad document type provided.';

    /**
     * @return array
     */
    public static function allowedTypes()
    {
        return [
            self::TYPE_IDENTITY_PROOF,
            self::TYPE_ADDRESS_PROOF,
        ];
    }

    /**
     * @return string
     */
    public function getFileId()
    {
        return $this->getAttribute('fileId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setFileId($value)
    {
        return $this->setAttribute('fileId', $value);
    }

    /**
     * @return string
     */
    public function getCustomerId()
    {
        return $this->getAttribute('customerId');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setCustomerId($value)
    {
        return $this->setAttribute('customerId', $value);
    }

    /**
     * @return float
     */
    public function getDocumentType()
    {
        return $this->getAttribute('documentType');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDocumentType($value)
    {
        $allowedTypes = self::allowedTypes();

        if (!in_array($value, $allowedTypes)) {
            throw new DomainException(self::MSG_BAD_DOCUMENT_TYPE);
        }

        return $this->setAttribute('documentType', $value);
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getAttribute('status');
    }

    /**
     * @return RejectionReason|null
     */
    public function getRejectionReason()
    {
        if ($this->getStatus() !== self::STATUS_REJECTED) {
            return null;
        }

        return $this->getAttribute('rejectionReason');
    }

    /**
     * @param array $data
     *
     * @return RejectionReason
     */
    public function createRejectionReason(array $data)
    {
        return RejectionReason::createFromData($data);
    }

    /**
     * @return DocumentMatches
     */
    public function getDocumentMatches()
    {
        return $this->getAttribute('documentMatches');
    }

    /**
     * @param array $data
     *
     * @return DocumentMatches
     */
    public function createDocumentMatches(array $data)
    {
        return DocumentMatches::createFromData($data);
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getUpdatedTime()
    {
        return $this->getAttribute('createdTime');
    }

    /**
     * @return string
     */
    public function getProcessedTime()
    {
        return $this->getAttribute('createdTime');
    }
}
