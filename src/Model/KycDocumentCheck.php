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

class KycDocumentCheck implements JsonSerializable
{
    public const NAME_CITY = 'city';

    public const NAME_CONTAINS_IMAGE = 'containsImage';

    public const NAME_DATE = 'date';

    public const NAME_DATE_IS_INVALID = 'dateIsInvalid';

    public const NAME_DATE_OF_BIRTH = 'dateOfBirth';

    public const NAME_DECISION = 'decision';

    public const NAME_DOCUMENT_SUBTYPE = 'documentSubtype';

    public const NAME_EXPIRATION_DATE = 'expirationDate';

    public const NAME_FIRST_NAME = 'firstName';

    public const NAME_HAS_MATCHING_FACE_PROOF = 'hasMatchingFaceProof';

    public const NAME_HAS_MINIMAL_AGE = 'hasMinimalAge';

    public const NAME_IS_IDENTITY_DOCUMENT = 'isIdentityDocument';

    public const NAME_IS_PUBLISHED_ONLINE = 'isPublishedOnline';

    public const NAME_IS_TAMPERED = 'isTampered';

    public const NAME_ISSUE_DATE = 'issueDate';

    public const NAME_LAST_NAME = 'lastName';

    public const NAME_LINE1 = 'line1';

    public const NAME_MATCHES_DATE_OF_BIRTH = 'matchesDateOfBirth';

    public const NAME_PHONE = 'phone';

    public const NAME_POSTAL_CODE = 'postalCode';

    public const NAME_REGION = 'region';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('failed', $data)) {
            $this->setFailed($data['failed']);
        }
        if (array_key_exists('score', $data)) {
            $this->setScore($data['score']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getName(): ?string
    {
        return $this->fields['name'] ?? null;
    }

    public function setName(null|string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
    }

    public function getFailed(): ?bool
    {
        return $this->fields['failed'] ?? null;
    }

    public function setFailed(null|bool $failed): static
    {
        $this->fields['failed'] = $failed;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->fields['score'] ?? null;
    }

    public function setScore(null|int $score): static
    {
        $this->fields['score'] = $score;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('failed', $this->fields)) {
            $data['failed'] = $this->fields['failed'];
        }
        if (array_key_exists('score', $this->fields)) {
            $data['score'] = $this->fields['score'];
        }

        return $data;
    }
}
