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
use JsonSerializable;

class PostKycDocumentMatchesRequest implements JsonSerializable
{
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
        if (array_key_exists('expiryDate', $data)) {
            $this->setExpiryDate($data['expiryDate']);
        }
        if (array_key_exists('line1', $data)) {
            $this->setLine1($data['line1']);
        }
        if (array_key_exists('city', $data)) {
            $this->setCity($data['city']);
        }
        if (array_key_exists('region', $data)) {
            $this->setRegion($data['region']);
        }
        if (array_key_exists('postalCode', $data)) {
            $this->setPostalCode($data['postalCode']);
        }
        if (array_key_exists('wordCount', $data)) {
            $this->setWordCount($data['wordCount']);
        }
        if (array_key_exists('uniqueWords', $data)) {
            $this->setUniqueWords($data['uniqueWords']);
        }
        if (array_key_exists('date', $data)) {
            $this->setDate($data['date']);
        }
        if (array_key_exists('phone', $data)) {
            $this->setPhone($data['phone']);
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

    public function getLine1(): ?string
    {
        return $this->fields['line1'] ?? null;
    }

    public function setLine1(null|string $line1): static
    {
        $this->fields['line1'] = $line1;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->fields['city'] ?? null;
    }

    public function setCity(null|string $city): static
    {
        $this->fields['city'] = $city;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->fields['region'] ?? null;
    }

    public function setRegion(null|string $region): static
    {
        $this->fields['region'] = $region;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->fields['postalCode'] ?? null;
    }

    public function setPostalCode(null|string $postalCode): static
    {
        $this->fields['postalCode'] = $postalCode;

        return $this;
    }

    public function getWordCount(): ?int
    {
        return $this->fields['wordCount'] ?? null;
    }

    public function setWordCount(null|int $wordCount): static
    {
        $this->fields['wordCount'] = $wordCount;

        return $this;
    }

    public function getUniqueWords(): ?int
    {
        return $this->fields['uniqueWords'] ?? null;
    }

    public function setUniqueWords(null|int $uniqueWords): static
    {
        $this->fields['uniqueWords'] = $uniqueWords;

        return $this;
    }

    public function getDate(): ?DateTimeImmutable
    {
        return $this->fields['date'] ?? null;
    }

    public function setDate(null|DateTimeImmutable|string $date): static
    {
        if ($date !== null && !($date instanceof DateTimeImmutable)) {
            $date = new DateTimeImmutable($date);
        }

        $this->fields['date'] = $date;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->fields['phone'] ?? null;
    }

    public function setPhone(null|string $phone): static
    {
        $this->fields['phone'] = $phone;

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
        if (array_key_exists('expiryDate', $this->fields)) {
            $data['expiryDate'] = $this->fields['expiryDate']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('line1', $this->fields)) {
            $data['line1'] = $this->fields['line1'];
        }
        if (array_key_exists('city', $this->fields)) {
            $data['city'] = $this->fields['city'];
        }
        if (array_key_exists('region', $this->fields)) {
            $data['region'] = $this->fields['region'];
        }
        if (array_key_exists('postalCode', $this->fields)) {
            $data['postalCode'] = $this->fields['postalCode'];
        }
        if (array_key_exists('wordCount', $this->fields)) {
            $data['wordCount'] = $this->fields['wordCount'];
        }
        if (array_key_exists('uniqueWords', $this->fields)) {
            $data['uniqueWords'] = $this->fields['uniqueWords'];
        }
        if (array_key_exists('date', $this->fields)) {
            $data['date'] = $this->fields['date']?->format('Y-m-d');
        }
        if (array_key_exists('phone', $this->fields)) {
            $data['phone'] = $this->fields['phone'];
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
}
