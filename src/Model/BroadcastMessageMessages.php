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

class BroadcastMessageMessages implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('version', $data)) {
            $this->setVersion($data['version']);
        }
        if (array_key_exists('weight', $data)) {
            $this->setWeight($data['weight']);
        }
        if (array_key_exists('templates', $data)) {
            $this->setTemplates($data['templates']);
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

    public function setId(null|string $id): static
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->fields['version'] ?? null;
    }

    public function setVersion(null|string $version): static
    {
        $this->fields['version'] = $version;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->fields['weight'] ?? null;
    }

    public function setWeight(null|int $weight): static
    {
        $this->fields['weight'] = $weight;

        return $this;
    }

    /**
     * @return BroadcastMessageMessagesTemplates[]
     */
    public function getTemplates(): array
    {
        return $this->fields['templates'];
    }

    /**
     * @param array[]|BroadcastMessageMessagesTemplates[] $templates
     */
    public function setTemplates(array $templates): static
    {
        $templates = array_map(
            fn ($value) => $value !== null ? ($value instanceof BroadcastMessageMessagesTemplates ? $value : BroadcastMessageMessagesTemplates::from($value)) : null,
            $templates,
        );

        $this->fields['templates'] = $templates;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('version', $this->fields)) {
            $data['version'] = $this->fields['version'];
        }
        if (array_key_exists('weight', $this->fields)) {
            $data['weight'] = $this->fields['weight'];
        }
        if (array_key_exists('templates', $this->fields)) {
            $data['templates'] = $this->fields['templates'];
        }

        return $data;
    }
}
