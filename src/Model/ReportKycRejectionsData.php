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

class ReportKycRejectionsData implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('documentType', $data)) {
            $this->setDocumentType($data['documentType']);
        }
        if (array_key_exists('rejectionReasons', $data)) {
            $this->setRejectionReasons($data['rejectionReasons']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDocumentType(): ?KycDocumentTypes
    {
        return $this->fields['documentType'] ?? null;
    }

    public function setDocumentType(null|KycDocumentTypes|string $documentType): static
    {
        if ($documentType !== null && !($documentType instanceof KycDocumentTypes)) {
            $documentType = KycDocumentTypes::from($documentType);
        }

        $this->fields['documentType'] = $documentType;

        return $this;
    }

    /**
     * @return null|ReportKycRejectionsRejectionReasons[]
     */
    public function getRejectionReasons(): ?array
    {
        return $this->fields['rejectionReasons'] ?? null;
    }

    /**
     * @param null|ReportKycRejectionsRejectionReasons[] $rejectionReasons
     */
    public function setRejectionReasons(null|array $rejectionReasons): static
    {
        $rejectionReasons = $rejectionReasons !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof ReportKycRejectionsRejectionReasons ? $value : ReportKycRejectionsRejectionReasons::from($value)) : null, $rejectionReasons) : null;

        $this->fields['rejectionReasons'] = $rejectionReasons;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('documentType', $this->fields)) {
            $data['documentType'] = $this->fields['documentType']?->value;
        }
        if (array_key_exists('rejectionReasons', $this->fields)) {
            $data['rejectionReasons'] = $this->fields['rejectionReasons'];
        }

        return $data;
    }
}
