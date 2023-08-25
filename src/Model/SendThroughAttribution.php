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

class SendThroughAttribution implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('eventType', $data)) {
            $this->setEventType($data['eventType']);
        }
        if (array_key_exists('actionId', $data)) {
            $this->setActionId($data['actionId']);
        }
        if (array_key_exists('versionId', $data)) {
            $this->setVersionId($data['versionId']);
        }
        if (array_key_exists('sent', $data)) {
            $this->setSent($data['sent']);
        }
        if (array_key_exists('goal', $data)) {
            $this->setGoal($data['goal']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getEventType(): ?string
    {
        return $this->fields['eventType'] ?? null;
    }

    public function setEventType(null|string $eventType): static
    {
        $this->fields['eventType'] = $eventType;

        return $this;
    }

    public function getActionId(): ?string
    {
        return $this->fields['actionId'] ?? null;
    }

    public function setActionId(null|string $actionId): static
    {
        $this->fields['actionId'] = $actionId;

        return $this;
    }

    public function getVersionId(): ?string
    {
        return $this->fields['versionId'] ?? null;
    }

    public function setVersionId(null|string $versionId): static
    {
        $this->fields['versionId'] = $versionId;

        return $this;
    }

    public function getSent(): ?int
    {
        return $this->fields['sent'] ?? null;
    }

    public function setSent(null|int $sent): static
    {
        $this->fields['sent'] = $sent;

        return $this;
    }

    public function getGoal(): ?int
    {
        return $this->fields['goal'] ?? null;
    }

    public function setGoal(null|int $goal): static
    {
        $this->fields['goal'] = $goal;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('eventType', $this->fields)) {
            $data['eventType'] = $this->fields['eventType'];
        }
        if (array_key_exists('actionId', $this->fields)) {
            $data['actionId'] = $this->fields['actionId'];
        }
        if (array_key_exists('versionId', $this->fields)) {
            $data['versionId'] = $this->fields['versionId'];
        }
        if (array_key_exists('sent', $this->fields)) {
            $data['sent'] = $this->fields['sent'];
        }
        if (array_key_exists('goal', $this->fields)) {
            $data['goal'] = $this->fields['goal'];
        }

        return $data;
    }
}
