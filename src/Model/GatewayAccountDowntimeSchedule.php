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

class GatewayAccountDowntimeSchedule implements JsonSerializable
{
    public const STATUS_PENDING = 'pending';

    public const STATUS_ONGOING = 'ongoing';

    public const STATUS_FINISHED = 'finished';

    public const REASON_SCHEDULED_MAINTENANCE = 'scheduled-maintenance';

    public const REASON_DAILY_LIMIT_REACHED = 'daily-limit-reached';

    public const REASON_MONTHLY_LIMIT_REACHED = 'monthly-limit-reached';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('reason', $data)) {
            $this->setReason($data['reason']);
        }
        if (array_key_exists('startTime', $data)) {
            $this->setStartTime($data['startTime']);
        }
        if (array_key_exists('endTime', $data)) {
            $this->setEndTime($data['endTime']);
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
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getId(): ?string
    {
        return $this->fields['id'] ?? null;
    }

    /**
     * @psalm-return self::STATUS_*|null $status
     */
    public function getStatus(): ?string
    {
        return $this->fields['status'] ?? null;
    }

    /**
     * @psalm-return self::REASON_*|null $reason
     */
    public function getReason(): ?string
    {
        return $this->fields['reason'] ?? null;
    }

    public function getStartTime(): DateTimeImmutable
    {
        return $this->fields['startTime'];
    }

    public function setStartTime(DateTimeImmutable|string $startTime): self
    {
        if (!($startTime instanceof DateTimeImmutable)) {
            $startTime = new DateTimeImmutable($startTime);
        }

        $this->fields['startTime'] = $startTime;

        return $this;
    }

    public function getEndTime(): DateTimeImmutable
    {
        return $this->fields['endTime'];
    }

    public function setEndTime(DateTimeImmutable|string $endTime): self
    {
        if (!($endTime instanceof DateTimeImmutable)) {
            $endTime = new DateTimeImmutable($endTime);
        }

        $this->fields['endTime'] = $endTime;

        return $this;
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
     * @return null|SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('reason', $this->fields)) {
            $data['reason'] = $this->fields['reason'];
        }
        if (array_key_exists('startTime', $this->fields)) {
            $data['startTime'] = $this->fields['startTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('endTime', $this->fields)) {
            $data['endTime'] = $this->fields['endTime']?->format(DateTimeInterface::RFC3339);
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

    /**
     * @psalm-param self::REASON_*|null $reason
     */
    private function setReason(null|string $reason): self
    {
        $this->fields['reason'] = $reason;

        return $this;
    }

    private function setCreatedTime(null|DateTimeImmutable|string $createdTime): self
    {
        if ($createdTime !== null && !($createdTime instanceof DateTimeImmutable)) {
            $createdTime = new DateTimeImmutable($createdTime);
        }

        $this->fields['createdTime'] = $createdTime;

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

    /**
     * @param null|SelfLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
