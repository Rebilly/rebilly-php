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
use Rebilly\Rest\Entity;

/**
 * Class KycDocument.
 */
final class KycDocument extends Entity
{
    public const TYPE_IDENTITY_PROOF = 'identity-proof';

    public const TYPE_ADDRESS_PROOF = 'address-proof';

    public const TYPE_FUNDS_PROOF = 'funds-proof';

    public const TYPE_PURCHASE_PROOF = 'purchase-proof';

    public const SUBTYPE_PASSPORT = 'passport';

    public const SUBTYPE_ID_CARD = 'id-card';

    public const SUBTYPE_DRIVER_LICENSE = 'driver-license';

    public const SUBTYPE_BIRTH_CERTIFICATE = 'birth-certificate';

    public const SUBTYPE_UTILITY_BILL = 'utility-bill';

    public const SUBTYPE_RENTAL_RECEIPT = 'rental-receipt';

    public const SUBTYPE_LEASE_AGREEMENT = 'lease-agreement';

    public const SUBTYPE_COPY_CREDIT_CARD = 'copy-credit-card';

    public const SUBTYPE_CREDIT_CARD_STATEMENT = 'credit-card-statement';

    public const SUBTYPE_BANK_STATEMENT = 'bank-statement';

    public const SUBTYPE_INHERITANCE_DOCUMENTATION = 'inheritance-documentation';

    public const SUBTYPE_TAX_RETURN = 'tax-return';

    public const SUBTYPE_SALARY_SLIP = 'salary-slip';

    public const SUBTYPE_SALE_OF_ASSETS = 'sale-of-assets';

    public const STATUS_PENDING = 'pending';

    public const STATUS_IN_PROGRESS = 'in-progress';

    public const STATUS_ACCEPTED = 'accepted';

    public const STATUS_REJECTED = 'rejected';

    public const MSG_BAD_DOCUMENT_TYPE = 'Bad document type provided.';

    public const MSG_BAD_DOCUMENT_SUBTYPE = 'Bad document subtype provided.';

    /**
     * @return array
     */
    public static function allowedTypes()
    {
        return [
            self::TYPE_IDENTITY_PROOF,
            self::TYPE_ADDRESS_PROOF,
            self::TYPE_FUNDS_PROOF,
            self::TYPE_PURCHASE_PROOF,
        ];
    }

    /**
     * @return array
     */
    public static function allowedSubtypes()
    {
        return [
            self::SUBTYPE_PASSPORT,
            self::SUBTYPE_ID_CARD,
            self::SUBTYPE_DRIVER_LICENSE,
            self::SUBTYPE_BIRTH_CERTIFICATE,
            self::SUBTYPE_UTILITY_BILL,
            self::SUBTYPE_RENTAL_RECEIPT,
            self::SUBTYPE_LEASE_AGREEMENT,
            self::SUBTYPE_COPY_CREDIT_CARD,
            self::SUBTYPE_CREDIT_CARD_STATEMENT,
            self::SUBTYPE_BANK_STATEMENT,
            self::SUBTYPE_INHERITANCE_DOCUMENTATION,
            self::SUBTYPE_TAX_RETURN,
            self::SUBTYPE_SALARY_SLIP,
            self::SUBTYPE_SALE_OF_ASSETS,
        ];
    }

    /**
     * @return string
     * @deprecated
     */
    public function getFileId()
    {
        return $this->getAttribute('fileId');
    }

    /**
     * @param string $value
     *
     * @return $this
     * @deprecated
     */
    public function setFileId($value)
    {
        return $this->setFileIds([$value]);
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setFileIds($value)
    {
        return $this->setAttribute('fileIds', $value);
    }

    /**
     * @return string
     */
    public function getFileIds()
    {
        return $this->getAttribute('fileIds');
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

        if (!in_array($value, $allowedTypes, true)) {
            throw new DomainException(self::MSG_BAD_DOCUMENT_TYPE);
        }

        return $this->setAttribute('documentType', $value);
    }

    /**
     * @return string
     */
    public function getDocumentSubtype()
    {
        return $this->getAttribute('documentSubtype');
    }

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDocumentSubtype($value)
    {
        $allowedSubtypes = self::allowedSubtypes();

        if (!in_array($value, $allowedSubtypes, true)) {
            throw new DomainException(self::MSG_BAD_DOCUMENT_SUBTYPE);
        }

        return $this->setAttribute('documentSubtype', $value);
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

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->getAttribute('reason');
    }

    /**
     * @return int
     */
    public function getMatchLevel()
    {
        return $this->getAttribute('matchLevel');
    }
}
