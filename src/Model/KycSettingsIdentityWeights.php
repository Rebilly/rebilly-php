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

use JsonSerializable;

class KycSettingsIdentityWeights implements JsonSerializable
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
        if (array_key_exists('firstName', $data)) {
            $this->setFirstName($data['firstName']);
        }
        if (array_key_exists('lastName', $data)) {
            $this->setLastName($data['lastName']);
        }
        if (array_key_exists('expirationDate', $data)) {
            $this->setExpirationDate($data['expirationDate']);
        }
        if (array_key_exists('dateOfBirth', $data)) {
            $this->setDateOfBirth($data['dateOfBirth']);
        }
        if (array_key_exists('matchesDateOfBirth', $data)) {
            $this->setMatchesDateOfBirth($data['matchesDateOfBirth']);
        }
        if (array_key_exists('issueDate', $data)) {
            $this->setIssueDate($data['issueDate']);
        }
        if (array_key_exists('hasMinimalAge', $data)) {
            $this->setHasMinimalAge($data['hasMinimalAge']);
        }
        if (array_key_exists('hasMatchingFaceProof', $data)) {
            $this->setHasMatchingFaceProof($data['hasMatchingFaceProof']);
        }
        if (array_key_exists('nationality', $data)) {
            $this->setNationality($data['nationality']);
        }
        if (array_key_exists('documentSubtype', $data)) {
            $this->setDocumentSubtype($data['documentSubtype']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getContainsImage(): ?int
    {
        return $this->fields['containsImage'] ?? null;
    }

    public function setContainsImage(null|int $containsImage): static
    {
        $this->fields['containsImage'] = $containsImage;

        return $this;
    }

    public function getIsIdentityDocument(): ?int
    {
        return $this->fields['isIdentityDocument'] ?? null;
    }

    public function setIsIdentityDocument(null|int $isIdentityDocument): static
    {
        $this->fields['isIdentityDocument'] = $isIdentityDocument;

        return $this;
    }

    public function getIsPublishedOnline(): ?int
    {
        return $this->fields['isPublishedOnline'] ?? null;
    }

    public function setIsPublishedOnline(null|int $isPublishedOnline): static
    {
        $this->fields['isPublishedOnline'] = $isPublishedOnline;

        return $this;
    }

    public function getFirstName(): ?int
    {
        return $this->fields['firstName'] ?? null;
    }

    public function setFirstName(null|int $firstName): static
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    public function getLastName(): ?int
    {
        return $this->fields['lastName'] ?? null;
    }

    public function setLastName(null|int $lastName): static
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    public function getExpirationDate(): ?int
    {
        return $this->fields['expirationDate'] ?? null;
    }

    public function setExpirationDate(null|int $expirationDate): static
    {
        $this->fields['expirationDate'] = $expirationDate;

        return $this;
    }

    public function getDateOfBirth(): ?int
    {
        return $this->fields['dateOfBirth'] ?? null;
    }

    public function setDateOfBirth(null|int $dateOfBirth): static
    {
        $this->fields['dateOfBirth'] = $dateOfBirth;

        return $this;
    }

    public function getMatchesDateOfBirth(): ?int
    {
        return $this->fields['matchesDateOfBirth'] ?? null;
    }

    public function setMatchesDateOfBirth(null|int $matchesDateOfBirth): static
    {
        $this->fields['matchesDateOfBirth'] = $matchesDateOfBirth;

        return $this;
    }

    public function getIssueDate(): ?int
    {
        return $this->fields['issueDate'] ?? null;
    }

    public function setIssueDate(null|int $issueDate): static
    {
        $this->fields['issueDate'] = $issueDate;

        return $this;
    }

    public function getHasMinimalAge(): ?int
    {
        return $this->fields['hasMinimalAge'] ?? null;
    }

    public function setHasMinimalAge(null|int $hasMinimalAge): static
    {
        $this->fields['hasMinimalAge'] = $hasMinimalAge;

        return $this;
    }

    public function getHasMatchingFaceProof(): ?int
    {
        return $this->fields['hasMatchingFaceProof'] ?? null;
    }

    public function setHasMatchingFaceProof(null|int $hasMatchingFaceProof): static
    {
        $this->fields['hasMatchingFaceProof'] = $hasMatchingFaceProof;

        return $this;
    }

    public function getNationality(): ?int
    {
        return $this->fields['nationality'] ?? null;
    }

    public function setNationality(null|int $nationality): static
    {
        $this->fields['nationality'] = $nationality;

        return $this;
    }

    public function getDocumentSubtype(): ?int
    {
        return $this->fields['documentSubtype'] ?? null;
    }

    public function setDocumentSubtype(null|int $documentSubtype): static
    {
        $this->fields['documentSubtype'] = $documentSubtype;

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
        if (array_key_exists('firstName', $this->fields)) {
            $data['firstName'] = $this->fields['firstName'];
        }
        if (array_key_exists('lastName', $this->fields)) {
            $data['lastName'] = $this->fields['lastName'];
        }
        if (array_key_exists('expirationDate', $this->fields)) {
            $data['expirationDate'] = $this->fields['expirationDate'];
        }
        if (array_key_exists('dateOfBirth', $this->fields)) {
            $data['dateOfBirth'] = $this->fields['dateOfBirth'];
        }
        if (array_key_exists('matchesDateOfBirth', $this->fields)) {
            $data['matchesDateOfBirth'] = $this->fields['matchesDateOfBirth'];
        }
        if (array_key_exists('issueDate', $this->fields)) {
            $data['issueDate'] = $this->fields['issueDate'];
        }
        if (array_key_exists('hasMinimalAge', $this->fields)) {
            $data['hasMinimalAge'] = $this->fields['hasMinimalAge'];
        }
        if (array_key_exists('hasMatchingFaceProof', $this->fields)) {
            $data['hasMatchingFaceProof'] = $this->fields['hasMatchingFaceProof'];
        }
        if (array_key_exists('nationality', $this->fields)) {
            $data['nationality'] = $this->fields['nationality'];
        }
        if (array_key_exists('documentSubtype', $this->fields)) {
            $data['documentSubtype'] = $this->fields['documentSubtype'];
        }

        return $data;
    }
}
