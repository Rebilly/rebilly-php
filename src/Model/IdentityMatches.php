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

class IdentityMatches implements JsonSerializable
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
        if (array_key_exists('dateOfBirth', $data)) {
            $this->setDateOfBirth($data['dateOfBirth']);
        }
        if (array_key_exists('expiryDate', $data)) {
            $this->setExpiryDate($data['expiryDate']);
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
        if (array_key_exists('documentSubtype', $data)) {
            $this->setDocumentSubtype($data['documentSubtype']);
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

    public function setContainsImage(null|bool $containsImage): self
    {
        $this->fields['containsImage'] = $containsImage;

        return $this;
    }

    public function getIsIdentityDocument(): ?bool
    {
        return $this->fields['isIdentityDocument'] ?? null;
    }

    public function setIsIdentityDocument(null|bool $isIdentityDocument): self
    {
        $this->fields['isIdentityDocument'] = $isIdentityDocument;

        return $this;
    }

    public function getIsPublishedOnline(): ?bool
    {
        return $this->fields['isPublishedOnline'] ?? null;
    }

    public function setIsPublishedOnline(null|bool $isPublishedOnline): self
    {
        $this->fields['isPublishedOnline'] = $isPublishedOnline;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->fields['firstName'] ?? null;
    }

    public function setFirstName(null|string $firstName): self
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->fields['lastName'] ?? null;
    }

    public function setLastName(null|string $lastName): self
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    public function getDateOfBirth(): ?DateTimeImmutable
    {
        return $this->fields['dateOfBirth'] ?? null;
    }

    public function setDateOfBirth(null|DateTimeImmutable|string $dateOfBirth): self
    {
        if ($dateOfBirth !== null && !($dateOfBirth instanceof DateTimeImmutable)) {
            $dateOfBirth = new DateTimeImmutable($dateOfBirth);
        }

        $this->fields['dateOfBirth'] = $dateOfBirth;

        return $this;
    }

    public function getExpiryDate(): ?DateTimeImmutable
    {
        return $this->fields['expiryDate'] ?? null;
    }

    public function setExpiryDate(null|DateTimeImmutable|string $expiryDate): self
    {
        if ($expiryDate !== null && !($expiryDate instanceof DateTimeImmutable)) {
            $expiryDate = new DateTimeImmutable($expiryDate);
        }

        $this->fields['expiryDate'] = $expiryDate;

        return $this;
    }

    public function getExpirationDate(): ?DateTimeImmutable
    {
        return $this->fields['expirationDate'] ?? null;
    }

    public function setExpirationDate(null|DateTimeImmutable|string $expirationDate): self
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

    public function setIssueDate(null|DateTimeImmutable|string $issueDate): self
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

    public function setNationality(null|string $nationality): self
    {
        $this->fields['nationality'] = $nationality;

        return $this;
    }

    public function getDocumentSubtype(): ?string
    {
        return $this->fields['documentSubtype'] ?? null;
    }

    public function setDocumentSubtype(null|string $documentSubtype): self
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
        if (array_key_exists('dateOfBirth', $this->fields)) {
            $data['dateOfBirth'] = $this->fields['dateOfBirth']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('expiryDate', $this->fields)) {
            $data['expiryDate'] = $this->fields['expiryDate']?->format(DateTimeInterface::RFC3339);
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
        if (array_key_exists('documentSubtype', $this->fields)) {
            $data['documentSubtype'] = $this->fields['documentSubtype'];
        }

        return $data;
    }

    private function setHasMinimalAge(null|bool $hasMinimalAge): self
    {
        $this->fields['hasMinimalAge'] = $hasMinimalAge;

        return $this;
    }
}
