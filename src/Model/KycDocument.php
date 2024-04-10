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

interface KycDocument
{
    public function getDocumentType(): string;

    public function getId(): ?string;

    /**
     * @return string[]
     */
    public function getFileIds(): array;

    /**
     * @param string[] $fileIds
     */
    public function setFileIds(array $fileIds): static;

    public function getDocumentSubtype(): ?string;

    public function setDocumentSubtype(null|string $documentSubtype): static;

    public function getStatus(): string;

    public function getRejectionReason(): ?KycDocumentRejection;

    public function setRejectionReason(null|KycDocumentRejection|array $rejectionReason): static;

    public function getRequestId(): ?string;

    public function getCreatedTime(): ?DateTimeImmutable;

    public function getUpdatedTime(): ?DateTimeImmutable;

    public function getProcessedTime(): ?DateTimeImmutable;

    public function getCustomerId(): string;

    public function setCustomerId(string $customerId): static;

    public function getReviewerId(): ?string;

    public function getReviewerName(): ?string;

    public function getReviewStartTime(): ?DateTimeImmutable;

    public function getReviewTime(): ?DateTimeImmutable;

    public function getNotes(): ?string;

    public function setNotes(null|string $notes): static;

    /**
     * @return null|Tag[]
     */
    public function getTags(): ?array;

    public function getReason(): ?string;

    public function setReason(null|string $reason): static;

    public function getMatchLevel(): ?int;

    public function setMatchLevel(null|int $matchLevel): static;

    public function getRevision(): ?int;

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array;
}
