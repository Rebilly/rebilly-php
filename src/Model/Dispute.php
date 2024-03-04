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

class Dispute implements JsonSerializable
{
    public const CATEGORY_FRAUD = 'fraud';

    public const CATEGORY_AUTHORIZATION = 'authorization';

    public const CATEGORY_PROCESSING_ERRORS = 'processing-errors';

    public const CATEGORY_CONSUMER_DISPUTES = 'consumer-disputes';

    public const CATEGORY_UNCATEGORIZED = 'uncategorized';

    public const CATEGORY_BANK_RETURN = 'bank-return';

    public const TYPE_INFORMATION_REQUEST = 'information-request';

    public const TYPE_FIRST_CHARGEBACK = 'first-chargeback';

    public const TYPE_SECOND_CHARGEBACK = 'second-chargeback';

    public const TYPE_ARBITRATION = 'arbitration';

    public const TYPE_FRAUD = 'fraud';

    public const TYPE_ETHOCA_ALERT = 'ethoca-alert';

    public const TYPE_VERIFI_ALERT = 'verifi-alert';

    public const TYPE_BANK_RETURN = 'bank-return';

    public const STATUS_RESPONSE_NEEDED = 'response-needed';

    public const STATUS_UNDER_REVIEW = 'under-review';

    public const STATUS_FORFEITED = 'forfeited';

    public const STATUS_WON = 'won';

    public const STATUS_LOST = 'lost';

    public const STATUS_UNKNOWN = 'unknown';

    public const SOURCE_NULL = 'null';

    public const SOURCE_API = 'api';

    public const SOURCE_MANUAL = 'manual';

    public const SOURCE_SFTP = 'sftp';

