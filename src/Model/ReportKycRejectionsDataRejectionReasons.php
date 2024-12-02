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

class ReportKycRejectionsDataRejectionReasons implements JsonSerializable
{
    public const REJECTION_REASON_DOCUMENT_UNREADABLE = 'document-unreadable';

    public const REJECTION_REASON_DOCUMENT_EXPIRED = 'document-expired';

    public const REJECTION_REASON_DOCUMENT_NOT_MATCHING = 'document-not-matching';

    public const REJECTION_REASON_DOCUMENT_DUPLICATE = 'document-duplicate';

    public const REJECTION_REASON_DOCUMENT_INVALID = 'document-invalid';

    public const REJECTION_REASON_DOCUMENT_NOT_OPEN = 'document-not-open';

    public const REJECTION_REASON_UNDERAGE_PERSON = 'underage-person';

    public const REJECTION_REASON_THIRD_PARTY_OR_MISMATCH = 'third-party-or-mismatch';

    public const REJECTION_REASON_EXPIRATION_DATE_MISSING = 'expiration-date-missing';

    public const REJECTION_REASON_ISSUE_DATE_MISSING = 'issue-date-missing';

    public const REJECTION_REASON_DOB_MISMATCH = 'dob-mismatch';

    public const REJECTION_REASON_NAME_MISMATCH = 'name-mismatch';

    public const REJECTION_REASON_CRITICAL_INFO_MISSING = 'critical-info-missing';

    public const REJECTION_REASON_OLD_ADDRESS_ON_ID = 'old-address-on-id';

    public const REJECTION_REASON_TAMPERED_DOCUMENT = 'tampered-document';

    public const REJECTION_REASON_OTHER = 'other';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('rejectionReason', $data)) {
            $this->setRejectionReason($data['rejectionReason']);
        }
        if (array_key_exists('count', $data)) {
            $this->setCount($data['count']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getRejectionReason(): ?string
    {
        return $this->fields['rejectionReason'] ?? null;
    }

    public function setRejectionReason(null|string $rejectionReason): static
    {
        $this->fields['rejectionReason'] = $rejectionReason;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->fields['count'] ?? null;
    }

    public function setCount(null|int $count): static
    {
        $this->fields['count'] = $count;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('rejectionReason', $this->fields)) {
            $data['rejectionReason'] = $this->fields['rejectionReason'];
        }
        if (array_key_exists('count', $this->fields)) {
            $data['count'] = $this->fields['count'];
        }

        return $data;
    }
}
