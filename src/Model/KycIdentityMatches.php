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

declare(strict_types=1);

namespace Rebilly\Sdk\Model;

use DateTimeImmutable;
use DateTimeInterface;

class KycIdentityMatches implements PostKycDocumentMatchesRequest
{
    public const DOCUMENT_SUBTYPE_PASSPORT = 'passport';

    public const DOCUMENT_SUBTYPE_ID_CARD = 'id-card';

    public const DOCUMENT_SUBTYPE_DRIVER_LICENSE = 'driver-license';

    public const DOCUMENT_SUBTYPE_BIRTH_CERTIFICATE = 'birth-certificate';

    public const DOCUMENT_SUBTYPE_UTILITY_BILL = 'utility-bill';

    public const DOCUMENT_SUBTYPE_RENTAL_RECEIPT = 'rental-receipt';

    public const DOCUMENT_SUBTYPE_LEASE_AGREEMENT = 'lease-agreement';

    public const DOCUMENT_SUBTYPE_COPY_CREDIT_CARD = 'copy-credit-card';

    public const DOCUMENT_SUBTYPE_CREDIT_CARD_STATEMENT = 'credit-card-statement';

    public const DOCUMENT_SUBTYPE_BANK_STATEMENT = 'bank-statement';

    public const DOCUMENT_SUBTYPE_INHERITANCE_DOCUMENTATION = 'inheritance-documentation';

    public const DOCUMENT_SUBTYPE_TAX_RETURN = 'tax-return';

    public const DOCUMENT_SUBTYPE_SALARY_SLIP = 'salary-slip';

    public const DOCUMENT_SUBTYPE_SALE_OF_ASSETS = 'sale-of-assets';

    public const DOCUMENT_SUBTYPE_PUBLIC_HEALTH_CARD = 'public-health-card';

    public const DOCUMENT_SUBTYPE_PROOF_OF_AGE_CARD = 'proof-of-age-card';

    public const DOCUMENT_SUBTYPE_REVERSE_OF_ID = 'reverse-of-id';

    public const DOCUMENT_SUBTYPE_PUBLIC_SERVICE = 'public-service';

    public const DOCUMENT_SUBTYPE_EWALLET_HOLDER_DETAILS = 'ewallet-holder-details';

    public const DOCUMENT_SUBTYPE_EWALLET_TRANSACTION_STATEMENT = 'ewallet-transaction-statement';

    public const DOCUMENT_SUBTYPE_MARRIAGE_CERTIFICATE = 'marriage-certificate';

    public const DOCUMENT_SUBTYPE_FIREARMS_LICENSE = 'firearms-license';

    public const DOCUMENT_SUBTYPE_INSURANCE_LETTER = 'insurance-letter';

    public const DOCUMENT_SUBTYPE_INCOME_STATEMENT = 'income-statement';

    public const DOCUMENT_SUBTYPE_DEBTORS_LETTER = 'debtors-letter';

    public const DOCUMENT_SUBTYPE_OTHER = 'other';

