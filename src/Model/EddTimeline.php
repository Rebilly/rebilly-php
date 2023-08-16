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

class EddTimeline implements JsonSerializable
{
    public const TYPE_EDD_SEARCH_PERFORMED = 'edd-search-performed';

    public const TYPE_EDD_SCORE_MANUALLY_UPDATED = 'edd-score-manually-updated';

    public const TYPE_TIMELINE_COMMENT_CREATED = 'timeline-comment-created';

    public const TRIGGERED_BY_REBILLY = 'rebilly';

    public const TRIGGERED_BY_APP = 'app';

    public const TRIGGERED_BY_DIRECT_API = 'direct-api';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('triggeredBy', $data)) {
            $this->setTriggeredBy($data['triggeredBy']);
        }
        if (array_key_exists('message', $data)) {
            $this->setMessage($data['message']);
        }
        if (array_key_exists('extraData', $data)) {
            $this->setExtraData($data['extraData']);
        }
        if (array_key_exists('occurredTime', $data)) {
            $this->setOccurredTime($data['occurredTime']);
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
     * @psalm-return self::TYPE_*|null $type
     */
    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    /**
     * @psalm-return self::TRIGGERED_BY_*|null $triggeredBy
     */
    public function getTriggeredBy(): ?string
    {
        return $this->fields['triggeredBy'] ?? null;
    }

    public function getMessage(): ?string
    {
        return $this->fields['message'] ?? null;
    }

    public function setMessage(null|string $message): static
    {
        $this->fields['message'] = $message;

        return $this;
    }

    public function getExtraData(): ?TimelineExtraData
    {
        return $this->fields['extraData'] ?? null;
    }

    public function setExtraData(null|TimelineExtraData|array $extraData): static
    {
        if ($extraData !== null && !($extraData instanceof TimelineExtraData)) {
            $extraData = TimelineExtraData::from($extraData);
        }

        $this->fields['extraData'] = $extraData;

        return $this;
    }

    public function getOccurredTime(): ?DateTimeImmutable
    {
        return $this->fields['occurredTime'] ?? null;
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
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('triggeredBy', $this->fields)) {
            $data['triggeredBy'] = $this->fields['triggeredBy'];
        }
        if (array_key_exists('message', $this->fields)) {
            $data['message'] = $this->fields['message'];
        }
        if (array_key_exists('extraData', $this->fields)) {
            $data['extraData'] = $this->fields['extraData']?->jsonSerialize();
        }
        if (array_key_exists('occurredTime', $this->fields)) {
            $data['occurredTime'] = $this->fields['occurredTime']?->format(DateTimeInterface::RFC3339);
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    /**
     * @psalm-param self::TYPE_*|null $type
     */
    private function setType(null|string $type): static
    {
        $this->fields['type'] = $type;

        return $this;
    }

    /**
     * @psalm-param self::TRIGGERED_BY_*|null $triggeredBy
     */
    private function setTriggeredBy(null|string $triggeredBy): static
    {
        $this->fields['triggeredBy'] = $triggeredBy;

        return $this;
    }

    private function setOccurredTime(null|DateTimeImmutable|string $occurredTime): static
    {
        if ($occurredTime !== null && !($occurredTime instanceof DateTimeImmutable)) {
            $occurredTime = new DateTimeImmutable($occurredTime);
        }

        $this->fields['occurredTime'] = $occurredTime;

        return $this;
    }

    /**
     * @param null|SelfLink[] $links
     */
    private function setLinks(null|array $links): static
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
