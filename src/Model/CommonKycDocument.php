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

abstract class CommonKycDocument implements JsonSerializable
{
    public const STATUS_PENDING = 'pending';

    public const STATUS_IN_PROGRESS = 'in-progress';

    public const STATUS_ACCEPTED = 'accepted';

    public const STATUS_REJECTED = 'rejected';

    public const STATUS_ARCHIVED = 'archived';

    private array $fields = [];

    protected function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('fileId', $data)) {
            $this->setFileId($data['fileId']);
        }
        if (array_key_exists('fileIds', $data)) {
            $this->setFileIds($data['fileIds']);
        }
        if (array_key_exists('documentType', $data)) {
            $this->setDocumentType($data['documentType']);
        }
        if (array_key_exists('documentSubtype', $data)) {
            $this->setDocumentSubtype($data['documentSubtype']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('rejectionReason', $data)) {
            $this->setRejectionReason($data['rejectionReason']);
        }
        if (array_key_exists('requestId', $data)) {
            $this->setRequestId($data['requestId']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('processedTime', $data)) {
            $this->setProcessedTime($data['processedTime']);
        }
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getFileId(): ?string
    {
        return $this->fields['fileId'] ?? null;
    }

    public function setFileId(null|string $fileId): self
    {
        $this->fields['fileId'] = $fileId;

        return $this;
    }

    /**
     * @return null|string[]
     */
    public function getFileIds(): ?array
    {
        return $this->fields['fileIds'] ?? null;
    }

    /**
     * @param null|string[] $fileIds
     */
    public function setFileIds(null|array $fileIds): self
    {
        $fileIds = $fileIds !== null ? array_map(fn ($value) => $value ?? null, $fileIds) : null;

        $this->fields['fileIds'] = $fileIds;

        return $this;
    }

    public function getDocumentType(): KycDocumentTypes
    {
        return $this->fields['documentType'];
    }

    public function setDocumentType(KycDocumentTypes|string $documentType): self
    {
        if (!($documentType instanceof KycDocumentTypes)) {
            $documentType = KycDocumentTypes::from($documentType);
        }

        $this->fields['documentType'] = $documentType;

        return $this;
    }

    public function getDocumentSubtype(): ?KycDocumentSubtypes
    {
        return $this->fields['documentSubtype'] ?? null;
    }

    public function setDocumentSubtype(null|KycDocumentSubtypes|string $documentSubtype): self
    {
        if ($documentSubtype !== null && !($documentSubtype instanceof KycDocumentSubtypes)) {
            $documentSubtype = KycDocumentSubtypes::from($documentSubtype);
        }

        $this->fields['documentSubtype'] = $documentSubtype;

        return $this;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function getRejectionReason(): ?KycDocumentRejection
    {
        return $this->fields['rejectionReason'] ?? null;
    }

    public function setRejectionReason(null|KycDocumentRejection|array $rejectionReason): self
    {
        if ($rejectionReason !== null && !($rejectionReason instanceof KycDocumentRejection)) {
            $rejectionReason = KycDocumentRejection::from($rejectionReason);
        }

        $this->fields['rejectionReason'] = $rejectionReason;

        return $this;
    }

    public function getRequestId(): ?string
    {
        return $this->fields['requestId'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getProcessedTime(): ?DateTimeImmutable
    {
        return $this->fields['processedTime'] ?? null;
    }

    public function setProcessedTime(null|DateTimeImmutable|string $processedTime): self
    {
        if ($processedTime !== null && !($processedTime instanceof DateTimeImmutable)) {
            $processedTime = new DateTimeImmutable($processedTime);
        }

        $this->fields['processedTime'] = $processedTime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('fileId', $this->fields)) {
            $data['fileId'] = $this->fields['fileId'];
        }
        if (array_key_exists('fileIds', $this->fields)) {
            $data['fileIds'] = $this->fields['fileIds'];
        }
        if (array_key_exists('documentType', $this->fields)) {
            $data['documentType'] = $this->fields['documentType']?->value;
        }
        if (array_key_exists('documentSubtype', $this->fields)) {
            $data['documentSubtype'] = $this->fields['documentSubtype']?->value;
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('rejectionReason', $this->fields)) {
            $data['rejectionReason'] = $this->fields['rejectionReason']?->jsonSerialize();
        }
        if (array_key_exists('requestId', $this->fields)) {
            $data['requestId'] = $this->fields['requestId'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('processedTime', $this->fields)) {
            $data['processedTime'] = $this->fields['processedTime']?->format(DateTimeInterface::RFC3339);
        }

        return $data;
    }

    private function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @psalm-param self::STATUS_*|null $status
     */
    private function setStatus(null|string $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setRequestId(null|string $requestId): self
    {
        $this->fields['requestId'] = $requestId;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): self
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }
}