    public const DOCUMENT_SUBTYPE_NULL = 'null';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('containsImage', $data)) {
            $this->setContainsImage($data['containsImage']);
        }
        if (array_key_exists('isIdentityDocument', $data)) {
            $this->setIsIdentityDocument($data['isIdentityDocument']);
        }
        if (array_key_exists('isPublishedOnline', $data)) {
            $this->setIsPublishedOnline($data['isPublishedOnline']);
        }
        if (array_key_exists('matchingImages', $data)) {
            $this->setMatchingImages($data['matchingImages']);
        }
        if (array_key_exists('firstName', $data)) {
            $this->setFirstName($data['firstName']);
        }
        if (array_key_exists('lastName', $data)) {
            $this->setLastName($data['lastName']);
        }
        if (array_key_exists('dateOfBirth', $data)) {
            $this->setDateOfBirth($data['dateOfBirth']);
        }
        if (array_key_exists('expirationDate', $data)) {
            $this->setExpirationDate($data['expirationDate']);
        }
        if (array_key_exists('issueDate', $data)) {
            $this->setIssueDate($data['issueDate']);
        }
        if (array_key_exists('hasMinimalAge', $data)) {
            $this->setHasMinimalAge($data['hasMinimalAge']);
        }
        if (array_key_exists('nationality', $data)) {
            $this->setNationality($data['nationality']);
        }
        if (array_key_exists('issuanceCountry', $data)) {
            $this->setIssuanceCountry($data['issuanceCountry']);
        }
        if (array_key_exists('issuanceRegion', $data)) {
            $this->setIssuanceRegion($data['issuanceRegion']);
        }
        if (array_key_exists('documentNumber', $data)) {
            $this->setDocumentNumber($data['documentNumber']);
        }
        if (array_key_exists('documentSubtype', $data)) {
            $this->setDocumentSubtype($data['documentSubtype']);
        }
        if (array_key_exists('hasMatchingFaceProof', $data)) {
            $this->setHasMatchingFaceProof($data['hasMatchingFaceProof']);
        }
        if (array_key_exists('isTampered', $data)) {
            $this->setIsTampered($data['isTampered']);
        }
        if (array_key_exists('isDigitallyTampered', $data)) {
            $this->setIsDigitallyTampered($data['isDigitallyTampered']);
        }
        if (array_key_exists('isPhotocopy', $data)) {
            $this->setIsPhotocopy($data['isPhotocopy']);
        }
        if (array_key_exists('hasCompletedFaceLiveness', $data)) {
            $this->setHasCompletedFaceLiveness($data['hasCompletedFaceLiveness']);
        }
        if (array_key_exists('expiryDate', $data)) {
            $this->setExpiryDate($data['expiryDate']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getContainsImage(): ?bool
    {
        return $this->fields['containsImage'] ?? null;
    }

    public function setContainsImage(null|bool $containsImage): static
    {
        $this->fields['containsImage'] = $containsImage;

        return $this;
    }

    public function getIsIdentityDocument(): ?bool
    {
        return $this->fields['isIdentityDocument'] ?? null;
    }

    public function setIsIdentityDocument(null|bool $isIdentityDocument): static
    {
        $this->fields['isIdentityDocument'] = $isIdentityDocument;

        return $this;
    }

    public function getIsPublishedOnline(): ?bool
    {
        return $this->fields['isPublishedOnline'] ?? null;
    }

    public function setIsPublishedOnline(null|bool $isPublishedOnline): static
    {
        $this->fields['isPublishedOnline'] = $isPublishedOnline;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getMatchingImages(): ?array
    {
        return $this->fields['matchingImages'] ?? null;
    }

    public function getFirstName(): ?string
    {
        return $this->fields['firstName'] ?? null;
    }

    public function setFirstName(null|string $firstName): static
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->fields['lastName'] ?? null;
    }

    public function setLastName(null|string $lastName): static
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    public function getDateOfBirth(): ?DateTimeImmutable
    {
        return $this->fields['dateOfBirth'] ?? null;
    }

    public function setDateOfBirth(null|DateTimeImmutable|string $dateOfBirth): static
    {
        if ($dateOfBirth !== null && !($dateOfBirth instanceof DateTimeImmutable)) {
            $dateOfBirth = new DateTimeImmutable($dateOfBirth);
        }

        $this->fields['dateOfBirth'] = $dateOfBirth;

        return $this;
    }

    public function getExpirationDate(): ?DateTimeImmutable
    {
        return $this->fields['expirationDate'] ?? null;
    }

    public function setExpirationDate(null|DateTimeImmutable|string $expirationDate): static
    {
        if ($expirationDate !== null && !($expirationDate instanceof DateTimeImmutable)) {
            $expirationDate = new DateTimeImmutable($expirationDate);
        }

        $this->fields['expirationDate'] = $expirationDate;

        return $this;
    }

    public function getIssueDate(): ?DateTimeImmutable
    {
        return $this->fields['issueDate'] ?? null;
    }

    public function setIssueDate(null|DateTimeImmutable|string $issueDate): static
    {
        if ($issueDate !== null && !($issueDate instanceof DateTimeImmutable)) {
            $issueDate = new DateTimeImmutable($issueDate);
        }

        $this->fields['issueDate'] = $issueDate;

        return $this;
    }

    public function getHasMinimalAge(): ?bool
    {
        return $this->fields['hasMinimalAge'] ?? null;
    }

    public function getNationality(): ?string
    {
        return $this->fields['nationality'] ?? null;
    }

    public function setNationality(null|string $nationality): static
    {
        $this->fields['nationality'] = $nationality;

        return $this;
    }

    public function getIssuanceCountry(): ?string
    {
        return $this->fields['issuanceCountry'] ?? null;
    }

    public function setIssuanceCountry(null|string $issuanceCountry): static
    {
        $this->fields['issuanceCountry'] = $issuanceCountry;

        return $this;
    }

    public function getIssuanceRegion(): ?string
    {
        return $this->fields['issuanceRegion'] ?? null;
    }

    public function setIssuanceRegion(null|string $issuanceRegion): static
    {
        $this->fields['issuanceRegion'] = $issuanceRegion;

        return $this;
    }

    public function getDocumentNumber(): ?string
    {
        return $this->fields['documentNumber'] ?? null;
    }

    public function setDocumentNumber(null|string $documentNumber): static
    {
        $this->fields['documentNumber'] = $documentNumber;

        return $this;
    }

    public function getDocumentSubtype(): ?string
    {
        return $this->fields['documentSubtype'] ?? null;
    }

    public function setDocumentSubtype(null|string $documentSubtype): static
    {
        $this->fields['documentSubtype'] = $documentSubtype;

        return $this;
    }

    public function getHasMatchingFaceProof(): ?bool
    {
        return $this->fields['hasMatchingFaceProof'] ?? null;
    }

    public function setHasMatchingFaceProof(null|bool $hasMatchingFaceProof): static
    {
        $this->fields['hasMatchingFaceProof'] = $hasMatchingFaceProof;

        return $this;
    }

    public function getIsTampered(): ?bool
    {
        return $this->fields['isTampered'] ?? null;
    }

    public function setIsTampered(null|bool $isTampered): static
    {
        $this->fields['isTampered'] = $isTampered;

        return $this;
    }

    public function getIsDigitallyTampered(): ?bool
    {
        return $this->fields['isDigitallyTampered'] ?? null;
    }

    public function setIsDigitallyTampered(null|bool $isDigitallyTampered): static
    {
        $this->fields['isDigitallyTampered'] = $isDigitallyTampered;

        return $this;
    }

    public function getIsPhotocopy(): ?bool
    {
        return $this->fields['isPhotocopy'] ?? null;
    }

    public function setIsPhotocopy(null|bool $isPhotocopy): static
    {
        $this->fields['isPhotocopy'] = $isPhotocopy;

        return $this;
    }

    public function getHasCompletedFaceLiveness(): ?bool
    {
        return $this->fields['hasCompletedFaceLiveness'] ?? null;
    }

    public function getExpiryDate(): ?DateTimeImmutable
    {
        return $this->fields['expiryDate'] ?? null;
    }

    public function setExpiryDate(null|DateTimeImmutable|string $expiryDate): static
    {
        if ($expiryDate !== null && !($expiryDate instanceof DateTimeImmutable)) {
            $expiryDate = new DateTimeImmutable($expiryDate);
        }

        $this->fields['expiryDate'] = $expiryDate;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('containsImage', $this->fields)) {
            $data['containsImage'] = $this->fields['containsImage'];
        }
        if (array_key_exists('isIdentityDocument', $this->fields)) {
            $data['isIdentityDocument'] = $this->fields['isIdentityDocument'];
        }
        if (array_key_exists('isPublishedOnline', $this->fields)) {
            $data['isPublishedOnline'] = $this->fields['isPublishedOnline'];
        }
        if (array_key_exists('matchingImages', $this->fields)) {
            $data['matchingImages'] = $this->fields['matchingImages'];
        }
        if (array_key_exists('firstName', $this->fields)) {
            $data['firstName'] = $this->fields['firstName'];
        }
        if (array_key_exists('lastName', $this->fields)) {
            $data['lastName'] = $this->fields['lastName'];
        }
        if (array_key_exists('dateOfBirth', $this->fields)) {
            $data['dateOfBirth'] = $this->fields['dateOfBirth']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('expirationDate', $this->fields)) {
            $data['expirationDate'] = $this->fields['expirationDate']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('issueDate', $this->fields)) {
            $data['issueDate'] = $this->fields['issueDate']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('hasMinimalAge', $this->fields)) {
            $data['hasMinimalAge'] = $this->fields['hasMinimalAge'];
        }
        if (array_key_exists('nationality', $this->fields)) {
            $data['nationality'] = $this->fields['nationality'];
        }
        if (array_key_exists('issuanceCountry', $this->fields)) {
            $data['issuanceCountry'] = $this->fields['issuanceCountry'];
        }
        if (array_key_exists('issuanceRegion', $this->fields)) {
            $data['issuanceRegion'] = $this->fields['issuanceRegion'];
        }
        if (array_key_exists('documentNumber', $this->fields)) {
            $data['documentNumber'] = $this->fields['documentNumber'];
        }
        if (array_key_exists('documentSubtype', $this->fields)) {
            $data['documentSubtype'] = $this->fields['documentSubtype'];
        }
        if (array_key_exists('hasMatchingFaceProof', $this->fields)) {
            $data['hasMatchingFaceProof'] = $this->fields['hasMatchingFaceProof'];
        }
        if (array_key_exists('isTampered', $this->fields)) {
            $data['isTampered'] = $this->fields['isTampered'];
        }
        if (array_key_exists('isDigitallyTampered', $this->fields)) {
            $data['isDigitallyTampered'] = $this->fields['isDigitallyTampered'];
        }
        if (array_key_exists('isPhotocopy', $this->fields)) {
            $data['isPhotocopy'] = $this->fields['isPhotocopy'];
        }
        if (array_key_exists('hasCompletedFaceLiveness', $this->fields)) {
            $data['hasCompletedFaceLiveness'] = $this->fields['hasCompletedFaceLiveness'];
        }
        if (array_key_exists('expiryDate', $this->fields)) {
            $data['expiryDate'] = $this->fields['expiryDate']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    /**
     * @param null|string[] $matchingImages
     */
    private function setMatchingImages(null|array $matchingImages): static
    {
        $this->fields['matchingImages'] = $matchingImages;

        return $this;
    }

    private function setHasMinimalAge(null|bool $hasMinimalAge): static
    {
        $this->fields['hasMinimalAge'] = $hasMinimalAge;

        return $this;
    }

    private function setHasCompletedFaceLiveness(null|bool $hasCompletedFaceLiveness): static
    {
        $this->fields['hasCompletedFaceLiveness'] = $hasCompletedFaceLiveness;

        return $this;
    }
}
