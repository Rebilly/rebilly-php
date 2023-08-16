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

class ReportKycRejectionsRejectionReasons implements JsonSerializable
{
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

    public function getRejectionReason(): ?KycDocumentRejectionReasonTypes
    {
        return $this->fields['rejectionReason'] ?? null;
    }

    public function setRejectionReason(null|KycDocumentRejectionReasonTypes|string $rejectionReason): static
    {
        if ($rejectionReason !== null && !($rejectionReason instanceof KycDocumentRejectionReasonTypes)) {
            $rejectionReason = KycDocumentRejectionReasonTypes::from($rejectionReason);
        }

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
            $data['rejectionReason'] = $this->fields['rejectionReason']?->value;
        }
        if (array_key_exists('count', $this->fields)) {
            $data['count'] = $this->fields['count'];
        }

        return $data;
    }
}
