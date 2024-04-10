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

class KycDocumentRejection implements JsonSerializable
{
    public const TYPE_DOCUMENT_UNREADABLE = 'document-unreadable';

    public const TYPE_DOCUMENT_EXPIRED = 'document-expired';

    public const TYPE_DOCUMENT_NOT_MATCHING = 'document-not-matching';

    public const TYPE_DOCUMENT_DUPLICATE = 'document-duplicate';

    public const TYPE_DOCUMENT_INVALID = 'document-invalid';

    public const TYPE_DOCUMENT_NOT_OPEN = 'document-not-open';

    public const TYPE_UNDERAGE_PERSON = 'underage-person';

    public const TYPE_THIRD_PARTY_OR_MISMATCH = 'third-party-or-mismatch';

    public const TYPE_EXPIRATION_DATE_MISSING = 'expiration-date-missing';

    public const TYPE_ISSUE_DATE_MISSING = 'issue-date-missing';

    public const TYPE_DOB_MISMATCH = 'dob-mismatch';

    public const TYPE_NAME_MISMATCH = 'name-mismatch';

    public const TYPE_CRITICAL_INFO_MISSING = 'critical-info-missing';

    public const TYPE_OLD_ADDRESS_ON_ID = 'old-address-on-id';

    public const TYPE_TAMPERED_DOCUMENT = 'tampered-document';

    public const TYPE_OTHER = 'other';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('message', $data)) {
            $this->setMessage($data['message']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->fields['message'] ?? null;
    }

    public function setMessage(null|string $message): static
    {
        $this->fields['message'] = $message;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('message', $this->fields)) {
            $data['message'] = $this->fields['message'];
        }

        return $data;
    }
}
