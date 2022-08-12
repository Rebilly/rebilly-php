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

class ValidationError implements JsonSerializable
{
    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('detail', $data)) {
            $this->setDetail($data['detail']);
        }
        if (array_key_exists('instance', $data)) {
            $this->setInstance($data['instance']);
        }
        if (array_key_exists('invalidFields', $data)) {
            $this->setInvalidFields($data['invalidFields']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getStatus(): ?int
    {
        return $this->fields['status'] ?? null;
    }

    public function setStatus(null|int $status): self
    {
        $this->fields['status'] = $status;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    public function setType(null|string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->fields['title'] ?? null;
    }

    public function setTitle(null|string $title): self
    {
        $this->fields['title'] = $title;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->fields['detail'] ?? null;
    }

    public function setDetail(null|string $detail): self
    {
        $this->fields['detail'] = $detail;

        return $this;
    }

    public function getInstance(): ?string
    {
        return $this->fields['instance'] ?? null;
    }

    public function setInstance(null|string $instance): self
    {
        $this->fields['instance'] = $instance;

        return $this;
    }

    /**
     * @return null|\Rebilly\Sdk\Model\ValidationError1InvalidFields[]
     */
    public function getInvalidFields(): ?array
    {
        return $this->fields['invalidFields'] ?? null;
    }

    /**
     * @param null|\Rebilly\Sdk\Model\ValidationError1InvalidFields[] $invalidFields
     */
    public function setInvalidFields(null|array $invalidFields): self
    {
        $invalidFields = $invalidFields !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof \Rebilly\Sdk\Model\ValidationError1InvalidFields ? $value : \Rebilly\Sdk\Model\ValidationError1InvalidFields::from($value)) : null, $invalidFields) : null;

        $this->fields['invalidFields'] = $invalidFields;

        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('status', $this->fields)) {
            $data['status'] = $this->fields['status'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('detail', $this->fields)) {
            $data['detail'] = $this->fields['detail'];
        }
        if (array_key_exists('instance', $this->fields)) {
            $data['instance'] = $this->fields['instance'];
        }
        if (array_key_exists('invalidFields', $this->fields)) {
            $data['invalidFields'] = $this->fields['invalidFields'];
        }

        return $data;
    }
}
