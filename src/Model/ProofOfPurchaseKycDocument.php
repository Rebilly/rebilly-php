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

class ProofOfPurchaseKycDocument implements KycDocument, JsonSerializable
{
    public const STATUS_PENDING = 'pending';

    public const STATUS_IN_PROGRESS = 'in-progress';

    public const STATUS_ACCEPTED = 'accepted';

    public const STATUS_REJECTED = 'rejected';

    public const STATUS_ARCHIVED = 'archived';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('fileIds', $data)) {
            $this->setFileIds($data['fileIds']);
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
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('reviewerId', $data)) {
            $this->setReviewerId($data['reviewerId']);
        }
        if (array_key_exists('reviewerName', $data)) {
            $this->setReviewerName($data['reviewerName']);
        }
        if (array_key_exists('reviewStartTime', $data)) {
            $this->setReviewStartTime($data['reviewStartTime']);
        }
        if (array_key_exists('reviewTime', $data)) {
            $this->setReviewTime($data['reviewTime']);
        }
        if (array_key_exists('notes', $data)) {
            $this->setNotes($data['notes']);
        }
        if (array_key_exists('tags', $data)) {
            $this->setTags($data['tags']);
        }
        if (array_key_exists('reason', $data)) {
            $this->setReason($data['reason']);
        }
        if (array_key_exists('matchLevel', $data)) {
            $this->setMatchLevel($data['matchLevel']);
        }
        if (array_key_exists('settings', $data)) {
            $this->setSettings($data['settings']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('documentMatches', $data)) {
            $this->setDocumentMatches($data['documentMatches']);
        }
        if (array_key_exists('parsedData', $data)) {
            $this->setParsedData($data['parsedData']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
        if (array_key_exists('_embedded', $data)) {
            $this->setEmbedded($data['_embedded']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getDocumentType(): string
    {
        return 'purchase-proof';
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    /**
     * @return string[]
     */
    public function getFileIds(): array
    {
        return $this->fields['fileIds'];
    }

    /**
     * @param string[] $fileIds
     */
    public function setFileIds(array $fileIds): static
    {
        $fileIds = array_map(
            fn ($value) => $value,
            $fileIds,
        );

        $this->fields['fileIds'] = $fileIds;

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

    public function getStatus(): string
    {
        return $this->fields['status'];
    }

    public function getRejectionReason(): ?KycDocumentRejection
    {
        return $this->fields['rejectionReason'] ?? null;
    }

    public function setRejectionReason(null|KycDocumentRejection|array $rejectionReason): static
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

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    public function getProcessedTime(): ?DateTimeImmutable
    {
        return $this->fields['processedTime'] ?? null;
    }

    public function getCustomerId(): string
    {
        return $this->fields['customerId'];
    }

    public function setCustomerId(string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    public function getReviewerId(): ?string
    {
        return $this->fields['reviewerId'] ?? null;
    }

    public function getReviewerName(): ?string
    {
        return $this->fields['reviewerName'] ?? null;
    }

    public function getReviewStartTime(): ?DateTimeImmutable
    {
        return $this->fields['reviewStartTime'] ?? null;
    }

    public function getReviewTime(): ?DateTimeImmutable
    {
        return $this->fields['reviewTime'] ?? null;
    }

    public function getNotes(): ?string
    {
        return $this->fields['notes'] ?? null;
    }

    public function setNotes(null|string $notes): static
    {
        $this->fields['notes'] = $notes;

        return $this;
    }

    /**
     * @return null|Tag[]
     */
    public function getTags(): ?array
    {
        return $this->fields['tags'] ?? null;
    }

    public function getReason(): ?string
    {
        return $this->fields['reason'] ?? null;
    }

    public function setReason(null|string $reason): static
    {
        $this->fields['reason'] = $reason;

        return $this;
    }

    public function getMatchLevel(): ?int
    {
        return $this->fields['matchLevel'] ?? null;
    }

    public function setMatchLevel(null|int $matchLevel): static
    {
        $this->fields['matchLevel'] = $matchLevel;

        return $this;
    }

    public function getSettings(): ?object
    {
        return $this->fields['settings'] ?? null;
    }

    public function setSettings(null|object $settings): static
    {
        $this->fields['settings'] = $settings;

        return $this;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    public function getDocumentMatches(): ?ProofOfPurchaseKycDocumentDocumentMatches
    {
        return $this->fields['documentMatches'] ?? null;
    }

    public function setDocumentMatches(null|ProofOfPurchaseKycDocumentDocumentMatches|array $documentMatches): static
    {
        if ($documentMatches !== null && !($documentMatches instanceof ProofOfPurchaseKycDocumentDocumentMatches)) {
            $documentMatches = ProofOfPurchaseKycDocumentDocumentMatches::from($documentMatches);
        }

        $this->fields['documentMatches'] = $documentMatches;

        return $this;
    }

    public function getParsedData(): ?ProofOfPurchaseKycDocumentParsedData
    {
        return $this->fields['parsedData'] ?? null;
    }

    public function setParsedData(null|ProofOfPurchaseKycDocumentParsedData|array $parsedData): static
    {
        if ($parsedData !== null && !($parsedData instanceof ProofOfPurchaseKycDocumentParsedData)) {
            $parsedData = ProofOfPurchaseKycDocumentParsedData::from($parsedData);
        }

        $this->fields['parsedData'] = $parsedData;

        return $this;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getEmbedded(): ?ProofOfIdentityKycDocumentEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|ProofOfIdentityKycDocumentEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof ProofOfIdentityKycDocumentEmbedded)) {
            $embedded = ProofOfIdentityKycDocumentEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'documentType' => 'purchase-proof',
        ];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('fileIds', $this->fields)) {
            $data['fileIds'] = $this->fields['fileIds'];
        }
        if (array_key_exists('documentSubtype', $this->fields)) {
            $data['documentSubtype'] = $this->fields['documentSubtype'];
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
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('reviewerId', $this->fields)) {
            $data['reviewerId'] = $this->fields['reviewerId'];
        }
        if (array_key_exists('reviewerName', $this->fields)) {
            $data['reviewerName'] = $this->fields['reviewerName'];
        }
        if (array_key_exists('reviewStartTime', $this->fields)) {
            $data['reviewStartTime'] = $this->fields['reviewStartTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('reviewTime', $this->fields)) {
            $data['reviewTime'] = $this->fields['reviewTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('notes', $this->fields)) {
            $data['notes'] = $this->fields['notes'];
        }
        if (array_key_exists('tags', $this->fields)) {
            $data['tags'] = $this->fields['tags'];
        }
        if (array_key_exists('reason', $this->fields)) {
            $data['reason'] = $this->fields['reason'];
        }
        if (array_key_exists('matchLevel', $this->fields)) {
            $data['matchLevel'] = $this->fields['matchLevel'];
        }
        if (array_key_exists('settings', $this->fields)) {
            $data['settings'] = $this->fields['settings'];
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('documentMatches', $this->fields)) {
            $data['documentMatches'] = $this->fields['documentMatches']?->jsonSerialize();
        }
        if (array_key_exists('parsedData', $this->fields)) {
            $data['parsedData'] = $this->fields['parsedData']?->jsonSerialize();
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }
        if (array_key_exists('_embedded', $this->fields)) {
            $data['_embedded'] = $this->fields['_embedded']?->jsonSerialize();
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    private function setStatus(string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    private function setRequestId(null|string $requestId): static
    {
        $this->fields['requestId'] = $requestId;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): static
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(null|DateTimeImmutable|string $updatedTime): static
    {
        if ($updatedTime !== null && !($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }

    private function setProcessedTime(null|DateTimeImmutable|string $processedTime): static
    {
        if ($processedTime !== null && !($processedTime instanceof DateTimeImmutable)) {
            $processedTime = new DateTimeImmutable($processedTime);
        }

        $this->fields['processedTime'] = $processedTime;

        return $this;
    }

    private function setReviewerId(null|string $reviewerId): static
    {
        $this->fields['reviewerId'] = $reviewerId;

        return $this;
    }

    private function setReviewerName(null|string $reviewerName): static
    {
        $this->fields['reviewerName'] = $reviewerName;

        return $this;
    }

    private function setReviewStartTime(null|DateTimeImmutable|string $reviewStartTime): static
    {
        if ($reviewStartTime !== null && !($reviewStartTime instanceof DateTimeImmutable)) {
            $reviewStartTime = new DateTimeImmutable($reviewStartTime);
        }

        $this->fields['reviewStartTime'] = $reviewStartTime;

        return $this;
    }

    private function setReviewTime(null|DateTimeImmutable|string $reviewTime): static
    {
        if ($reviewTime !== null && !($reviewTime instanceof DateTimeImmutable)) {
            $reviewTime = new DateTimeImmutable($reviewTime);
        }

        $this->fields['reviewTime'] = $reviewTime;

        return $this;
    }

    /**
     * @param null|array[]|Tag[] $tags
     */
    private function setTags(null|array $tags): static
    {
        $tags = $tags !== null ? array_map(
            fn ($value) => $value !== null ? ($value instanceof Tag ? $value : Tag::from($value)) : null,
            $tags,
        ) : null;

        $this->fields['tags'] = $tags;

        return $this;
    }

    private function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

        return $this;
    }

    /**
     * @param null|array[]|ResourceLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(
            fn ($value) => $value instanceof ResourceLink ? $value : ResourceLink::from($value),
            $links,
        ) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
