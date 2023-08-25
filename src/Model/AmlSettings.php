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

class AmlSettings implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('confidence', $data)) {
            $this->setConfidence($data['confidence']);
        }
        if (array_key_exists('priority', $data)) {
            $this->setPriority($data['priority']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getConfidence(): ?AmlSettingsConfidence
    {
        return $this->fields['confidence'] ?? null;
    }

    public function setConfidence(null|AmlSettingsConfidence|array $confidence): static
    {
        if ($confidence !== null && !($confidence instanceof AmlSettingsConfidence)) {
            $confidence = AmlSettingsConfidence::from($confidence);
        }

        $this->fields['confidence'] = $confidence;

        return $this;
    }

    public function getPriority(): ?AmlSettingsPriority
    {
        return $this->fields['priority'] ?? null;
    }

    public function setPriority(null|AmlSettingsPriority|array $priority): static
    {
        if ($priority !== null && !($priority instanceof AmlSettingsPriority)) {
            $priority = AmlSettingsPriority::from($priority);
        }

        $this->fields['priority'] = $priority;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('confidence', $this->fields)) {
            $data['confidence'] = $this->fields['confidence']?->jsonSerialize();
        }
        if (array_key_exists('priority', $this->fields)) {
            $data['priority'] = $this->fields['priority']?->jsonSerialize();
        }

        return $data;
    }
}
