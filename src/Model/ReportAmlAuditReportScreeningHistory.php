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
use Rebilly\Sdk\Trait\HasMetadata;

class ReportAmlAuditReportScreeningHistory implements JsonSerializable
{
    use HasMetadata;

    public const SOURCE_SIGN_UP = 'sign-up';

    public const SOURCE_RECURRING = 'recurring';

    public const SOURCE_PURCHASE = 'purchase';

    public const RESULT_CLEAR = 'clear';

    public const RESULT_CONFIRMED_MATCH = 'confirmed-match';

    public const RESULT_PENDING_REVIEW = 'pending-review';

    private array $fields = [];

    public function __construct(array $data = [], array $metadata = [])
    {
        if (array_key_exists('createdTime', $data)) {
            $this->setCreatedTime($data['createdTime']);
        }
        if (array_key_exists('updatedTime', $data)) {
            $this->setUpdatedTime($data['updatedTime']);
        }
        if (array_key_exists('customerId', $data)) {
            $this->setCustomerId($data['customerId']);
        }
        if (array_key_exists('source', $data)) {
            $this->setSource($data['source']);
        }
        if (array_key_exists('hitSources', $data)) {
            $this->setHitSources($data['hitSources']);
        }
        if (array_key_exists('result', $data)) {
            $this->setResult($data['result']);
        }
        if (array_key_exists('reviewer', $data)) {
            $this->setReviewer($data['reviewer']);
        }
        $this->setMetadata($metadata);
    }

    public static function from(array $data = [], array $metadata = []): self
    {
        return new self($data, $metadata);
    }

    public function getCreatedTime(): DateTimeImmutable
    {
        return $this->fields['createdTime'];
    }

    public function getUpdatedTime(): DateTimeImmutable
    {
        return $this->fields['updatedTime'];
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

    public function getSource(): string
    {
        return $this->fields['source'];
    }

    public function setSource(string $source): static
    {
        $this->fields['source'] = $source;

        return $this;
    }

    public function getHitSources(): ?string
    {
        return $this->fields['hitSources'] ?? null;
    }

    public function setHitSources(null|string $hitSources): static
    {
        $this->fields['hitSources'] = $hitSources;

        return $this;
    }

    public function getResult(): string
    {
        return $this->fields['result'];
    }

    public function setResult(string $result): static
    {
        $this->fields['result'] = $result;

        return $this;
    }

    public function getReviewer(): ?string
    {
        return $this->fields['reviewer'] ?? null;
    }

    public function setReviewer(null|string $reviewer): static
    {
        $this->fields['reviewer'] = $reviewer;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('createdTime', $this->fields)) {
            $data['createdTime'] = $this->fields['createdTime']->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('updatedTime', $this->fields)) {
            $data['updatedTime'] = $this->fields['updatedTime']->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('customerId', $this->fields)) {
            $data['customerId'] = $this->fields['customerId'];
        }
        if (array_key_exists('source', $this->fields)) {
            $data['source'] = $this->fields['source'];
        }
        if (array_key_exists('hitSources', $this->fields)) {
            $data['hitSources'] = $this->fields['hitSources'];
        }
        if (array_key_exists('result', $this->fields)) {
            $data['result'] = $this->fields['result'];
        }
        if (array_key_exists('reviewer', $this->fields)) {
            $data['reviewer'] = $this->fields['reviewer'];
        }

        return $data;
    }

    private function setCreatedTime(DateTimeImmutable|string $createdTime): static
    {
        if (!($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

        return $this;
    }

    private function setUpdatedTime(DateTimeImmutable|string $updatedTime): static
    {
        if (!($updatedTime instanceof DateTimeImmutable)) {
            $updatedTime = new DateTimeImmutable($updatedTime);
        }

        $this->fields['updatedTime'] = $updatedTime;

        return $this;
    }
}
