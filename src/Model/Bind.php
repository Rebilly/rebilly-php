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

class Bind implements JsonSerializable
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('id', $data)) {
            $this->setId($data['id']);
        }
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }
        if (array_key_exists('labels', $data)) {
            $this->setLabels($data['labels']);
        }
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('filter', $data)) {
            $this->setFilter($data['filter']);
        }
        if (array_key_exists('actions', $data)) {
            $this->setActions($data['actions']);
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

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): static
    {
        $this->fields['name'] = $name;

        return $this;
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
        $this->fields['labels'] = $labels;

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

    public function getFilter(): ?string
    {
        return $this->fields['filter'] ?? null;
    }

    public function setFilter(null|string $filter): static
    {
        $this->fields['filter'] = $filter;

        return $this;
    }

    /**
     * @return RuleAction[]
     */
    public function getActions(): array
    {
        return $this->fields['actions'];
    }

    /**
     * @param array[]|RuleAction[] $actions
     */
    public function setActions(array $actions): static
    {
        $actions = array_map(
            fn ($value) => $value instanceof RuleAction ? $value : RuleAction::from($value),
            $actions,
        );

        $this->fields['actions'] = $actions;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('id', $this->fields)) {
            $data['id'] = $this->fields['id'];
        }
        if (array_key_exists('name', $this->fields)) {
            $data['name'] = $this->fields['name'];
        }
        if (array_key_exists('labels', $this->fields)) {
            $data['labels'] = $this->fields['labels'];
        }
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }
        if (array_key_exists('actions', $this->fields)) {
            $data['actions'] = $this->fields['actions'];
        }

        return $data;
    }
}
