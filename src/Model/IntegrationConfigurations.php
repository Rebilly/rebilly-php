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

class IntegrationConfigurations implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('labels', $data)) {
            $this->setLabels($data['labels']);
        }
        if (array_key_exists('eventType', $data)) {
            $this->setEventType($data['eventType']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    /**
     * @return null|string[]
     */
    public function getLabels(): ?array
    {
        return $this->fields['labels'] ?? null;
    }

    /**
     * @param null|string[] $labels
     */
    public function setLabels(null|array $labels): static
    {
        $labels = $labels !== null ? array_map(fn ($value) => $value ?? null, $labels) : null;

        $this->fields['labels'] = $labels;

        return $this;
    }

    public function getEventType(): ?EventType
    {
        return $this->fields['eventType'] ?? null;
    }

    public function setEventType(null|EventType|string $eventType): static
    {
        if ($eventType !== null && !($eventType instanceof EventType)) {
            $eventType = EventType::from($eventType);
        }

        $this->fields['eventType'] = $eventType;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->fields['title'] ?? null;
    }

    public function setTitle(null|string $title): static
    {
        $this->fields['title'] = $title;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('labels', $this->fields)) {
            $data['labels'] = $this->fields['labels'];
        }
        if (array_key_exists('eventType', $this->fields)) {
            $data['eventType'] = $this->fields['eventType']?->value;
        }
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }

        return $data;
    }
}
