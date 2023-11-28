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

    public function getDocumentType(): ?string
    {
        return $this->fields['documentType'] ?? null;
    }

    public function setDocumentType(null|string $documentType): static
    {
        $this->fields['documentType'] = $documentType;

        return $this;
    }

    /**
     * @return null|ReportKycRejectionsDataRejectionReasons[]
     */
    public function getRejectionReasons(): ?array
    {
        return $this->fields['rejectionReasons'] ?? null;
    }

    /**
     * @param null|array[]|ReportKycRejectionsDataRejectionReasons[] $rejectionReasons
     */
    public function setRejectionReasons(null|array $rejectionReasons): static
    {
        $rejectionReasons = $rejectionReasons !== null ? array_map(
            fn ($value) => $value instanceof ReportKycRejectionsDataRejectionReasons ? $value : ReportKycRejectionsDataRejectionReasons::from($value),
            $rejectionReasons,
        ) : null;

        $this->fields['rejectionReasons'] = $rejectionReasons;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('documentType', $this->fields)) {
            $data['documentType'] = $this->fields['documentType'];
        }
        if (array_key_exists('rejectionReasons', $this->fields)) {
            $data['rejectionReasons'] = $this->fields['rejectionReasons'];
        }

        return $data;
    }
}
