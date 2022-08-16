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

class Rule implements JsonSerializable
{
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
        if (array_key_exists('final', $data)) {
            $this->setFinal($data['final']);
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

    public function setId(null|string $id): self
    {
        $this->fields['id'] = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->fields['name'];
    }

    public function setName(string $name): self
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
    public function setLabels(null|array $labels): self
    {
        $labels = $labels !== null ? array_map(fn ($value) => $value ?? null, $labels) : null;

        $this->fields['labels'] = $labels;

        return $this;
    }

    public function getStatus(): ?OnOff
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|OnOff|string $status): self
    {
        if ($status !== null && !($status instanceof OnOff)) {
            $status = OnOff::from($status);
        }

        $this->fields['status'] = $status;

        return $this;
    }

    public function getFilter(): ?string
    {
        return $this->fields['filter'] ?? null;
    }

    public function setFilter(null|string $filter): self
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
     * @param RuleAction[] $actions
     */
    public function setActions(array $actions): self
    {
        $actions = array_map(fn ($value) => $value !== null ? ($value instanceof RuleAction ? $value : RuleAction::from($value)) : null, $actions);

        $this->fields['actions'] = $actions;

        return $this;
    }

    public function getFinal(): ?bool
    {
        return $this->fields['final'] ?? null;
    }

    public function setFinal(null|bool $final): self
    {
        $this->fields['final'] = $final;

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
            $data['status'] = $this->fields['status']?->value;
        }
        if (array_key_exists('filter', $this->fields)) {
            $data['filter'] = $this->fields['filter'];
        }
        if (array_key_exists('actions', $this->fields)) {
            $data['actions'] = $this->fields['actions'];
        }
        if (array_key_exists('final', $this->fields)) {
            $data['final'] = $this->fields['final'];
        }

        return $data;
    }
}