    public const SOURCE_WEBHOOK = 'webhook';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('transactionId', $data)) {
            $this->setTransactionId($data['transactionId']);
        }
        if (array_key_exists('currency', $data)) {
            $this->setCurrency($data['currency']);
        }
        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
        if (array_key_exists('acquirerReferenceNumber', $data)) {
            $this->setAcquirerReferenceNumber($data['acquirerReferenceNumber']);
        }
        if (array_key_exists('caseId', $data)) {
            $this->setCaseId($data['caseId']);
        }
        if (array_key_exists('reasonCode', $data)) {
            $this->setReasonCode($data['reasonCode']);
        }
        if (array_key_exists('reasonDescription', $data)) {
            $this->setReasonDescription($data['reasonDescription']);
        }
        if (array_key_exists('category', $data)) {
            $this->setCategory($data['category']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('postedTime', $data)) {
            $this->setPostedTime($data['postedTime']);
        }
        if (array_key_exists('deadlineTime', $data)) {
            $this->setDeadlineTime($data['deadlineTime']);
        }
        if (array_key_exists('rawResponse', $data)) {
            $this->setRawResponse($data['rawResponse']);
        }
        if (array_key_exists('resolvedTime', $data)) {
            $this->setResolvedTime($data['resolvedTime']);
        }
        if (array_key_exists('source', $data)) {
            $this->setSource($data['source']);
        }
        if (array_key_exists('revision', $data)) {
            $this->setRevision($data['revision']);
        }
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
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

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    public function getCustomerId(): ?string
    {
        return $this->fields['customerId'] ?? null;
    }

    public function getTransactionId(): ?string
    {
        return $this->fields['transactionId'] ?? null;
    }

    public function setTransactionId(null|string $transactionId): static
    {
        $this->fields['transactionId'] = $transactionId;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->fields['currency'] ?? null;
    }

    public function setCurrency(null|string $currency): static
    {
        $this->fields['currency'] = $currency;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->fields['amount'] ?? null;
    }

    public function setAmount(null|float|string $amount): static
    {
        if (is_string($amount)) {
            $amount = (float) $amount;
        }

        $this->fields['amount'] = $amount;

        return $this;
    }

    public function getAcquirerReferenceNumber(): ?string
    {
        return $this->fields['acquirerReferenceNumber'] ?? null;
    }

    public function setAcquirerReferenceNumber(null|string $acquirerReferenceNumber): static
    {
        $this->fields['acquirerReferenceNumber'] = $acquirerReferenceNumber;

        return $this;
    }

    public function getCaseId(): ?string
    {
        return $this->fields['caseId'] ?? null;
    }

    public function setCaseId(null|string $caseId): static
    {
        $this->fields['caseId'] = $caseId;

        return $this;
    }

    public function getReasonCode(): ?string
    {
        return $this->fields['reasonCode'] ?? null;
    }

    public function setReasonCode(null|string $reasonCode): static
    {
        $this->fields['reasonCode'] = $reasonCode;

        return $this;
    }

    public function getReasonDescription(): ?string
    {
        return $this->fields['reasonDescription'] ?? null;
    }

    public function getCategory(): ?string
    {
        return $this->fields['category'] ?? null;
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

    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|string $status): static
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function getPostedTime(): ?DateTimeImmutable
    {
        return $this->fields['postedTime'] ?? null;
    }

    public function setPostedTime(null|DateTimeImmutable|string $postedTime): static
    {
        if ($postedTime !== null && !($postedTime instanceof DateTimeImmutable)) {
            $postedTime = new DateTimeImmutable($postedTime);
        }

        $this->fields['postedTime'] = $postedTime;

        return $this;
    }

    public function getDeadlineTime(): ?DateTimeImmutable
    {
        return $this->fields['deadlineTime'] ?? null;
    }

    public function setDeadlineTime(null|DateTimeImmutable|string $deadlineTime): static
    {
        if ($deadlineTime !== null && !($deadlineTime instanceof DateTimeImmutable)) {
            $deadlineTime = new DateTimeImmutable($deadlineTime);
        }

        $this->fields['deadlineTime'] = $deadlineTime;

        return $this;
    }

    public function getRawResponse(): ?string
    {
        return $this->fields['rawResponse'] ?? null;
    }

    public function getResolvedTime(): ?DateTimeImmutable
    {
        return $this->fields['resolvedTime'] ?? null;
    }

    public function getSource(): ?string
    {
        return $this->fields['source'] ?? null;
    }

    public function getRevision(): ?int
    {
        return $this->fields['revision'] ?? null;
    }

    public function getCreatedTime(): ?DateTimeImmutable
    {
        return $this->fields['createdTime'] ?? null;
    }

    public function getUpdatedTime(): ?DateTimeImmutable
    {
        return $this->fields['updatedTime'] ?? null;
    }

    /**
     * @return null|ResourceLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function getEmbedded(): ?DisputeEmbedded
    {
        return $this->fields['_embedded'] ?? null;
    }

    public function setEmbedded(null|DisputeEmbedded|array $embedded): static
    {
        if ($embedded !== null && !($embedded instanceof DisputeEmbedded)) {
            $embedded = DisputeEmbedded::from($embedded);
        }

        $this->fields['_embedded'] = $embedded;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('transactionId', $this->fields)) {
            $data['transactionId'] = $this->fields['transactionId'];
        }
        if (array_key_exists('currency', $this->fields)) {
            $data['currency'] = $this->fields['currency'];
        }
        if (array_key_exists('amount', $this->fields)) {
            $data['amount'] = $this->fields['amount'];
        }
        if (array_key_exists('acquirerReferenceNumber', $this->fields)) {
            $data['acquirerReferenceNumber'] = $this->fields['acquirerReferenceNumber'];
        }
        if (array_key_exists('caseId', $this->fields)) {
            $data['caseId'] = $this->fields['caseId'];
        }
        if (array_key_exists('reasonCode', $this->fields)) {
            $data['reasonCode'] = $this->fields['reasonCode'];
        }
        if (array_key_exists('reasonDescription', $this->fields)) {
            $data['reasonDescription'] = $this->fields['reasonDescription'];
        }
        if (array_key_exists('category', $this->fields)) {
            $data['category'] = $this->fields['category'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('postedTime', $this->fields)) {
            $data['postedTime'] = $this->fields['postedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('deadlineTime', $this->fields)) {
            $data['deadlineTime'] = $this->fields['deadlineTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('rawResponse', $this->fields)) {
            $data['rawResponse'] = $this->fields['rawResponse'];
        }
        if (array_key_exists('resolvedTime', $this->fields)) {
            $data['resolvedTime'] = $this->fields['resolvedTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('source', $this->fields)) {
            $data['source'] = $this->fields['source'];
        }
        if (array_key_exists('revision', $this->fields)) {
            $data['revision'] = $this->fields['revision'];
        }
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']?->format(DateTimeInterface::RFC3339);
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

    private function setCustomerId(null|string $customerId): static
    {
        $this->fields['customerId'] = $customerId;

        return $this;
    }

    private function setReasonDescription(null|string $reasonDescription): static
    {
        $this->fields['reasonDescription'] = $reasonDescription;

        return $this;
    }

    private function setCategory(null|string $category): static
    {
        $this->fields['category'] = $category;

        return $this;
    }

    private function setRawResponse(null|string $rawResponse): static
    {
        $this->fields['rawResponse'] = $rawResponse;

        return $this;
    }

    private function setResolvedTime(null|DateTimeImmutable|string $resolvedTime): static
    {
        if ($resolvedTime !== null && !($resolvedTime instanceof DateTimeImmutable)) {
            $resolvedTime = new DateTimeImmutable($resolvedTime);
        }

        $this->fields['resolvedTime'] = $resolvedTime;

        return $this;
    }

    private function setSource(null|string $source): static
    {
        $this->fields['source'] = $source;

        return $this;
    }

    private function setRevision(null|int $revision): static
    {
        $this->fields['revision'] = $revision;

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
